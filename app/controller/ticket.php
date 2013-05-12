<?php

namespace App\Controller;
use Library\Auth;

class Ticket extends \Core\Controller\Base {

	public static $STATUS_OPEN = 1;
	public static $STATUS_CLOSED = 2;
	public static $STATUS_ACCEPTED = 3;
	public static $STATUS_COMPLETED = 4;

	public static $PRIORITY_LOW = 1;

	/**
	 * Open
	 */
	public function open() {

		$tickets = $this->select()
			->where('ticket.ticket_status', '=', self::$STATUS_OPEN)
			->or_where('ticket.ticket_status', '=', self::$STATUS_ACCEPTED)
			->order_desc('ticket.ticket_priority')
			->order_asc('ticket.id')
			->fetch();

		$this->data('tickets', $tickets);
		$this->data('open', true);
		$this->template('ticket/list');

	}

	/**
	 * Closed
	 */
	public function closed() {

		$tickets = $this->select()
			->where('ticket.ticket_status', '=', self::$STATUS_CLOSED)
			->or_where('ticket.ticket_status', '=', self::$STATUS_COMPLETED)
			->order_desc('ticket.id')
			->fetch();

		$this->data('tickets', $tickets);
		$this->data('open', false);
		$this->template('ticket/list');

	}

	/**
	 * Create
	 */
	public function view($id) {

		$is_admin = false;
		$is_user = Auth::logged_in();
		$user = Auth::current_user();
		$content = null;
		$error = false;

		$ticket = $this->select()
			->column('ticket.content', 'content')
			->column('ticket.user', 'user')
			->column('user.display_name', 'user_display_name')
			->where('ticket.id', '=', $id)
			->inner_join('user', 'user.id', '=', 'ticket.user')
			->single() or $this->error(404);

		if(is_post() and $is_user) {

			$com = \App\Model\Ticket_Comment::from_post(array('content'));
			if(!empty($com->content)) {

				$com->ticket = $id;
				$com->user = $user->id;
				$com->post_timestamp = time();
				$com->save();

			} else {

				$content = $com->content;
				$error = true;

			}

		}

		$comments = $ticket->ticket_comments()
			->select()
			->column('ticket_comment.post_timestamp', 'post_timestamp')
			->column('ticket_comment.content', 'content')
			->column('ticket_comment.user', 'user')
			->column('user.display_name', 'user_display_name')
			->inner_join('user', 'user.id', '=', 'ticket_comment.user')
			->order_asc('ticket_comment.id')
			->fetch();

		if($is_user) {

			$group = $user->groups()
				->select()
				->and_where('group.name', '=', 'admin')
				->single();

			if($group !== null) {

				$is_admin = true;

			}

		}

		// Set up autoloading for markdown and HTMLPurifier libraries
		\Core\Autoload::set('/^Michelf/', function() {

			return 'michelf/Markdown.php';

		});

		\Core\Autoload::set('/^HTMLPurifier/', function() {

			return 'htmlpurifier/HTMLPurifier.standalone.php';

		});

		// Format ticket content as markdown
		$ticket->content = $this->format($ticket->content);

		$this->data('ticket', $ticket);
		$this->data('comments', $comments);
		$this->data('is_user', $is_user);
		$this->data('is_admin', $is_admin);
		$this->data('user', $user);
		$this->data('content', $content);
		$this->data('error', $error);

	}

	/**
	 * Create
	 */
	public function create() {

		Auth::enforce();

		if(is_post()) {

			$ticket = \App\Model\Ticket::from_post(array('title', 'ticket_type', 'content'));
			$ticket->user = Auth::current_user()->id;
			$ticket->ticket_status = self::$STATUS_OPEN;
			$ticket->ticket_priority = self::$PRIORITY_LOW;
			
			if($this->valid($ticket)) {

				$id = $ticket->save();
				redirect("support/ticket/$id");

			}

		} else {

			$this->data('title', null);
			$this->data('ticket_type', null);
			$this->data('content', null);

		}

		$ticket_types = \App\Model\Ticket_Type::select()->order_asc('id')->fetch();
		$this->data('ticket_types', $ticket_types);

	}

	/**
	 * Listing Select
	 * @return Mysql\Select
	 */
	private function select() {

		return \App\Model\Ticket::select()
			->column('ticket.id', 'id')
			->column('ticket.title', 'title')
			->column('ticket_type.title', 'type')
			->column('ticket_status.title', 'status')
			->column('ticket_priority.title', 'priority')
			->inner_join('ticket_type', 'ticket_type.id', '=', 'ticket.ticket_type')
			->inner_join('ticket_status', 'ticket_status.id', '=', 'ticket.ticket_status')
			->inner_join('ticket_priority', 'ticket_priority.id', '=', 'ticket.ticket_priority');

	}

	/**
	 * Format
	 * @param string Markdown
	 * @return string Clean HTML
	 */
	private function format($text) {

		$html = \Michelf\Markdown::defaultTransform($text);
		$html = str_replace('<code>', '', $html);
		$html = str_replace('</code>', '', $html);

		$config = \HTMLPurifier_Config::createDefault();
		$config->set('HTML.Allowed', 'p,strong,em,a[href],pre');
		$config->set('AutoFormat.AutoParagraph', true);
		$purifier = new \HTMLPurifier($config);
		$html = $purifier->purify($html);

		$html = str_replace('<pre>', '<pre class="prettyprint">', $html);
		return $html;

	}

}
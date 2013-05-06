<?php

namespace Core;

// Home
Route::add('App.Controller.Main', array(

	'GET:/' => 'index'

));

// Guide
Route::add('App.Controller.Guide', array(

	'GET:guide' => 'index',
	'GET:guide/:any' => 'view'

));

// Support
Route::add('App.Controller.Support', array(

	'GET:support' => 'index'

));

// Issue Tracker
Route::add('App.Controller.Ticket', array(

	'GET:support/ticket' => 'open',
	'GET:support/ticket/closed' => 'closed',
	'BOTH:support/ticket/:int' => 'view',
	'BOTH:support/ticket/create' => 'create'

));

// Authentication
Route::vendor('auth');

// Admin
Route::vendor('admin');
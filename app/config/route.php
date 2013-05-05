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

// Issue Tracker
Route::add('App.Controller.Ticket', array(

	'GET:support/ticket' => 'open',
	'GET:support/ticket/closed' => 'closed',
	'GET:support/ticket/:int' => 'view'

));

// Authentication
Route::vendor('auth');

// Admin
Route::vendor('admin');
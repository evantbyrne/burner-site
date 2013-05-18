<?php

namespace Core;

// Home
Route::add('App.Controller.Main', array(

	'GET:/' => 'index'

));

// Support
Route::add('App.Controller.Order', array(

	'GET:order' => 'index',
	'BOTH:order/license/:int' => 'license',
	'GET:order/complete' => 'complete',
	'GET:order/download' => 'download'

));

// Guide
Route::add('App.Controller.Guide', array(

	'GET:guide' => 'index',
	'GET:guide/:any' => 'view'

));

// API
Route::add('App.Controller.Api', array(

	'GET:api' => 'index',
	'GET:api/:any' => 'index',
	'GET:api/:any/:any' => 'view'

));

// Users
Route::add('App.Controller.User', array(

	'GET:dashboard' => 'dashboard',
	'BOTH:user/change_password' => 'change_password'

));

// Support
Route::add('App.Controller.Support', array(

	'GET:support' => 'index',
	'GET:support/license' => 'license'

));

// Issue Tracker
Route::add('App.Controller.Ticket', array(

	'GET:support/ticket' => 'open',
	'GET:support/ticket/closed' => 'closed',
	'BOTH:support/ticket/:int' => 'view',
	'BOTH:support/ticket/create' => 'create'

));

// Authentication
Route::add('App.Controller.Auth', array(

	'BOTH:auth/register' => 'register',
	'BOTH:auth/register/:any' => 'register',
	'BOTH:auth/login' => 'login',
	'BOTH:auth/login/:any' => 'login',
	'GET:auth/logout' => 'logout'

));

// Admin
Route::vendor('admin');
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

// Authentication
Route::vendor('auth');

// Admin
Route::vendor('admin');
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'AnnouncementsController@getAnnouncements');

Route::get('/about', 'PagesController@getAbout');

Route::get('/contact', 'PagesController@getContact');

Route::get('/register', 'PagesController@getRegister');

Route::post('/register/submit', 'UserController@register');

Route::get('/logout', 'UserController@logout');

Route::get('/login', 'PagesController@getLogin');

Route::post('/login/submit', 'UserController@login');

Route::post('/deleteUser', 'UserController@delete');

Route::get('/discussion', 'MessagesController@getDiscussion');

Route::post('/messages', 'MessagesController@getMessages');

Route::get('/users', 'UserController@getUsers');

Route::post('/contact/submit', 'MessagesController@sendMessage');

Route::get('/profile', 'ProfileController@getProfile');

Route::post('/profile/update', 'ProfileController@updateProfile');

Route::post('/closeDiscussion', 'MessagesController@close');

Route::post('/reply', 'MessagesController@reply');

Route::post('/reply/submit', 'MessagesController@submitReply');

Route::get('/announcements', 'PagesController@getAnnouncements');

Route::post('/announcements/submit', 'AnnouncementsController@postAnnouncement');

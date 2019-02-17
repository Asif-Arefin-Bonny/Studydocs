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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Notes Routes
Route::get('/notes', 'NotesController@showAll')->name('show-notes');
Route::get('/notes/{id}', 'NotesController@show')->name('show-note');
Route::get('/note/download/{id}', 'DownloadNotesController@downloadNote')->name('download-note');
Route::get('/note/upload', 'UploadNotesController@create')->name('create-note')->middleware('verified');
Route::post('/note/upload', 'UploadNotesController@store')->name('create-note')->middleware('verified');
Route::get('/note/edit/{id}', 'UploadNotesController@edit')->name('edit-note')->middleware('verified');
Route::post('/note/edit', 'UploadNotesController@update')->name('edit-note')->middleware('verified');
Route::post('/note/comment/{id}', 'CommentsController@noteComment')->name('note-comment')->middleware('verified');

// Note Request Routes
Route::get('/note-requests', 'NotesRequestController@showAll')->name('show-requests');
Route::get('/note-requests/{id}', 'NotesRequestController@show')->name('show-request');
Route::get('/note-request/create', 'NotesRequestController@create')->name('create-request')->middleware('verified');
Route::post('/note-request/create', 'NotesRequestController@store')->name('create-request')->middleware('verified');
Route::post('/note-requests/comment/{id}', 'CommentsController@requestComment')->name('request-comment')->middleware('verified');
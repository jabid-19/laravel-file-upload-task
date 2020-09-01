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

Route::get('/', 'FrontEndController@index');
Route::get('/posts/details/{post}', 'FrontEndController@getSinglePost')->name('get.single.posts');

Auth::routes();




Route::get('/home', 'HomeController@index')->name('home');
Route::get('/categories/status/update/{category}', 'CategoryController@statusUpdate')->name('categories.status.update');

Route::resource('/categories', 'CategoryController');
Route::get('/posts/status/update/{post}', 'PostController@statusUpdate')->name('posts.status.update');
Route::get('/posts/trash/', 'PostController@getPostTrash')->name('posts.trash');
Route::delete('/posts/trash/{id}', 'PostController@restorePost')->name('posts.restore');
Route::delete('/posts/forcetrash/{id}', 'PostController@permanentDelete')->name('posts.force');

Route::resource('/posts', 'PostController');
Route::resource('/tags', 'TagController');
Route::resource('/forums', 'ForumController');
//Route::delete('/anyfileuploads/{anyFileUpload}', 'AnyFileUploadController@destroy')->name('anyfileuploads.destroye');
Route::resource('/anyFileUploads', 'AnyFileUploadController');
//Route::resource('/mfiles', 'AnyFileUploadController');

Route::post('/comments/post/{post}', 'CommentController@postCommentStore')->name('posts.comments.store');
Route::get('/publicforums', 'FrontEndController@getAllForum')->name('publicforum.index');
Route::get('/publicforums/details/{forum}', 'FrontEndController@getSingleForum')->name('get.single.forums');
Route::post('/comments/forum/{forum}', 'CommentController@forumCommentStore')->name('forums.comments.store');



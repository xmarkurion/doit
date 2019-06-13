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

Route::get('/huj', function () {
    return view('welcome');
});

// anny or post or get


Auth::routes();
Route::get('/', "HomeController@index")->name('home');
Route::get('/home', 'HomeController@index')->name('home');


Route::resource('tasks','TasksController');
Route::any('tasks/{task}/done', 'TasksController@done')->name('tasks.done');
Route::any('tasks/{task}/undone', 'TasksController@undone')->name('tasks.undone');
/*
Route::get('/tasks', "TasksController@tasks")->name('tasks');
Route::get('/tasks/add', "TasksController@add")->name('add');
Route::post('/tasks/add', "TasksController@store")->name('store');
Route::anny('/tasks/{id}/edit', "TasksController@edit")->name('edit');

*/






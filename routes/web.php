<?php

use Illuminate\Filesystem\Filesystem;

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

app()->singleton('App\Services\Twitter', function () {
    return new \App\Services\Twitter('sdjfisodfj oiejr weiorjwe o');

});


Route::get('/', function () {
    dd(app('App\Example'));
    return view('welcome');
});


/* Route::get('/projects','ProjectsController@index'); 
Route::get('/projects/create','ProjectsController@create'); 
Route::get('/projects/{project}', 'ProjectsController@show');
Route::post('/projects','ProjectsController@store'); 
Route::post('/projects/{project}/edit', 'ProjectsController@edit');
Route::patch('/projects/{project}', 'ProjectsController@update');
Route::delete('/projects/{project}', 'ProjectsController@destroy');
 */


Route::resource('projects', 'ProjectsController');

Route::post('/projects/{project}/tasks/', 'ProjectTasksController@store');
Route::patch('/tasks/{task}', 'ProjectTasksController@update');
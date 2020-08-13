<?php

use Illuminate\Support\Facades\Route;

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


Route::post('/event', "EventController@postMatch");

Route::put('/event/{id}', "EventController@editPostMatch");

Route::delete('/event/{id}', "EventController@deleteEvent");

Route::get('/event', "EventController@getAllEvents");

Route::get('/event/{org_id}', "EventController@getEventsByOrg_id");


// ----------------------------------------------------------------------------------------------  //


Route::post('/schedule', "ScheduleController@createMatchSchedule");

Route::get('/schedule', "ScheduleController@getAllMatches");

Route::post('/event/{id}/results', "ResultsController@createMatchResults");

Route::get('/event/{id}/results', "ResultsController@getAllMatchResults");





Route::post('/event/search', "EventController@searchEvent");

Route::get('/event/{event_id}/matches', "ScheduleController@checkMatchDetails");





Route::post('/event/{id}/team', "TeamController@createMatchteams");

Route::put('/event/{id}/team', "TeamController@editTeam");

Route::get('/event/{id}/team', "TeamController@getAllTeamsDetails");














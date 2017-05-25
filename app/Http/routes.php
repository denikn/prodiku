<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', function () {
    return view('welcome');
});

// ---------------------------------------------------
// USER
Route::get('gettoken', 'UserController@gettoken');

Route::get('get_user', 'UserController@index');

Route::get('get_user/auth/{username}&{password}', 'UserController@getauth');

Route::get('get_user/nid/{get_user}', 'UserController@getbynid');

Route::get('get_user/name/{get_user}', 'UserController@getbyname');

Route::get('get_user/uname/{get_user}', 'UserController@getbyusername');

Route::get('get_user/type/{type}', 'UserController@getbyusertype');

Route::get('dashboard', 'UserController@afterlogin');

Route::post('register', 'UserController@register');

Route::post('register2', 'UserController@register2');

// Route::post('login', 'UserController@login');

Route::post('jancuk', 'UserController@jancuk');

Route::post('login', 'Auth\AuthController@login');

Route::get('logout', 'Auth\AuthController@logout');

// ---------------------------------------------------
// QUESTION

Route::get('get_question', 'QuestionController@index');

Route::get('get_question/nid/{get_question}', 'QuestionController@getbynid');

Route::get('get_question/category/{get_question}', 'QuestionController@getbycategory');

Route::get('get_question/subject/{get_question}', 'QuestionController@getbysubject');

// ---------------------------------------------------
// CRITERIA

Route::get('get_course', 'CourseController@index');

Route::get('/home', 'HomeController@index');

//Route::auth();

Route::get('/home', 'HomeController@index');

// ------------------------------------------------------------------
// CAMPUS / course / PAGE INFO PRODI
Route::get('get_course/campus', 'CourseController@infoCampus');

Route::get('get_course/favcourse', 'CourseController@getFavProdi');

Route::get('get_course/listprodi/{id_campus}&{type}', 'CourseController@listProdi');

Route::get('get_course/criteria/{id_course}', 'CourseController@prodiCriteria');

// ------------------------------------------------------------------
// CAMPUS / course // PILIH PRODI
Route::get('get_course/search/{name}', 'CourseController@searchProdi');

Route::post('get_course/choice', 'CourseController@pilihProdi');

Route::get('get_course/showchoice/{nid}', 'CourseController@showChoice');

// ------------------------------------------------------------------
// QUESTION
Route::post('input_question', 'QuestionController@inputQuestion');

Route::post('input_answer', 'QuestionController@inputAnswer');

// ------------------------------------------------------------------
// TRY
Route::get('get_trial', 'TrialController@index');

Route::get('get_trial/nid/{nid}', 'TrialController@getTrialByNid');

Route::post('trying', 'TrialController@postTrial');

// ------------------------------------------------------------------
// FUZZY
Route::get('get_recomendation/nid/{nid}', 'FuzzyController@getRecomendation');

Route::get('get_result/coba', 'FuzzyController@resultCoba');

// ------------------------------------------------------------------
// OFFER
Route::get('get_offer', 'OfferController@index');

Route::get('get_offer/nid/{nid}', 'OfferController@getOfferByNid');

Route::post('get_offer/send', 'OfferController@sendOffer');

// ----------------------- PUT ---------------------------------------
Route::put('get_course/change/{choice}', 'CourseController@changeCourse');

// --------------------------------------

// -------------------------------------- DISCUSS --------------------
Route::get('get_discuss/{id_campus}&{id_course}', 'DiscussController@getDiscussbyCourse');
Route::post('get_discuss/send', 'DiscussController@sendCommentOnDiscuss');

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
<<<<<<< HEAD
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

Route::get('/','MainController@index');
Route::post('/checklogin','MainController@checklogin');
Route::group(['middleware' => 'auth'], function(){
Route::get('/logout','MainController@logout');
Route::get('Admin/view_user/data',['uses'=> 'MainController@view_user', 'as'=>'admin.view_user.data']);
Route::get('/Admin/view_user','MainController@user_page');
Route::get('/Admin/category','MainController@category');
Route::get('/Admin/question','MainController@question');
Route::get('/Admin/dashbord','MainController@homelogin');
//Route::get('users', ['uses'=>'UserController@index', 'as'=>'users.index']);
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function() {

Route::get('Admin/add_user','MainController@add_user');
Route::post('/user','MainController@insert');
Route::get('/edit/{id}','MainController@get');
Route::post('Admin/edit/{id}','MainController@update');
Route::get('/delete/{id}','MainController@delete');
Route::get('/status/{id}','MainController@status');

});
Route::group(['middleware' => 'App\Http\Middleware\SubAdminMiddleware'], function() {

Route::get('/Admin/add_category_form','MainController@add_category_form');
Route::post('/add_category_insert','MainController@add_category_insert');
Route::get('/edit_category/{Cat_id}','MainController@edit_category_form');
Route::post('/edit_category_insert/{id}','MainController@edit_category_insert');
Route::get('/delete_category/{id}','MainController@delete_category');
Route::get('/Admin/add_question_form','MainController@add_question_form');
Route::post('/add_question_insert','MainController@add_question_insert');
Route::get('join','MainController@join');
Route::get('/delete_questions/{id}','MainController@delete_question');
Route::get('/edit_questions/{id}','MainController@edit_questions')->name('edit_questions');
Route::post('/edit_question_insert/{id}','MainController@edit_question_insert');
});
Route::group([ 'middleware' => 'App\Http\Middleware\UserMiddleware'], function() {
Route::get('User/dashbord','MainController@userlogin');
Route::post('User/result','MainController@userresult')->name('users.result');
Route::get('/export', 'MainController@export');
Route::get('old','StripePaymentController@old');
Route::get('getuser','StripePaymentController@getStripeId');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');
Route::post('oldpayment/{id}', 'StripePaymentController@oldPayment')->name('stripe.old.payment');

});

});

Route::get('unauthorized','MainController@unauth');
Route::get('stripe', 'StripePaymentController@stripe');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/plans', 'PlanController@index')->name('plans.index');
Route::get('/plan/{plan}', 'PlanController@show')->name('plans.show');
Route::post('/subscription', 'SubscriptionController@create')->name('subscription.create');
Route::get('google', 'GoogleController@redirectToGoogle');
Route::get('google/callback', 'GoogleController@handleGoogleCallback');
Route::post('failed','SubscriptionController@faioledresponce');
=======

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
});
Route::get('importExport', 'MaatwebsiteDemoController@importExport');
Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
>>>>>>> d1cb5ffb453ba83f73b8ec0964c6d505c698d739

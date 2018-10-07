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
	$binding = ['title'=>'首頁'];
    return view('welcome',$binding);
});
Route::group(['prefix'=>'user'],function(){
	Route::group(['prefix'=>'auth'],function(){
		Route::get('/sign-up','UserAuthController@signUpPage');

		Route::post('/sign-up','UserAuthController@signUpProcess');

		Route::get('/sign-in','UserAuthController@signInPage');

		Route::post('/sign-in','UserAuthController@signInProcess');

		Route::get('/sign-out','UserAuthController@signOut');
	});
});

// Route::group(['prefix'=>'user'])
Route::group(['prefix'=>'merchandiseFilter'],function(){
	Route::group(['prefix'=>'{class_id}'],function(){
		Route::get('/','MerchandiseController@merchandiseFilterListPage');
	});
});

Route::group(['prefix'=>'merchandise'],function(){
	Route::get('/','MerchandiseController@merchandiseListPage');

	Route::get('/create','MerchandiseController@merchandiseCreateProcess')->middleware(['user.auth.admin']);

	Route::get('/manage','MerchandiseController@merchandiseManageListPage')->middleware(['user.auth.admin']);

	Route::get('/showCart','MerchandiseController@showCartPage')->middleware(['user.auth']);

	Route::group(['prefix'=>'{merchandise_id}'],function(){
		Route::get('/','MerchandiseController@merchandiseItemPage');

		Route::group(['middleware'=>['user.auth.admin']],function(){

		Route::get('/edit','MerchandiseController@merchandiseItemEditPage');

		Route::put('/','MerchandiseController@merchandiseItemUpdateProcess');

	});

		Route::post('/buy','MerchandiseController@merchandiseItemBuyProcess')->middleware(['user.auth']);
		Route::get('/cart_add','MerchandiseController@cartAddProcesss');

	});
});

Route::get('/transaction','TransactionController@transactionListPage')->middleware(['user.auth']);
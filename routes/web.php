<?php
use Illuminate\Http\Request;
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

Route::post('/submit', function (Request $request) {
	// $binding = ['title'=>'首頁'];

	$data = $request->all();

	$set = [];
                        $set['view'] = 'mail.allMailBlade';  
                        $set['to'] ='abc123123437@gmail.com'; //收件者;        
                        $set['to_name'] = $data['name'];
                        $set['subject'] = '來自'.$data['name'].'意見回饋';

                        unset($data['_token']);
                        unset($data['code']);
                        $str ="";
                        foreach ($data as $key => $value) {
                            $str.= $key.':'.$value.'<br/>';
						}
						$str = str_replace('category','類別',$str);
						$str = str_replace('suggestion','意見回饋',$str);
						$str = str_replace('name','姓名',$str);
						
// dd($str);
                        Mail::send( $set['view'], ['str' => $str], function ($m) use ( $set ) {
                            $m->from( "service@wddgroup.com" , $set['to_name'] );
							$m->to( $set['to']);
							$m->subject( $set['subject'] );
						});

					
    return response('welcome');
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

		Route::get('/test','MerchandiseController@test');

		Route::get('/ajax','MerchandiseController@ajax');

	});

		Route::post('/buy','MerchandiseController@merchandiseItemBuyProcess')->middleware(['user.auth']);
		Route::get('/cart_add','MerchandiseController@cartAddProcesss');

	});
});

Route::get('/transaction','TransactionController@transactionListPage')->middleware(['user.auth']);
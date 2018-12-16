<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Http\Controllers\Controller;
use Validator;
use App\Shop\Entity\User;
use Hash;
use Mail;
use Illuminate\Contracts\Encryption;
use Illuminate\Support\Facades\Crypt;
//use Illuminate\Foundation\Validation\ValidatesRequests;

/**
* 
*/
class UserAuthController extends Controller
{
	
	public function signUpPage()
	{
		$binding =['title'=>'註冊',];
		return view('auth.signUp',$binding);
	}

	public function signUpProcess(){
		$input = request()->all();
		//var_dump($input);
		//exit;
		$rules = [
		'nickname'=> ['required','max:50',],
		'email'=> ['required','max:150','email','unique:users'],
		'password'=>['required','same:password_confirmation','min:6',],
		'password_confirmation'=>['required','min:6'],
		'type'=>['required','in:G,A']
		];

		// $validator = Validator::make($input,$rules);

		// if ($validator->fails()){
		// 	return redirect('/user/auth/sign-up')->withErrors($validator)->withInput();
		// }
		$input['password'] = Hash::make($input['password']);
		// $Users = User::create($input);
		// return view('welcome');
		$mail_binding = [
		'nickname' => $input['nickname']
		];
		Mail::send('mail.signUpEmailNotification',$mail_binding,
			function($mail) use ($input){
				$mail->to($input['email']);

				$mail->from('abc123123437@gmail.com','潮爽DER撿到一百塊');

				$mail->subject('恭喜註冊Laravel_shop成功');
			});

		return redirect('/user/auth/sign-in');
	}

	public function signInPage(){

		$binding = ['title'=>'登入'];
		$user = User::where('id',2)->firstOrFail()->toArray();
		// dd(json_decode(base64_decode($user['password']),true));
		// $decrypted = decrypt($user['password']);
		// $decrypted = Crypt::decryptString($user->password);
		// dd($decrypted);
		return view('auth.signIn',$binding);
	}

	public function signInProcess(){

		$input = request()->all();

		$rules = ['email'=>['required','max:150','email',],'password'=>['required','min:6',],];

		$validator = Validator::make($input,$rules);

		if($validator->fails()){
			return redirect('/user/auth/sign-in')->withErrors($validator)->withInput();
		}

	    $User = User::where('email',$input['email'])->firstOrFail();

	    $is_password_correct = Hash::check($input['password'],$User->password);

	    if(!$is_password_correct){
	    	$error_message = [
	    	'msg' => ['密碼驗證錯誤',],
	    	];

	    	return redirect('/user/auth/sign-in')->withErrors($error_message)->withInput();
	    }

	    session()->put('user_id',$User->id);

	    return redirect()->intended('/');

	}
	public function signOut(){

		session()->forget('user_id');

		return redirect('/');
	}
}
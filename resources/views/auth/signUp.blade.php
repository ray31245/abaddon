@extends('layout.master')
@section('title',$title)
@section('content')
   <h1>{{$title}}</h1>
   @include('components.validationErrorMessage')
   
   <form action="sign-up" method="post">
   <label>
   	暱稱:
   	<input type="text" name="nickname" placeholder="暱稱">
   </label>
   <label>
    Email:
    <input type="text" name="email" placeholder="Email">
   </label>
   <label>
    密碼:
    <input type="password" name="password" placeholder="密碼">
   </label>
   <label>
    確認密碼:
    <input type="password" name="password_confirmation" placeholder="確認密碼">
   </label>
   <label>
    帳號類型:
    <select select name="type">
    	<option value="G">一般會員</option>
    	<option value="A">管理者</option>
    </select>
   </label>
   <input type="hidden" name="_token" value="{{csrf_token()}}">
   <button type="submit">註冊</button>      
   </form>
 @endsection
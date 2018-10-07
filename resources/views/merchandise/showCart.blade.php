@extends('layout.master')

@section('title',$title)

@section('content')

<!-- <?php
$la = session()->all();
echo var_dump($la);
?> -->
   <div class="container">
   	<h1>{{$title}}</h1>
   	{{--錯誤訊息元件--}}
   	@include('components.validationErrorMessage')

   	<table>
   		<tr>
   			<th>名稱</th>
   			<th>照片</th>
   			<th>價格</th>
   			<th>購買數量</th>
   			<th>合計</th>
   		</tr>
   		@foreach($MerchandisePaginate as $Merchandise)
   		 @if(!empty(session()->get($Merchandise->introduction_en)))
   		    <tr>
   		    	<td>
   		    		<a href="/shop_laravel/public/merchandise/{{$Merchandise->id}}">
   		    			{{$Merchandise->name}}
   		    		</a>
   		    	</td>
   		    	<td>
   		    		<a href="/shop_laravel/public/merchandise/{{$Merchandise->id}}">
   		    			<img src="{{$Merchandise->photo or '/assets/images/default-merchandise.png'}}"/>
   		    		</a>
   		    	</td>
   		    	<td>{{$Merchandise->price}}</td>
   		    	<td>{{session()->get($Merchandise->introduction_en)}}</td>
   		    	<td>{{$Merchandise->price*session()->get($Merchandise->introduction_en)}}</td>
   		    </tr>
   		    @endif
   		@endforeach
   	</table>
   	<td><button>結帳</button></td>
   	{{--分頁頁數按鈕--}}
   	{{$MerchandisePaginate->links()}}
   </div>
  	@endsection
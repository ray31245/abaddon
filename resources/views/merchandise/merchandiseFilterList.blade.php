@extends('layout.master')

@section('title',$title)

@section('content')
   <div class="container">
   	<h1>{{$title}}</h1>
   	{{--錯誤訊息元件--}}
   	@include('components.validationErrorMessage')

   	<table>
   		<tr>
   			<th>名稱</th>
   			<th>照片</th>
   			<th>價格</th>
   			<th>剩餘數量</th>
   		</tr>
   		@foreach($MerchandisePaginate as $Merchandise)
         @if($Merchandise->status == 'S')
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
   		    	<td>{{$Merchandise->remain_count}}</td>
   		    </tr>
         @endif
   		@endforeach
   	</table>
   	{{--分頁頁數按鈕--}}
   	{{$MerchandisePaginate->links()}}
   </div>
   @endsection
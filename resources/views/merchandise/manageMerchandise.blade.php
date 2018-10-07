@extends('layout.master')

@section('title',$title)

@section('content')
   <div class="container">
   	<h1>{{$title}}</h1>
   	@include('components.validationErrorMessage')

   	<table class="table">
   		<tr>
   			<th>編號</th>
            <th>類別</th>
   			<th>名稱</th>
   			<th>圖片</th>
   			<th>狀態</th>
   			<th>價格</th>
   			<th>剩餘數量</th>
   			<th>編輯</th>
   		</tr>
   		@foreach($MerchandisePaginate as $Merchandise)
   		  <tr>
   		  	<td>{{$Merchandise->id}}</td>
            <td>{{$Merchandise->class_id}}</td>
   		  	<td>{{$Merchandise->name}}</td>
   		  	<td>
   		  		<img src="{{$Merchandise->photo or '/assets/images/default-merchandise.png'}}"/>
   		  	</td>
   		  	<td>
   		  		@if($Merchandise->status == 'C')
   		  		  建立中
   		  		@else
   		  		  可販售
   		  		@endif
   		  	</td>
   		  	<td>{{$Merchandise->price}}</td>
   		  	<td>{{$Merchandise->remain_count}}</td>
   		  	<td>
   		  		<a href="/shop_laravel/public/merchandise/{{$Merchandise->id}}/edit">
   		  			編輯
   		  		</a>
   		  	</td>
   		  </tr>
   		  @endforeach
           <button><a href="/shop_laravel/public/merchandise/create">建立商品</a></button>
   	</table>
   	{{$MerchandisePaginate->links()}}
   </div>
   @endsection
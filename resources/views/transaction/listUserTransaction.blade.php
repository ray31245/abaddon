@extends('layout.master')

@section('title',$title)

@section('content')
   <div class="container">
   	<h1>{{$title}}</h1>
   	{{--錯誤訊息模板元件--}}
   	@include('components.validationErrorMessage')
    <table class="table">
   	<tr>
   		<th>商品名稱</th>
   		<th>圖片</th>
   		<th>單價</th>
   		<th>數量</th>
   		<th>總金額</th>
   		<th>購買時間</th>
   	</tr>

   	@foreach($TransactionPaginate as $Transaction)
   	   <tr>
   	   	<td>
   	   		<a href="/shop_laravel/public/merchandise/{{$Transaction->Merchandise->id}}">
   	   			{{$Transaction->Merchandise->name}}
   	   		</a>
   	   	</td>
   	   	<td>
   	   		<a href="/shop_laravel/public/merchandise/{{$Transaction->Merchandise->id}}">
   	   			<img src="{{$Transaction->Merchandise->photo or '/assets/images/default-merchandise.png'}}"/>
   	   		</a>
   	   	</td>
   	   	<td>{{$Transaction->price}}</td>
   	   	<td>{{$Transaction->buy_count}}</td>
   	   	<td>{{$Transaction->total_price}}</td>
   	   	<td>{{$Transaction->created_at}}</td>
   	   </tr>
   	@endforeach
   	</table>

   	{{--分頁頁數按鈕--}}
   	{{$TransactionPaginate->links()}}
   </div>   	
@endsection
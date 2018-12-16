@extends('layout.master')

@section('title',$title)

@section('content')
  <div class="container">
  	<h1>{{$title}}</h1>
  	@include('components.validationErrorMessage')

  	<table>
  		<tr>
  			<th>名稱</th>
  			<td>{{$Merchandise->name}}</td>
  		</tr>
  		<tr>
  			<th>照片</th>
  			<td>
  				<img src="{{$Merchandise->photo or '/assets/images/default-merchandise.png'}}"/>
  			</td>
  		</tr>
  		<tr>
  			<th>價格</th>
  			<td>
  				{{$Merchandise->price}}
  			</td>
  		</tr>
  		<tr>
  			<th>剩餘數量</th>
  			<td>{{$Merchandise->remain_count}}</td>
  		</tr>
  		<tr>
  			<th>介紹</th>
  			<td>
  				{{$Merchandise->introduction}}
  			</td>
  		</tr>
  		<tr>
  			<td colspan="2">
  				<form action="/shop_laravel/public/merchandise/{{$Merchandise->id}}/buy" method="post">
  					購買數量
  					<select name="buy_count" id="buy_count" onchange="selectcount()">
  						@for($count = 0;$count<=$Merchandise->remain_count;$count++)
  						<option value="{{$count}}">{{$count}}</option>
  						@endfor
  					</select>
  					<button type="submit">
  						購買
  					</button>
  					{{csrf_field()}}
  				</form>
  			</td>
  			<td><button id="cart" onclick="check()">放入購物車</button></td>
  		</tr>
  	</table>
  </div>
  <script type="text/javascript">
    var xmlHttp;
//    window.onload = function what(){
// document.getElementById("message").innerHTML="555";
// };;
    function $_xmlHttpRequest(){
      if (window.ActiveObject) {
        xmlHttp = new ActiveObject("Microsoft.XMLHTTP");
      }
      else if (window.XMLHttpRequest) {
        xmlHttp = new XMLHttpRequest();
      }
    }

    buy_count = document.getElementById("buy_count").value;

    function selectcount()
    {
    buy_count = document.getElementById("buy_count").value;
    }

    function check()
    {
      var select_op = <?php echo '"'.$Merchandise->introduction_en.'"'; ?>;
			// history.pushState({page: 1}, 'title 1', 'ajax')

      $_xmlHttpRequest();
      xmlHttp.open("GET","/shop_laravel/public/merchandise/{{$Merchandise->id}}/cart_add?Merchandise_id="+select_op+"&buycount="+buy_count,true);

         xmlHttp.onreadystatechange = function check_user()
         {
          if (xmlHttp.readyState == 4) {
            if (xmlHttp.status == 200) {
              var str = xmlHttp.responseText;
              document.getElementById("cart").innerHTML= str;
              document.getElementById("cart").disabled = true;
            }
          }
         }

         xmlHttp.send(null);
    }
  </script>
  @endsection
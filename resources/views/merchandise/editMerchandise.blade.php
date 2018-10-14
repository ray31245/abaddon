@extends('layout.master')

@section('title',$title)

@section('content')
     <div class = "container merchandise">
     	<h1 onclick="check()">{{$title}}</h1>
     

@include('components.validationErrorMessage')

<button><a href="/shop_laravel/public/merchandise/manage">回管理商品</a></button>

<form action="/shop_laravel/public/merchandise/{{$Merchandise->id}}" method="post" enctype="multipart/form-data" class="update">
	{{method_field('put')}}

	<label>
		商品狀態:
		<select name="status">
			<option value="C" 
			@if(old('status',$Merchandise->status) == 'C')
			selected @endif >
				建立中
			</option>

			<option value="S" 
			@if(old('status',$Merchandise->status) == 'S')
			selected @endif >
				可販售
			</option>

		</select>
	</label>
		<label>
		商品分類:
		<select name="class_id">
            <option> 
			
				請選擇
			</option>

			<option value="mobile" 
			@if(old('class_id',$Merchandise->class_id) == 'mobile')
			selected @endif >
				3C
			</option>

			<option value="car" 
			@if(old('class_id',$Merchandise->class_id) == 'car')
			selected @endif >
				車類
			</option>

			<option value="food" 
			@if(old('class_id',$Merchandise->class_id) == 'food')
			selected @endif >
				食物
			</option>

		</select>
	</label>
	<label>
		商品名稱:
		<input type="text" name="name" placeholder="商品名稱" value="{{old('name',$Merchandise->name)}}">
	</label>
	<label>
		商品英文名稱:
		<input type="text" name="name_en" 
		placeholder="商品英文名稱" value="{{old('name_en',$Merchandise->name_en)}}">
	</label>
	<label>
		商品介紹:
		<input type="text" name="introduction" placeholder="商品介紹" 
		value="{{old('introduction',$Merchandise->introduction)}}">
	</label>
	<label>
		商品英文介紹:
		<input type="text" name="introduction_en" placeholder="商品英文介紹:"
		value="{{old('introduction_en',$Merchandise->introduction_en)}}">
	</label>
	<label>
		商品照片:
		<input type="file" name="photo" placeholder="商品照片">
		<img src="{{$Merchandise->photo or '/asset/images/default-merchandise.png'}}" />
	</label>
	<label>
		商品價格:
		<input type="text" name="price" placeholder="商品價格"
		value="{{old('price',$Merchandise->price)}}">
	</label>
	<label>
		商品剩餘數量:
		<input type="text" name="remain_count" value="{{old('remain_count',$Merchandise->remain_count)}}">
	</label>
	<button type="submit" class="btn-default">更新商品資訊</button>
	{{csrf_field()}}
</form>
</div>
<script type="text/javascript">
var xmlHttp;

    function $_xmlHttpRequest(){
      if (window.ActiveObject) {
        xmlHttp = new ActiveObject("Microsoft.XMLHTTP");
      }
      else if (window.XMLHttpRequest) {
        xmlHttp = new XMLHttpRequest();
      }
    }

	    function check()
    {
    //   var select_op = <?php echo '"'.$Merchandise->introduction_en.'"'; ?>;

			  var status = document.getElementsByClassName("update")[0][1].value;
			  var class_id = document.getElementsByClassName("update")[0][2].value;
			  var name = document.getElementsByClassName("update")[0][3].value;
			  var name_en = document.getElementsByClassName("update").value;
			  var introduction = document.getElementsByClassName("update").value;
			  var introduction_en = document.getElementsByClassName("update").value;
			  var photo = document.getElementsByClassName("update").value;
			  var price = document.getElementsByClassName("update").value;
			  var remain_count = document.getElementsByClassName("update".value);
			  
      $_xmlHttpRequest();
      xmlHttp.open("GET","/shop_laravel/public/merchandise/{{$Merchandise->id}}/test?status="+status+"&class_id="+class_id+"&name="+name+"&name_en="+name_en+"&introduction="+introduction+"&introduction_en="+introduction_en+"&photo="+photo+"&price="+price+"&remain_count="+remain_count,true);

         xmlHttp.onreadystatechange = function check_user()
         {
          if (xmlHttp.readyState == 4) {
            if (xmlHttp.status == 200) {
              var str = xmlHttp.responseText;
			  var update = document.getElementsByClassName("update")[0][1].value;

              document.getElementsByClassName("merchandise")[0].innerHTML= str;
            //   document.getElementById("cart").disabled = true;
            }
          }
         }

         xmlHttp.send(null);
    }
 </script>
@endsection
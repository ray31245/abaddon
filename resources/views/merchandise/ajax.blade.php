


{{-- @include('components.validationErrorMessage') --}}

<div class = "container merchandise" >
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

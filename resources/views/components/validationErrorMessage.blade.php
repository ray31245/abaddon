@if($errors AND count($errors))
<div>
   <ul>
   	@foreach($errors->all() as $err)
   	  <li>{{ $err }}</li>
   	@endforeach  
   </ul>
</div>   
@endif

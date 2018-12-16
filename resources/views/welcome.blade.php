@extends('layout.master')

@section('title',$title)

@section('content')
<h1 class="heading-1 "><span class="heading-text-1 ">精選內容</span>
      </h1><a href="# " class="responsive-picture picture-link-1 "><picture><img alt="Placeholder Picture " srcset="http://www.diylife.com.tw/ezfiles/diylife/img/gallery/13/bannergif7.gif " src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7 "></picture></a>
      <div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>

{{-- <button>Get External Content</button> --}}
<form>
      <div class="subject must">
        <p>問題類別</p>
        <select name='category'>
          {{-- @foreach ($getCompanyStakeholderAreaSubCategories as $value) --}}
          <option value="dd">dd</option>
          {{-- @endforeach --}}
        </select>
      </div>
      <div class="textarea must">
        <p>您的問題與意見</p>
        <textarea placeholder="限一千個中文字以內文字"></textarea>
      </div>
      <div class="name must">
        <p>姓名</p>
        <input type="text" placeholder="請輸入您的姓名"/>
      </div>
      <div class="email must">
        <p>電子信箱</p>
        <input type="text" placeholder="請輸入您的電子信箱"/>
      </div>
      <div class="tel">
        <p>聯絡電話</p>
        <input type="number" placeholder="請輸入您的聯絡電話"/>
      </div>
      <div class="code must">
        <p>驗證碼</p>
        <input type="text" name='Captcha' Class='tosend' placeholder="點圖更換驗證碼"/>
        {{-- <div class="changeCap">{!! Captcha::img() !!}</div> --}}
      </div>
      <div class="buttons">
        <button type="button">
          <p>確認送出</p>
        </button>
        <button type="reset">
          <p>清除</p>
        </button>
      </div>
      <input type="hidden" id='token' value="{{ csrf_token() }}">
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
      $('button[type="button"]').on('click',function() {
        var baseUrl = $('.base-url').attr('value');
        var category = $('select[name="category"]').val();
        var suggestion = $('.textarea> textarea').val();
        var name = $('.name> input').val();
        var email = $('.email> input').val();
        var tel = $('.tel> input').val();
        var code = $('.code> input').val();

        $.ajax({
                            url:"submit",
                            method:'POST',
                        data:{
          category:category,
          suggestion:suggestion,
          name:name,
          email:email,
          tel:tel,
          code:code,
                                // id:toChangeId,
                              _token:$("#token").val(),
                        }
                  
                    })
                    .done(function(data) {
          // $(".media-1").html(data.toChangeSolution);	
          alert(data);			

                    });

        // alert(name+'\n'+email+'\n'+tel+'\n'+code);
        console.log(baseUrl);
      })

      $("body").on("click", ".changeCap", function() {
          
          var d = new Date();


          img = $(this).find("img");

          img.attr("src", img.attr("src").split('?')[0] + '?t=' + d.getMilliseconds());

      });


    </script>

@endsection
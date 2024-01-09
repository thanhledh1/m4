<style>
    *{
     margin:0;
     padding: 0;
     box-sizing: border-box;
     font-family: 'Roboto', sans-serif;
 }

 section{
     position: relative;
     width: 100%;
     height: 100vh;
     display: flex;
 }

 section .img-bg{
     position: relative;
     width: 50%;
     height: 100%;
 }



 section .img-bg img{
     position: absolute;
     top: 0;
     left: 0;
     width: 100%;
     height: 100%;
     object-fit: cover;
 }
 section .noi-dung{
     display: flex;
     justify-content: center;
     align-items: center;
     width: 50%;
     height: 100%;
 }

 section .noi-dung .form{
     width: 50%;
 }


 section .noi-dung .form h2{
     color: #607d8b;
     font-weight: 500;
     font-size: 1.5em;
     text-transform: uppercase;
     margin-bottom: 20px;
     border-bottom: 4px solid #6694e9;
     display: inline-block;
     letter-spacing: 1px;
 }
 section .noi-dung .form .input-form{
      margin-bottom: 20px;
  }
 section .noi-dung .form .input-form span{
      font-size: 16px;
      margin-bottom: 5px;
      display: inline-block;
      color: #607db8;
      letter-spacing: 1px;
       }
 section .noi-dung .form .input-form input{
      width: 100%;
      padding: 10px 20px;
      outline: none;
      border: 1px solid #607d8b;
      font-size: 16px;
      letter-spacing: 1px;
      color: #607d8b;
      background: transparent;
      border-radius: 30px;
      }
  section .noi-dung .form .input-form input[type="submit"]{
      background: #6694e9;
      color: #fff;
      outline: none;
      border: none;
      font-weight: 500;
      cursor: pointer;
      box-shadow: 0 1px 1px rgba(0,0,0,0.12),
                 0 2px 2px rgba(0,0,0,0.12),
                 0 4px 4px rgba(0,0,0,0.12),
                0 8px 8px rgba(0,0,0,0.12),
                0 16px 16px rgba(0,0,0,0.12);
  }
 section .noi-dung .form .input-form input[type="submit"]:hover{
      background: #6694e9;
  }
  section .noi-dung .form .nho-dang-nhap{
      margin-bottom: 10px;
      color: #607d8b;
      font-size: 14px;
  }
  section .noi-dung .form .input-form p{
      color: #607d8b;
  }
 section .noi-dung .form .input-form p a{
      color: #ffb3b3;
  }

 section .noi-dung .form h3{
      color: #607d8b;
      text-align: center;
      margin: 80px 0 10px;
      font-weight: 500;
  }
 section .noi-dung .form .icon-dang-nhap{
      display: flex;
      justify-content: center;
      align-items: center;
  }
 section .noi-dung .form .icon-dang-nhap li{
      list-style: none;
      cursor: pointer;
      width: 50px;
      height: 50px;
      display: flex;
      justify-content: center;
      align-items: center;
  }
  section .noi-dung .form .icon-dang-nhap li:nth-child(1){
      color: #3b5999;
  }
  section .noi-dung .form .icon-dang-nhap li:nth-child(2){
      color: #dd4b39;
  }
  section .noi-dung .form .icon-dang-nhap li:nth-child(3){
      color: #55acee;
  }
  section .noi-dung .form .icon-dang-nhap li i{
      font-size: 24px;
  }

 @media (max-width: 768px){
     section .img-bg{
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
     }
     section .noi-dung{
         display: flex;
         justify-content: center;
         align-items: center;
         width: 100%;
         height: 100%;
         z-index: 1;
     }
     section .noi-dung .form{
         width: 100%;
         padding: 40px;
         background: rgba(255 255 255 / 0.9);
         margin: 50px;
     }
     section .noi-dung .form h3{
         color: #607d8b;
         text-align: center;
         margin: 30px 0 10px;
         font-weight: 500;
     }
 }

 </style>
 <section>
     <!--Bắt Đầu Phần Hình Ảnh-->
     <div class="img-bg">
         <img src="data:image/png;base64,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" alt="Hình Ảnh Minh Họa">
     </div>
     <!--Kết Thúc Phần Hình Ảnh-->
     <!--Bắt Đầu Phần Nội Dung-->
     <div class="noi-dung">
         <div class="form">
             <h2>Trang Đăng Nhập</h2>
             <form action="{{ route('postlogin') }}" method="POST" >
                @csrf
                 <div class="input-form">
                     <span>Email</span>
                     <input type="text" name="email">
                     @if ($errors->any())
                     <p style="color:red">{{ $errors->first('email') }}</p>
                 @endif
                 </div>
                 <div class="input-form">
                     <span>Mật khẩu</span>
                     <input type="password" name="password">
                     @if ($errors->any())
                     <p style="color:red">{{ $errors->first('password') }}</p>
                 @endif
                 </div>
                 <div class="nho-dang-nhap">
                     <label><input type="checkbox" name=""> Nhớ Đăng Nhập</label>
                     <a href="">Quên Mật Khẩu</a>
                 </div>
                 <div class="input-form">
                     <input type="submit" value="Đăng Nhập">
                 </div>
             </form>
         </div>
     </div>
     <!--Kết Thúc Phần Nội Dung-->
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script>
    @php
    if(Session::has('okmail')){
    @endphp
    Swal.fire({
         icon: 'success',
         title: 'Lấy mật khẩu thành công!',
         text: "Bạn chưa nhận được Email? Liên hệ SuperAdmin để xin cấp lại mật khẩu nhé!!! LH:0376301480 Email: tpnshop247@gmail.com",
         showClass: {
         popup: 'swal2-show'
             }
         })
     @php
    }
     @endphp
     </script>
 </section>

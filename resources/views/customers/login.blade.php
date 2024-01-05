<style>

.alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
        padding: 8px;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    .noi-dung {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.form {
  width: 300px;
  padding: 20px;
  background-color: #f2f2f2;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
  text-align: center;
  margin-bottom: 20px;
}

form {
  display: flex;
  flex-direction: column;
}

.input-form {
  margin-bottom: 10px;
}

.input-form span {
  display: block;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.nho-dang-nhap {
  margin-bottom: 10px;
}

.nho-dang-nhap label {
  display: flex;
  align-items: center;
}

.nho-dang-nhap input[type="checkbox"] {
  margin-right: 5px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

p {
  text-align: center;
}

p a {
  color: #4CAF50;
  text-decoration: none;
}

p a:hover {
  text-decoration: underline;
}
</style>

    <div class="noi-dung">
        <div class="form">
            <h2>LOGIN</h2>
            <form method="POST" action="{{ route('shop.checklogin') }}">
                @csrf

                <div class="input-form">
                    <span>Email</span>
                    <input type="text" name="email" value="{{ old('email') }}">
                </div>
                <div class="input-form">
                    <span>Password</span>
                    <input type="password" name="password">
                </div>
                @if ($errors->has('password'))
    <div class="alert alert-danger">
        {{ $errors->first('password') }}
    </div>
@endif
                <div class="nho-dang-nhap">
                    <label><input type="checkbox" name=""> Remember password</label>
                </div>
                <div class="input-form">
                    <input type="submit" value="Đăng Nhập">
                </div>
            </form>
            <div class="input-form">
                <p>Do not have an account? <a href="{{ route('shop.register') }}">Register</a></p>

                <p>Login With   <a href="{{ url('auth/google') }}"> </a> <img
                    src="{{ asset('user/img/google.png') }}" alt=""
                    style="width: 20px; height: auto;" onclick="redirectToLogin()"></p>
            <script>
                function redirectToLogin() {
                    window.location.href = "{{ url('auth/google') }}";
                }
            </script>

            </div>
        </div>
    </div>




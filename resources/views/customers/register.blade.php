<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #ccc;
        }

        p {
            text-align: center;
        }

        .registerbtn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .registerbtn:hover {
            background-color: #45a049;
        }

        .signin {
            text-align: center;
            margin-top: 16px;
        }
    </style>

    <script>
        function validateForm() {
            var password = document.getElementById("psw").value;
            var repeatPassword = document.getElementById("psw-repeat").value;
            var errorContainer = document.getElementById("error-container");

            if (password !== repeatPassword) {
                var errorMessage = "Mật khẩu không khớp";
                errorContainer.innerText = errorMessage;
                return false; // Ngăn chặn việc gửi biểu mẫu
            } else {
                errorContainer.innerText = ""; // Xóa thông báo lỗi nếu mật khẩu khớp
            }
        }
    </script>

</head>

<body>

    <form action="{{ route('shop.checkregister') }}" method="POST" onsubmit="return validateForm()">
        @csrf
        <div class="container">
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email" value="{{ old('email') }}">
            @error('email')
            <div style="color: red">{{ $message }}</div>
            @enderror

            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" id="name" value="{{ old('name') }}">
            @error('name')
            <div style="color: red">{{ $message }}</div>
            @enderror

            <label for="address"><b>Address</b></label>
            <input type="text" placeholder="Enter Address" name="address" value="{{ old('address') }}">
            @error('address')
            <div style="color: red">{{ $message }}</div>
            @enderror

            <label for="phone"><b>Phone</b></label>
            <input type="text" placeholder="Enter Phone" name="phone" value="{{ old('phone') }}">
            @error('phone')
            <div style="color: red">{{ $message }}</div>
            @enderror

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="psw">
            @error('password')
            <div style="color: red">{{ $message }}</div>
            @enderror

            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw_repeat" id="psw-repeat">
            <div id="error-container" style="color: red;"></div>

            <hr>
            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

            <button type="submit" class="registerbtn">Register</button>
        </div>

        <div class="container signin">
            <p>Already have an account? <a href="#">Sign in</a>.</p>
        </div>
    </form>

</body>

</html>

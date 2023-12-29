<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!DOCTYPE html>
    <html>
    <head>
      <title>Hiệu ứng đồ họa</title>
      <style>
        #myElement {
          width: 200px;
          height: 200px;
          background-color: red;
          display: none;
        }
      </style>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
        $(document).ready(function() {
          // Hide (Ẩn)
          $("#hideBtn").click(function() {
            $("#myElement").hide();
          });
          // Show (Hiện)
          $("#showBtn").click(function() {
            $("#myElement").show();
          });
          // Toggle (Chuyển đổi)
          $("#toggleBtn").click(function() {
            $("#myElement").toggle();
          });
          // Slide (Trượt)
          $("#slideUpBtn").click(function() {
            $("#myElement").slideUp();
          });
          $("#slideDownBtn").click(function() {
            $("#myElement").slideDown();
          });
          // Fade (Làm mờ)
          $("#fadeOutBtn").click(function() {
            $("#myElement").fadeOut();
          });
          $("#fadeInBtn").click(function() {
            $("#myElement").fadeIn();
          });
          // Animate (Tạo hiệu ứng)
          $("#animateBtn").click(function() {
            $("#myElement").animate({ opacity: 0.5, left: '200px', fontSize: '20px' }, 1000);
          });
        });
      </script>
    </head>
    <body>
      <button id="hideBtn">Ẩn</button>
      <button id="showBtn">Hiện</button>
      <button id="toggleBtn">Chuyển đổi</button>
      <button id="slideUpBtn">Trượt lên</button>
      <button id="slideDownBtn">Trượt xuống</button>
      <button id="fadeOutBtn">Làm mờ</button>
      <button id="fadeInBtn">Hiện rõ</button>
      <button id="animateBtn">Tạo hiệu ứng</button>
      <div id="myElement"></div>
    </body>
    </html>
</body>
</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('user/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('user/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('user/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    @include('includes_user.header')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @include('includes_user.sidebar')
    <!-- Navbar End -->


    <!-- Carousel Start -->


    <!-- Products Start -->
 @yield('content1')
    <!-- Products End -->





    <!-- Footer Start -->
    @include('includes_user.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>



        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var start = 5;
            var addToCartRoute = "{{ route('add.to.cart', '') }}";

            $('#load_more_button').click(function() {
                $.ajax({
                    url: "{{ route('load.more') }}",
                    method: "GET",
                    data: {
                        start: start
                    },
                    dataType: "json",
                    beforeSend: function() {
                        $('#load_more_button').html('Loading...');
                        $('#load_more_button').attr('disabled', true);
                    },
                    success: function(data) {
                        if (data.data.length > 0) {
                            var html = '';
                            for (var i = 0; i < data.data.length; i++) {
                                var product = data.data[i];
                                var addToCartUrl = addToCartRoute + '/' + product.id;
                                var detailUrl = '{{ route('detail', ['id' => ':productId']) }}';
                                detailUrl = detailUrl.replace(':productId', product.id);

                                html += `<div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4">
                                <div class="product-img position-relative overflow-hidden">
                                    <img style="width:200px ; height: 165px ; border-radius:0%"
                                        src="{{ asset('public/uploads/product/') }}/${product.image}" alt="">
                                    <div class="product-action">
                                        ${product.quantity > 0 ? `
                                                <a class="btn btn-outline-dark btn-square"
                                                    href="${addToCartUrl}"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                            ` : `
                                                <a class="btn btn-outline-dark btn-square disabled"
                                                    href="${addToCartUrl}"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                            `}
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                        <a class="btn btn-outline-dark btn-square"
                                            href="${detailUrl}"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate" href="">Số lượng:
                                        ${product.quantity}</a><br>
                                    <a class="h6 text-decoration-none text-truncate" href="">
                                        ${product.quantity <= 0 ? 'Hết hàng' : 'Còn hàng'}
                                    </a><br>
                                    <a class="h6 text-decoration-none text-truncate" href="">${product.name}</a>
                                                <div class="d-flex align-items-center justify-content-center mt-2">
                                                    <h5>${product.price}</h5>
                                                    <h6 class="text-muted ml-2"><del>${product.price}</del></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                            }

                            // Append data with fade in effect
                            $('#items_container').append($(html).hide().fadeIn(1000));
                            $('#load_more_button').html('Load More');
                            $('#load_more_button').attr('disabled', false);
                            start = data.next;
                        } else {
                            $('#load_more_button').html('No More Data Available');
                            $('#load_more_button').attr('disabled', true);
                        }
                    }
                });
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('user/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('user/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{ asset('user/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('user/js/main.js')}}"></script>
    @yield('scripts')
</body>

</html>





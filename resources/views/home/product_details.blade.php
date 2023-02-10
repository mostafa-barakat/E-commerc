<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
</head>

<body>
    {{-- <div class="hero_area"> --}}
        <!-- header section strats -->
        @include('home.header');
        <!-- end header section -->
    {{-- </div> --}}
    <div class="container d-flex justify-content-between align-items-center" style="height: 90vh">
        {{-- {{dd($product->image ) }} --}}
        <div class="row d-flex justify-content-center">
            <div class="col-sm-7  col-lg-6">
                <div class="image">
                    <img src="{{ asset("$product->image")}}" alt="imag">
                </div>
            </div>
            <div class="col-sm-6 col-lg-6 d-flex align-items-center">
                <div class="product_detalis ">
                    <h3 class="mb-3" style="font-size: 30px">Title: {{ $product->title }}</h3>
                    <p class="mb-3" style="font-size: 25px">Description: {{ $product->description }}</p>
                    <p class="mb-3" style="font-size: 20px">Quantity: {{ $product->quantity }}</p>
                    <p class="mb-3" style="font-size: 20px">Catagory: {{ $product->catagory }}</p>
                    @if ($product->discount_price != null)
                            <h6 style="color: red ; font-size: 20px">
                                Discount Price:{{ $product->discount_price }}$
                            </h6>
                            <h6 style="text-decoration: line-through ; color: blue ; font-size: 20px">
                                Price:{{ $product->price }}$
                            </h6>
                            @else
                            <h6 style=" color: blue , font-size: 20px">
                            ${{ $product->price }}
                            </h6>
                        @endif
                        <form action="{{ route('product.add_card' , $product->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="number" name="quantity" value="1" min="1" style="width: 100px">
                                </div>
                                <div class="col-md-4">
                                    <input type="submit" value="Add To Card" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <!-- footer start -->
        @include('home.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>
    <!-- jQery -->
    <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('home/js/bootstrap.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('home/js/custom.js') }}"></script>
</body>

</html>


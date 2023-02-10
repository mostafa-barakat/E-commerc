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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
</head>

<body>

    @include('sweetalert::alert')


    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header');
        <!-- end header section -->
        <!-- slider section -->
        @include('home.slider');
        <!-- end slider section -->
    </div>
    <!-- why section -->
        @include('home.why');
    <!-- end why section -->

    <!-- arrival section -->
        @include('home.arrival');
    <!-- end arrival section -->

    <!-- product section -->
        @include('home.product');
    <!-- end product section -->

    {{-- Comments --}}
    <div class="container mb-5">
        <h1 style="font-size: 25px " class="text-center mb-5">Comments</h1>
        <form action="{{ route('user.add_comment') }}" method="POST">
            @csrf

            <textarea name="comments"></textarea>
            <input type="submit" class="btn">
        </form>
        <a href="{{ route('home.all_comments') }}" class="btn btn-info">All Comments</a>
    </div>
    {{-- Comments --}}





    <!-- subscribe section -->
        @include('home.subscribe');
    <!-- end subscribe section -->
    <!-- client section -->
        @include('home.client')
    <!-- end client section -->
    <!-- footer start -->
        @include('home.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
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

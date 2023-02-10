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

        @include('home.header');
        <!-- end header section -->




        <div class="container mb-5">
            <h2 class="mb-5" style="font-size: 25px">All Product In Your Card</h2>
            <table class="table table-striped " >
                <thead class="table table-dark">
                    <tr>
                        <td class="w-25">Image</td>
                        <td>Title</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $totil_price = 0 ?>
                    @forelse ($cards as $card)
                        <tr>
                            <td><img src="{{ $card->image }}" alt="" width="300"></td>
                            <td class="">{{ $card->product_title }}</td>
                            <td>{{ $card->price }}$</td>
                            <td>{{ $card->quantity }}</td>
                            <td>
                                <form class="d-inline" action="{{ route('user.destroy', $card->id) }}"method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Are you sure?!')" class="btn btn-sm btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                        <?php $totil_price = $totil_price + $card->price ?>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">The Card Empty</td>
                    </tr>

                    @endforelse
                </tbody>
                <tfoot class="text-center table table-dark">
                    <tr>
                            <td colspan="2">Total Price : {{  $totil_price }}$</td>

                            <td colspan="3"><a href="{{ route('payment.stripe' , $totil_price) }}" class="btn btn-success">Pay Using Card</a></td>
                    </tr>
                </tfoot>
            </table>
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

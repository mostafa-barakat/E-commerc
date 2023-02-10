<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel ">
            <div class="content-wrapper">
                <div class="container">
                    <h2 class="text-center" style="font-size: 25px">All Order</h2>

                    <form action="{{ route('admin.search') }}" method="GET">
                        @csrf

                        <div class="my-5 text-center">
                            <input type="text" name="search" placeholder="Search For Somthing" class="text-primary">
                            <input type="submit" value="Search" class="btn btn-info p-3">
                        </div>
                    </form>

                    <table class="table table-bordered border-primary w-50 m-auto">
                        <thead class="table-light">
                            <tr class="text-primary">
                                <td>Name</td>
                                <td>Email</td>
                                <td>Phone</td>
                                <td>Product Title</td>
                                <td>Quantity</td>
                                <td>Price</td>
                                <td>Send Email</td>
                            </tr>
                        </thead>
                        <tbody class="table-light">
                                @forelse ( $orders as $order)
                                    <tr>
                                        <td>{{ $order->name  }}</td>
                                        <td>{{ $order->email  }}</td>
                                        <td>{{ $order->phone  }}</td>
                                        <td>{{ $order->product_title  }}</td>
                                        <td>{{ $order->quantity  }}</td>
                                        <td>{{ $order->price  }}</td>
                                        <td><a href="{{ route('admin.send_email' , $order->id ) }}" class="btn btn-primary">Send Email</a></td>
                                    </tr>
                                @empty
                                <td colspan="7" class="text-center text-primary">EMPTY</td>
                                @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
    </div>
    @include('admin.script')
</body>

</html>

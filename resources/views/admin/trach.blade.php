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
                    <h2 class="text-center mb-5">Deleteed product</h2>
                    <button class="btn btn-sm btn-primary"><a href="{{ route('admin.show_product') }}">Return Product Page</a></button>

                    <table class="table table-bordered border-primary w-50 m-auto">
                        <thead class="table-light">
                            <tr class="text-primary">
                                <td>ID</td>
                                <td>Title</td>
                                <td>Description</td>
                                <td>Price</td>
                                <td>Discount Price</td>
                                <td>Quantity</td>
                                <td>Catagory</td>
                                <td>image</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                                @forelse ( $products as $product)
                                <tr>
                                    <td class="text-primary">{{ $product->id }}</td>
                                    <td class="text-primary">{{ $product->title }}</td>
                                    <td class="text-primary">{{ $product->description }}</td>
                                    <td class="text-primary">{{ $product->price }}</td>
                                    <td class="text-primary">{{ $product->discount_price }}</td>
                                    <td class="text-primary">{{ $product->quantity }}</td>
                                    <td class="text-primary">{{ $product->catagory }}</td>
                                    <td class="text-primary"><img src="{{ $product->image }}" alt=""></td>
                                    <th>
                                        <a href="{{ route('admin.restore', $product->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.forcdelete', $product->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-trash"></i></a>
                                    </th>
                                </tr>
                                @empty
                                <td colspan="9" class="text-center text-primary">EMPTY</td>
                                @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
    <!-- container-scroller -->
    </div>
    <!-- plugins:js -->
        @include('admin.script')
</body>

</html>

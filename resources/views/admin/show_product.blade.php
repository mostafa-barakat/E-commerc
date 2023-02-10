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
                    <h2 class="text-center mb-5">All Products</h2>

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
                                        <a href="{{ route('admin.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        <form class="d-inline" action="{{ route('admin.destroy', $product->id) }}"method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Are you sure?!')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </th>
                                </tr>
                                @empty
                                <td colspan="9" class="text-center text-primary">EMPTY</td>
                                @endforelse

                        </tbody>
                    </table>
                    <a href="{{ route('admin.trach') }}"><i class="fa-solid fa-recycle btn btn-sm btn-primary"></i></a>
                </div>
            </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    </div>

        @include('admin.script')
</body>

</html>

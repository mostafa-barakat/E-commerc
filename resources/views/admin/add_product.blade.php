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
                @if (session('message'))
                        <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        </div>
                    @endif
                <h2 class="text-center">Add New Product</h2>
                <form class="w-50 m-auto" action="{{ route('admin.add_product_data') }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror text-primary" value="{{ old('title') }}">
                        @error('title')
                            <small class="invalid-feddback text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror text-primary" value="{{ old('description') }}">
                        @error('description')
                            <small class="invalid-feddback text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Price</label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror text-primary" value="{{ old('price') }}">
                        @error('price')
                            <small class="invalid-feddback text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Discount_price</label>
                        <input type="number" name="discount_price" class="form-control @error('discount_price') is-invalid @enderror text-primary" value="{{ old('discount_price') }}">
                        @error('discount_price')
                            <small class="invalid-feddback text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label>Quantity</label>
                        <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror text-primary" value="{{ old('quantity') }}">
                        @error('quantity')
                            <small class="invalid-feddback text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label>Catagory</label>
                        <select class="form-control bg-light" name="catagory">
                        @foreach ( $catagorys as  $catagorys)
                            <option>{{ $catagorys->name }}</option>
                        @endforeach
                        </select>
                        {{-- <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror text-primary" value="{{ old('quantity') }}">
                        @error('quantity')
                            <small class="invalid-feddback text-danger">{{ $message }}</small>
                        @enderror --}}
                    </div>
                    <div class="mb-4">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror text-primary">
                        @error('image')
                            <small class="invalid-feddback text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button class="btn btn-success w-100 p-3">Add New Product</button>
                </form>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
    </div>
    @include('admin.script')
</body>

</html>

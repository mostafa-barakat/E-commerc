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
                <h2 class="text-center">Edit product : {{ $product->title }}</h2>
                <form class="w-50 m-auto" action="" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title"
                            class="form-control @error('title') is-invalid @enderror text-primary"
                            value="{{ old('title', $product->title) }}">
                        @error('title')
                            <small class="invalid-feddback text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <input type="text" name="description"
                            class="form-control @error('description') is-invalid @enderror text-primary"
                            value="{{ old('title', $product->description) }}">
                        @error('description')
                            <small class="invalid-feddback text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Price</label>
                        <input type="number" name="price"
                            class="form-control @error('price') is-invalid @enderror text-primary"
                            value="{{ old('price', $product->price )}}">
                        @error('price')
                            <small class="invalid-feddback text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Discount_price</label>
                        <input type="number" name="discount_price"
                            class="form-control @error('discount_price') is-invalid @enderror text-primary"
                            value="{{ old('discount_price', $product->discount_price) }}">
                        @error('discount_price')
                            <small class="invalid-feddback text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label>Quantity</label>
                        <input type="number" name="quantity"
                            class="form-control @error('quantity') is-invalid @enderror text-primary"
                            value="{{ old('quantity', $product->quantity) }}">
                        @error('quantity')
                            <small class="invalid-feddback text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- <div class="mb-4">
                        <label>Catagory</label>
                        <select class="form-control bg-light" name="catagory">
                            @foreach ($catagorys as $catagory)
                                <option>{{ $catagorys->name}}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="mb-4">
                        <label>Image</label>
                        <input type="file" name="image"
                            class="form-control @error('image') is-invalid @enderror text-primary">
                        @error('image')
                            <small class="invalid-feddback text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button class="btn btn-info px-5 w-100" >Update</button>
                </form>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
    </div>
    @include('admin.script')
</body>

</html>

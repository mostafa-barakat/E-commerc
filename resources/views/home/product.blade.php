<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="search">
            <form action="{{ route('user.product_search') }}" method="GET">
                @csrf
                <input type="text" name="search" class="w-25" placeholder="Search For Product">
                <input type="submit" value="Search" class="btn btn-info">
            </form>
        </div>
        <div class="row mb-5">
            @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{ route('user.product_details' , $product->id)   }}" class="option1">
                                Products Details
                            </a>
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
                    <div class="img-box">
                        <img src="{{ $product->image }}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            {{ $product->title }}
                        </h5>
                        @if ($product->discount_price != null)
                            <h6 style="color: red">
                                ${{ $product->discount_price }}
                            </h6>
                            <h6 style="text-decoration: line-through ; color: blue">
                                ${{ $product->price }}
                            </h6>
                            @else
                            <h6 style=" color: blue">
                            ${{ $product->price }}
                            </h6>
                        @endif

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
</section>

@extends('layouts.master')

@section('content')
<main id="shop" class="style3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-shop">
                    @if (count($products) > 0)
                    <div class="wrap-imagebox">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-md-4 col-sm-6">
                                    <div class="product-box">
                                        <div class="imagebox style8">
                                            <div class="box-image owl-carousel-1">
                                            <a href="#" title="" style="height: 200px !important;">
                                                <img src="{{$product->thumbnail}}" style="width: 100%; object-fit: cover;" alt="">
                                            </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name ">
                                                    <a href="#" style="text-transform: capitalize;" title="{{ $product->category }}">{{ $product->category ?? 'Uncategorized' }}</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">{{ $product->title }}<br /></a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">${{$product->price}}</span>
                                                    <span class="regular">${{ round($product->price + ($product->price * ($product->discount_percentage / 100)), 2, PHP_ROUND_HALF_UP) }}</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox style8 -->
                                    </div><!-- /.product-box -->
                                </div><!-- /.col-md-4 col-sm-6 -->
                            @endforeach
                        </div><!-- /.row -->
                    </div><!-- /.wrap-imagebox -->
                    <div class=" mx-auto my-5 d-flex justify-content-center" style="margin: 10px auto; text-center">
                           {!! $products->links() !!}
                    </div><!-- /.blog-pagination -->
                    @else
                    <div class="alert alert-warning">
                        Oops! No products found
                    </div>
                    @endif
                </div><!-- /.main-shop -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</main><!-- /#shop -->
{{--
    <div class="container">
        <h2>Product List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Discount Percentage</th>
                    <th>Rating</th>
                    <th>Stock</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Thumbnail</th>
                    <!-- Add other columns as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount_percentage }}</td>
                        <td>{{ $product->rating }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->category }}</td>
                        <td>
                            <img src="{{ $product->thumbnail }}" alt="{{ $product->title }}" style="max-width: 50px;">
                        </td>
                        <!-- Add other columns as needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $products->links() }}
    </div> --}}
@endsection

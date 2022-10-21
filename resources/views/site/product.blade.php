@extends('site.master')
@section('title', 'product |' . env('APP_NAME'))
@section('content')
    @php
        $name = 'name_' . app()->currentLocale();
        $content2 = 'content_' . app()->currentLocale();
    @endphp


    <section class="single-product">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('site.index') }}">Home</a></li>
                        <li><a href="{{ route('site.shop') }}">Shop</a></li>
                        <li class="active">{{ $product->$name }}</li>
                    </ol>
                </div>
                <div class="col-md-6">
                    <ol class="product-pagination text-right">
                        @if ($next)
                            <li><a href="{{ route('site.product', $next->id) }}"><i class="tf-ion-ios-arrow-left"></i> Next
                                </a></li>
                        @endif
                        @if ($prev)
                            <li><a href="{{ route('site.product', $prev->id) }}">Preview <i
                                        class="tf-ion-ios-arrow-right"></i></a></li>
                        @endif
                    </ol>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-md-5">
                    <div class="single-product-slider">
                        <div class='item active'>
                            <img style="max-width: 100%" src='{{ asset('uploads/products/' . $product->image) }}'
                                alt='' />
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-details">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                        <div class="single-product-details">
                        <h2>{{ $product->$name }}</h2>
                        @php
                        $rating = $product->reviews()->where('local', app()->currentLocale())->avg('star');
                        @endphp

                        @foreach(range(1,5) as $i)
                            <span class="fa-stack" style="width:1em">
                                <i class="far fa-star fa-stack-1x"></i>

                                @if($rating >0)
                                    @if($rating >0.5)
                                        <i class="fas fa-star fa-stack-1x"></i>
                                    @else
                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                    @endif
                                @endif
                                @php $rating--; @endphp
                            </span>
                        @endforeach
                        <p class="product-price">${{ $product->price }}</p>

                        <p class="product-description mt-20">
                            {!! Str::words($product->$content2, 19, '...') !!}
                        </p>
                        <div class="product-quantity">
                            <span>Quantity:</span>
                            <div class="product-quantity-slider">
                                <input id="product-quantity" type="text" value="0" name="product-quantity">
                            </div>
                        </div>
                        <div class="product-category">
                            <span>Categories:</span>
                            <ul>
                                <li><a
                                        href="{{ route('site.category', $product->category_id) }}">{{ $product->category->$name }}</a>
                                </li>
                            </ul>
                        </div>
                        <a href="cart.html" class="btn btn-main mt-20">Add To Cart</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="tabCommon mt-20">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Details</a></li>
                            <li class=""><a data-toggle="tab" href="#reviews" aria-expanded="false">Reviews ({{ $product->reviews()->where('local',app()->currentLocale())->count() }})</a>
                            </li>
                        </ul>
                        <div class="tab-content patternbg">
                            <div id="details" class="tab-pane fade active in">
                                <h4>Product Description</h4>
                                {!! $product->$content2 !!}
                            </div>
                            <div id="reviews" class="tab-pane fade">
                                <div class="post-comments">
                                    <ul class="media-list comments-list m-bot-50 clearlist">
                                        @foreach ($product->reviews()->where('local',app()->currentLocale())->get() as $review)

                                        {{-- @if ($review->local == app()->currentLocale()) --}}
                                                <li class="media">

                                                    <a class="pull-left" href="#!">
                                                        <img class="media-object comment-avatar"
                                                            src="https://ui-avatars.com/api/?name={{ $review->user->name }}" alt="" width="50"
                                                            height="50" />
                                                    </a>

                                                    <div class="media-body">
                                                        <div class="comment-info">
                                                            <h4 class="comment-author">
                                                                <a href="#!">{{$review->user->name}}</a>

                                                            </h4>
                                                            <time datetime="2013-04-06T13:53">
                                                                {{ $review->created_at->format('F d ,Y ,') }} at
                                                                {{ $review->created_at->format('h:i') }}

                                                            </time>
                                                            <a class="comment-button" href="#!"><i
                                                                    class="tf-ion-star"></i>{{ $review->star }}</a>
                                                        </div>

                                                        <p>
                                                            {{ $review->comment }}
                                                        </p>
                                                    </div>

                                                </li>
                                            {{-- @endif --}}
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="products related-products section">
        <div class="container">
            <div class="row">
                <div class="title text-center">
                    <h2>Related Products</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="product-item">
                        <div class="product-thumb">
                            <span class="bage">Sale</span>
                            <img class="img-responsive" src="images/shop/products/product-5.jpg" alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                        <span data-toggle="modal" data-target="#product-modal">
                                            <i class="tf-ion-ios-search"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="#"><i class="tf-ion-ios-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-single.html">Reef Boardsport</a></h4>
                            <p class="price">$200</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img class="img-responsive" src="images/shop/products/product-1.jpg" alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                        <span data-toggle="modal" data-target="#product-modal">
                                            <i class="tf-ion-ios-search-strong"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="#"><i class="tf-ion-ios-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-single.html">Rainbow Shoes</a></h4>
                            <p class="price">$200</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img class="img-responsive" src="images/shop/products/product-2.jpg" alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                        <span data-toggle="modal" data-target="#product-modal">
                                            <i class="tf-ion-ios-search"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="#"><i class="tf-ion-ios-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-single.html">Strayhorn SP</a></h4>
                            <p class="price">$230</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img class="img-responsive" src="images/shop/products/product-3.jpg" alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                        <span data-toggle="modal" data-target="#product-modal">
                                            <i class="tf-ion-ios-search"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="#"><i class="tf-ion-ios-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-single.html">Bradley Mid</a></h4>
                            <p class="price">$200</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@stop

<section class="single_product_details_area mb-50">
        <div class="produts-details--content mb-50">
            <div class="container">
                <div class="row justify-content-between">

                    <div class="col-12 col-md-6 col-lg-5">

                    <div class="photo-gallery">
                            <div class="container">
                                <div class="row photos">
                                    @if($product->image_1)<div class="col-sm-6 item"><a href="{{ $product->image_1 }}" data-lightbox="photos"><img style="padding-top:5px;width: 200px; height: 150px; object-fit: cover;" class="img-fluid" src="{{ $product->image_1 }}"></a></div>@endif
                                    @if($product->image_2)<div class="col-sm-6 item"><a href="{{ $product->image_2 }}" data-lightbox="photos"><img style="padding-top:5px;width: 200px; height: 150px; object-fit: cover;" class="img-fluid" src="{{ $product->image_2 }}"></a></div>@endif
                                    @if($product->image_3)<div class="col-sm-6 item"><a href="{{ $product->image_3 }}" data-lightbox="photos"><img style="padding-top:5px;width: 200px; height: 150px; object-fit: cover;" class="img-fluid" src="{{ $product->image_3 }}"></a></div>@endif
                                    @if($product->image_4)<div class="col-sm-6 item"><a href="{{ $product->image_4 }}" data-lightbox="photos"><img style="padding-top:5px;width: 200px; height: 150px; object-fit: cover;" class="img-fluid" src="{{ $product->image_4 }}"></a></div>@endif
                                    @if($product->image_5)<div class="col-sm-6 item"><a href="{{ $product->image_5 }}" data-lightbox="photos"><img style="padding-top:5px;width: 200px; height: 150px; object-fit: cover;" class="img-fluid" src="{{ $product->image_5 }}"></a></div>@endif
                                    @if($product->image_6)<div class="col-sm-6 item"><a href="{{ $product->image_6 }}" data-lightbox="photos"><img style="padding-top:5px;width: 200px; height: 150px; object-fit: cover;" class="img-fluid" src="{{ $product->image_6 }}"></a></div>@endif
                                </div>
                            </div>
                        </div>

                        
                        <!-- <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="product-img" href="{{ $product->image_1 }}" title="Product Image">
                                        <img class="d-block w-100" src="{{ $product->image_1 }}" alt="1">
                                    </a>
                                    </div>
                                </div>
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url({{ $product->image_1 }});">
                                    </li>
                                </ol>
                            </div>
                        </div> -->

                    </div>

                    <div class="col-12 col-md-6">
                        <div class="single_product_desc">
                            <h4 class="title">{{ $product->name }}</h4>
                            @if($product->price)<h4 class="price">R {{ $product->price }}</h4>@endif
                            <div class="short_overview">
                                <p>{{ $product->description }}</p>
                            </div>

                            <div class="cart--area d-flex flex-wrap align-items-center">
                                <!-- Add to Cart Form -->
                                <form class="cart clearfix d-flex align-items-center" method="POST" action="{{ route('cart.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="12" name="quantity" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                    </div>
                                    <button type="submit" name="addtocart" value="5" class="btn btn-success ml-15">Add to cart</button>
                                    <input type="hidden" name="id" id="id" value="{{ $product->id }}" />
                                    <input type="hidden" name="name" id="name" value="{{ $product->name }}" />
                                    <input type="hidden" name="price" id="price" value="{{ $product->price }}" />
                                    <input type="hidden" name="image_1" id="image_1" value="{{ $product->image_1 }}" />
                                </form>
                                <!-- Wishlist & Compare -->
                                <div class="wishlist-compare d-flex flex-wrap align-items-center">
                                    <a href="#" class="wishlist-btn ml-15"><i class="icon_heart_alt"></i></a>
                                    <a href="#" class="compare-btn ml-15"><i class="arrow_left-right_alt"></i></a>
                                </div>
                            </div>

                            <div class="products--meta">
                                <p><span>SKU:</span> <span>CT2023-01-{{ $product->id }}</span></p>
                                <p><span>Category:</span> <span>{{ $category->name }}</span></p>
                                <!-- <p><span>Tags:</span> <span>plants, green, cactus </span></p> -->
                                <p>
                                    <!-- <span>Share on:</span>
                                    <span>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </span> -->
                                @if (auth()->user()->is_admin or auth()->user()->id == $product->user_id)
                                <form class="product_form" action="{{ route('product.destroy',$product->id) }}" method="POST">

                                    <!-- <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a> -->
                                    <a class="btn btn-primary" onclick="load_modal('{{ route('product.edit',$product->id) }}', '{{ $product->name }}')" href="#1">Edit</a>
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                @endif
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_details_tab clearfix">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs" role="tablist" id="product-details-tab">
                            <li class="nav-item">
                                <a href="#description" class="nav-link active" data-toggle="tab" role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a href="#addi-info" class="nav-link" data-toggle="tab" role="tab">Additional Information</a>
                            </li>
                        </ul>
                        <!-- Tab Content -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="description">
                                <div class="description_area">
                                    <p>{{ $product->long_description }}</p>
                                    
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="addi-info">
                                <div class="additional_info_area">
                                    <p>{{ $product->additional_information }}</p>
                                </div>
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

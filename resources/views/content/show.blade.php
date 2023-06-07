<section class="single_product_details_area mb-50">
        <div class="produts-details--content mb-50">
            <div class="container">
                <div class="row justify-content-between">

                    <div class="col-12 col-md-6 col-lg-5">

                    <div class="photo-gallery">
                            <div class="container">
                                <div class="row photos">
                                    @if($content->image_1)<div class="col-sm-6 item"><a href="/{{ $content->image_1 }}" data-lightbox="photos"><img style="padding-top:5px;width: 200px; height: 150px; object-fit: cover;" class="img-fluid" src="{{ $content->image_1 }}"></a></div>@endif
                                    @if($content->image_2)<div class="col-sm-6 item"><a href="/{{ $content->image_2 }}" data-lightbox="photos"><img style="padding-top:5px;width: 200px; height: 150px; object-fit: cover;" class="img-fluid" src="{{ $content->image_2 }}"></a></div>@endif
                                    @if($content->image_3)<div class="col-sm-6 item"><a href="/{{ $content->image_3 }}" data-lightbox="photos"><img style="padding-top:5px;width: 200px; height: 150px; object-fit: cover;" class="img-fluid" src="{{ $content->image_3 }}"></a></div>@endif
                                    @if($content->image_4)<div class="col-sm-6 item"><a href="/{{ $content->image_4 }}" data-lightbox="photos"><img style="padding-top:5px;width: 200px; height: 150px; object-fit: cover;" class="img-fluid" src="{{ $content->image_4 }}"></a></div>@endif
                                    @if($content->image_5)<div class="col-sm-6 item"><a href="/{{ $content->image_5 }}" data-lightbox="photos"><img style="padding-top:5px;width: 200px; height: 150px; object-fit: cover;" class="img-fluid" src="{{ $content->image_5 }}"></a></div>@endif
                                    @if($content->image_6)<div class="col-sm-6 item"><a href="/{{ $content->image_6 }}" data-lightbox="photos"><img style="padding-top:5px;width: 200px; height: 150px; object-fit: cover;" class="img-fluid" src="{{ $content->image_6 }}"></a></div>@endif
                                </div>
                            </div>
                        </div>

                        
                        <!-- <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="product-img" href="{{ $content->image_1 }}" title="Product Image">
                                        <img class="d-block w-100" src="{{ $content->image_1 }}" alt="1">
                                    </a>
                                    </div>
                                </div>
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url({{ $content->image_1 }});">
                                    </li>
                                </ol>
                            </div>
                        </div> -->

                    </div>

                    <div class="col-12 col-md-6">
                        <div class="single_product_desc">
                            <h4 class="title">{{ $content->name }}</h4>
                            <div class="short_overview">
                                <p>{{ $content->description }}</p>
                            </div>

                            <div class="cart--area d-flex flex-wrap align-items-center">
                                <!-- Add to Cart Form -->
                                <form class="cart clearfix d-flex align-items-center" method="post" action="cart">
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="12" name="quantity" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                    </div>
                                    <button type="submit" name="addtocart" value="5" class="btn alazea-btn ml-15">Add to cart</button>
                                </form>
                                <!-- Wishlist & Compare -->
                                <div class="wishlist-compare d-flex flex-wrap align-items-center">
                                    <a href="#" class="wishlist-btn ml-15"><i class="icon_heart_alt"></i></a>
                                    <a href="#" class="compare-btn ml-15"><i class="arrow_left-right_alt"></i></a>
                                </div>
                            </div>

                            <div class="products--meta">
                                <p><span>SKU:</span> <span>CT2023-01-{{ $content->id }}</span></p>
                                <p><span>Category:</span> <span>{{ $slot->name }}</span></p>
                                <!-- <p><span>Tags:</span> <span>plants, green, cactus </span></p> -->
                                <p>
                                    <!-- <span>Share on:</span>
                                    <span>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </span> -->
                                <form class="product_form" action="{{ route('product.destroy',$content->id) }}" method="POST">

                                    <!-- <a class="btn btn-primary" href="{{ route('product.edit',$content->id) }}">Edit</a> -->
                                    <a class="btn btn-primary" onclick="load_modal('{{ route('content.edit',$content->id) }}', '{{ $content->name }}')" href="#1">Edit</a>
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
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
                                    <p>{{ $content->long_description }}</p>
                                    
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="addi-info">
                                <div class="additional_info_area">
                                    <p>{{ $content->additional_information }}</p>
                                </div>
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
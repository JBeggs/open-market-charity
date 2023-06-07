<div class="container">
        <div class="row">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        </div>
        <div class="row">
        @if ($message = Session::get('error'))
            <div class="alert alert-warning">
                <p>{{ $message }}</p>
            </div>
        @endif
        </div>
    </div>
     
       <!-- Topic Cards -->
    <div id="cards_landscape_wrap-2">
        <div class="container">
        <br /><br />
            {{ $products->links() }}
            <div class="row">
            @foreach ($products as $product)
                <div class="product_display_{{$product->name}} col-xs-12 col-sm-6 col-md-3 col-lg-3" style="min-width:200px;">
                    <div class="card-flyer">
                        <div class="text-box">
                            <div class="product_image">
                                <br />
                                @php
                                    $randomNum = rand(1, 6);
                                    if($randomNum = 1 ){
                                        $image = $product->image_1;
                                    } else if($randomNum = 2 ){
                                        $image = $product->image_2;
                                    } else if($randomNum = 3 ){
                                        $image = $product->image_3;
                                    } else if($randomNum = 4 ){
                                        $image = $product->image_4;
                                    } else if($randomNum = 5 ){
                                        $image = $product->image_5;
                                    } else if($randomNum = 6 ){
                                        $image = $product->image_6;
                                    }

                                @endphp

                                <img style="padding-top:5px;width: 200px; height: 150px; object-fit: cover;" class="img-responsive" src="{{ $image }}" alt="" />
                            </div>
                            <div class="text-container">
                                <h6 class="product_name">{{ $product->name }}</h6>
                                <p class="product_description">{{ $product->description }}</p>
                            </div>
                                <a class="btn btn-info" onclick="load_modal('{{ route('product.show',$product->id) }}', '{{ $product->name }}')" href="#1">Show</a>
                            <br />
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <br /><br />
            {{ $products->links() }}
        </div>
    </div>
    <br /><br />
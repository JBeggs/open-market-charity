<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Charity</h2>
        </div>
        <div class="pull-right">
            
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 margin-tb">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
<form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data"> 
<div class="row">
  <div class="col-sm-6">
  
        @csrf
        @method('PUT')
    
        <div class="text-center">
            <button type="sutton" class="btn btn-primary">Save</button>
            <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
        </div>
        <div class="">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="3">
            <div class="form-group">
                <strong>Detail:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="description">{{ $product->description }}</textarea>
            </div>  
        </div>
        <div class="">
            <div class="form-group">
                <strong>Long Description:</strong>
                <textarea class="form-control" style="height:150px" name="long_description" placeholder="Long Description">{{ $product->long_description }}</textarea>
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <strong>Additional Information:</strong>
                <textarea class="form-control" style="height:150px" name="additional_information" placeholder="Additional Information">{{ $product->additional_information }}</textarea>
            </div>

        </div>
  </div>
  <div class="col-sm-6">
        <div class="">
            <div class="form-group">
                <strong>Image 1:{{ $product->image_1 }}</strong>
                <input type="file" name="image_1" class="form-control" placeholder="image 1">
                @if ($product->image_1)<img src="{{ $product->image_1 }}" width="300px">@endif
                <a class="btn btn-primary" onclick="" href="{{ route('destroy_image') }}?image=1&product={{ $product->id }}">Delete</a>
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <strong>Image 2:</strong>
                <input type="file" name="image_2" class="form-control" placeholder="image 2">
                @if ($product->image_2)<img src="{{ $product->image_2 }}" width="300px">@endif
                <a class="btn btn-primary" onclick="" href="{{ route('destroy_image') }}?image=2&product={{ $product->id }}">Delete</a>
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <strong>Image 3:</strong>
                <input type="file" name="image_3" class="form-control" placeholder="image 3">
                @if ($product->image_3)<img src="{{ $product->image_3 }}" width="300px">@endif
                <a class="btn btn-primary" onclick="" href="{{ route('destroy_image') }}?image=3&product={{ $product->id }}">Delete</a>
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <strong>Image 4:</strong>
                <input type="file" name="image_4" class="form-control" placeholder="image 4">
                @if ($product->image_4)<img src="{{ $product->image_4 }}" width="300px">@endif
                <a class="btn btn-primary" onclick="" href="{{ route('destroy_image') }}?image=4&product={{ $product->id }}">Delete</a>
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <strong>Image 5:</strong>
                <input type="file" name="image_5" class="form-control" placeholder="image 5">
                @if ($product->image_5)<img src="{{ $product->image_5 }}" width="300px">@endif
                <a class="btn btn-primary" onclick="" href="{{ route('destroy_image') }}?image=5&product={{ $product->id }}">Delete</a>
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <strong>Image 6:</strong>
                <input type="file" name="image_6" class="form-control" placeholder="image 6">
                @if ($product->image_6)<img src="{{ $product->image_6 }}" width="300px">@endif
                <a class="btn btn-primary" onclick="" href="{{ route('destroy_image') }}?image=6&product={{ $product->id }}">Delete</a>
            </div>
        </div>

        <div class="text-center">
            <button type="sutton" class="btn btn-primary">Save</button>
            <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
        </div>
    
  </div>

</div>
</form>
@if( isset($slot) ) {{ $slot }} @endif
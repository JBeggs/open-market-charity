@extends('layouts.app')

@section('content')

<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
<div class="container">
<div class="row">
@if ($errors->any())
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif
<div class="col-lg-6">

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
        </div>
            
        @csrf
        <div class="form-group">
            <strong>Name:</strong>
            <input type="text" name="name" class="form-control" placeholder="Name">
        </div>


        <div class="form-group">
            <strong>Category:</strong>
            <select name="category_id" class="form-control">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            </select>
        </div>


        <div class="form-group">
            <strong>Detail:</strong>
            <textarea class="form-control" style="height:150px" name="description" placeholder="description"></textarea>
        </div>


        <div class="form-group">
            <strong>Detail:</strong>
            <textarea class="form-control" style="height:150px" name="description" placeholder="description"></textarea>
        </div>


        <div class="form-group">
            <strong>Long Description:</strong>
            <textarea class="form-control" style="height:150px" name="long_description" placeholder="Long Description"></textarea>
        </div>


        <div class="form-group">
            <strong>Additional Information:</strong>
            <textarea class="form-control" style="height:150px" name="additional_information" placeholder="Additional Information"></textarea>
        </div>



        <div class="form-group">
            <strong>Price:</strong>
            <input type="number" class="form-control" name="price" placeholder="price">
        </div>

    </div>

    <div class="col-lg-6">

        <div class="form-group">
            <strong>Image 1:</strong>
            <input type="file" name="image_1" class="form-control" placeholder="image 1">
        </div>


        <div class="form-group">
            <strong>Image 2:</strong>
            <input type="file" name="image_2" class="form-control" placeholder="image 2">
        </div>


        <div class="form-group">
            <strong>Image 3:</strong>
            <input type="file" name="image_3" class="form-control" placeholder="image 3">
        </div>


        <div class="form-group">
            <strong>Image 4:</strong>
            <input type="file" name="image_4" class="form-control" placeholder="image 4">
        </div>


        <div class="form-group">
            <strong>Image 5:</strong>
            <input type="file" name="image_5" class="form-control" placeholder="image 5">
        </div>


        <div class="form-group">
            <strong>Image 6:</strong>
            <input type="file" name="image_6" class="form-control" placeholder="image 6">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
            <input type="hidden" name="user_id" id="user_id" value="{{ $user_id }}" />
        </div>
    </div>


</div>
</form>
</div>
@endsection
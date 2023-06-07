@extends('layouts.app')


@section('content')

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
    {{ $contents->links() }}
        <div class="container">
            <div class="row">
            @foreach ($contents as $content)
                <div class="content_display_{{$content->name}} col-xs-12 col-sm-6 col-md-3 col-lg-3" style="min-width:200px;">
                    <div class="card-flyer">
                        <div class="text-box">
                            <div class="content_image">
                                <br />
                                <img style="padding-top:5px;width: 200px; height: 150px; object-fit: cover;" class="img-responsive" src="{{ $content->image_1 }}" alt="" />
                            </div>
                            <div class="text-container">
                                <h6 class="content_name">{{ $content->name }}</h6>
                                <p class="content_description">{{ $content->description }}</p>
                            </div>
                            <form class="content_form" action="{{ route('content.destroy',$content->id) }}" method="POST">
                                <a class="btn btn-info" onclick="load_modal('{{ route('content.show',$content->id) }}', '{{ $content->name }}')" href="#1">Show</a>
                                <a class="btn btn-primary" onclick="load_modal('{{ route('content.edit',$content->id) }}', '{{ $content->name }}')" href="#1">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <br />
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        <br /><br />
    {{ $contents->links() }}
    </div>

        
        
    @if( isset($slot) ) {{ $slot }} @endif
@endsection
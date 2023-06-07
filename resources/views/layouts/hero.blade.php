@if(isset($contents))
<header>

  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">


    <div class="carousel-inner">
    
    @foreach ($contents as $content)
      <div class="carousel-item @if($loop->first) active @endif rounded-3" style="background-image: url('{{ $content->image_1 }}')">
        <div class="carousel-caption">
          <h5>{{ $content->name }}</h5>
          <p>{{ $content->description }}</p>
        </div>
      </div>
    @endforeach
   
    </div>

  </div>
</header>
@endif

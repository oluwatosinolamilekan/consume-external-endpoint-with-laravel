@extends('layouts.app')

@section('content')
  <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Thumbnail Gallery</h1>

  <hr class="mt-2 mb-5">

  <div class="row text-center text-lg-left">

  @foreach($arr as $item)
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="{{$response->ThumbnailUrl}}" alt="">
          </a>
    </div>
    @endforeach
    
  </div>
@endsection
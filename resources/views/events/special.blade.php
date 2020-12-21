@extends('layouts.app')

@section('content')
<div class="container">

<form class="form-inline">
    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>

  <hr>


    <div class="card-columns">
        @foreach($filter as $event)
        <div class="card">
            <img class="card-img-top" src="{{ $event->img_src }}" alt="{{ $event->title }}">
            <div class="card-body">
            <h5 class="card-title">{{ $event->title }}</h5>
            <p class="card-text">{{ $event->commandA }} - {{ $event->commandB }}</p>
            <p class="card-text"><small class="text-muted">Prediction: {{ $event->predict }}</small></p>
            <p class="card-text"><small class="text-muted">Views: {{ $event->views }}</small></p>
            </div>
        </div>
        @endforeach
    </div>

    <hr>
    <p>Total events count: {{ $totalCount }}</p>

</div>

@endsection
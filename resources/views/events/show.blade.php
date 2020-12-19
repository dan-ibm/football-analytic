@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>Detailed Analyze</h1>
        <hr>
        <h2>Title: {{ $event->title }}</h2>

        <h4>Team A: {{ $event->commandA }}</h4>
        <h4>Team B: {{ $event->commandB }}</h4>
        <p>Description: {{ $event->description }}<p>
        
        <h2>PREDICTION: {{ $event->predict }}</h2>
        </div>
    </div>
</div>
@endsection

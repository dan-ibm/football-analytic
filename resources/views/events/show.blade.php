@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>Detailed Analyze</h1>
        <hr>
        <div class="row">
            <div class="col-md-6 mb-3">
                <h2>Title: {{ $event->title }}</h2>
            </div>
            <div class="col-md-6 mb-3">
                <h3>Type: {{ $event->type }}</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <h4>Team A: {{ $event->commandA }}</h4>
            </div>
            <div class="col-md-6 mb-3">
                <h4>Team B: {{ $event->commandB }}</h4>
            </div>
        </div>
        <p>Description: {{ $event->description }}<p>
        
        <h2>PREDICTION: {{ $event->predict }}</h2>

        @if(Auth::user() != null && (Auth::user()->role == 'admin'))
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <a href="{{ route('event.edit', $event->id)}}" class="btn btn-primary">Edit</a>
                </div>
                <div class="col-md-6 mb-3">
                    <form action="{{ route('event.destroy', $event->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
        </div>
    </div>
</div>
@endsection

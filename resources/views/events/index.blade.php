@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>Football Analytics</h1>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">TeamA</th>
                <th scope="col">TeamB</th>
                <th scope="col">Predict</th>
                @if(Auth::user() != null)
                <th scope="col">ADMIN</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
            <tr>
                <th scope="row"><a href="event/{{$event->_id}}">Link<a></th>
                <td>{{ $event->commandA }}</td>
                <td>{{ $event->commandB }}</td>
                <td>{{ $event->predict }}</td>
                @if(Auth::user() != null)
                <td>Edit | Delete</td>
                @endif
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection

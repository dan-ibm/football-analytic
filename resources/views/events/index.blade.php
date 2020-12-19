@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if((Auth::user() != null) && (Auth::user()->role == 'admin'))
            <a class="btn btn-warning" href="events-create" role="button">Create Event</a><hr>
        @endif
        <h1 id="football">Football Analytics</h1>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">TeamA</th>
                <th scope="col">TeamB</th>
                <th scope="col">Predict</th>
                @if((Auth::user() != null) && (Auth::user()->role == 'admin'))
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($footballEvents as $key=>$event)
            <tr>
                <th scope="row"><a href="event/{{$event->_id}}">{{ $key+1 }}<a></th>
                <td>{{ $event->commandA }}</td>
                <td>{{ $event->commandB }}</td>
                <td>{{ $event->predict }}</td>
                @if(Auth::user() != null && (Auth::user()->role == 'admin'))
                <td>
                    <a href="{{ route('event.edit', $event->id)}}" class="btn btn-primary">...</a>
                </td>
                <td>
                    <form action="{{ route('event.destroy', $event->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">X</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
            </tbody>
        </table>
        <hr>
        <h1 id="hockey" >Hockey Analytics</h1>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">TeamA</th>
                <th scope="col">TeamB</th>
                <th scope="col">Predict</th>
                @if((Auth::user() != null) && (Auth::user()->role == 'admin'))
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($hockeyEvents as $key=>$event)
            <tr>
            <th scope="row"><a href="event/{{$event->_id}}">{{ $key+1 }}<a></th>
                <td>{{ $event->commandA }}</td>
                <td>{{ $event->commandB }}</td>
                <td>{{ $event->predict }}</td>
                @if(Auth::user() != null && (Auth::user()->role == 'admin'))
                <td>
                    <a href="{{ route('event.edit', $event->id)}}" class="btn btn-primary">...</a>
                </td>
                <td>
                    <form action="{{ route('event.destroy', $event->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">X</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
            </tbody>
        </table>

        <hr>
        <h1 id="cyber">Cybersport Analytics</h1>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">TeamA</th>
                <th scope="col">TeamB</th>
                <th scope="col">Predict</th>
                @if((Auth::user() != null) && (Auth::user()->role == 'admin'))
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($cyberEvents as $key=>$event)
            <tr>
                <th scope="row"><a href="event/{{$event->_id}}">{{ $key+1 }}<a></th>
                <td>{{ $event->commandA }}</td>
                <td>{{ $event->commandB }}</td>
                <td>{{ $event->predict }}</td>
                @if(Auth::user() != null && (Auth::user()->role == 'admin'))
                <td>
                    <a href="{{ route('event.edit', $event->id)}}" class="btn btn-primary">...</a>
                </td>
                <td>
                    <form action="{{ route('event.destroy', $event->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">X</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container col-sm-8 offset-sm-2">
            <h1 class="mb-3 text-info">Update an event</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif

                <form method="post" action="{{ route('event.update', $event->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="text-secondary" for="title">Title:</label>
                            <input type="text" class="form-control" name="title" value="{{ $event->title }}"/>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="text-secondary" for="predict">Prediction:</label>
                            <input type="text" class="form-control" name="predict" value="{{ $event->predict }}"/>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-secondary" for="type">Event Type:</label>
                            <select class="form-control" id="type" name="type">
                                <option>{{ $event->type }}</option>
                                @foreach($types as $type)
                                <option>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="text-secondary" for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="6">{{ $event->title }}"</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="text-secondary" for="commandA">Team A:</label>
                            <input type="text" class="form-control" name="commandA" value="{{ $event->commandA }}"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-secondary" for="commandB">Team B:</label>
                            <input type="tezt" class="form-control" name="commandB" value="{{ $event->commandB }}"/>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Update event</button>
                </form>
            </div>
        </div>

    </div>

@endsection
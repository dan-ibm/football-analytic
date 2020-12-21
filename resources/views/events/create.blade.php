@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container col-sm-8 offset-sm-2">
            <h1 class="mb-3 text-info">Add an event</h1>
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

                <form method="post" action="{{ route('events.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="text-secondary" for="title">Title:</label>
                            <input type="text" class="form-control" name="title"/>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="text-secondary" for="predict">Prediction:</label>
                            <input type="number" class="form-control" name="predict"/>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-secondary" for="type">Event Type:</label>
                            <select class="form-control" id="type" name="type">
                                @foreach($types as $type)
                                <option>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="text-secondary" for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="6"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="text-secondary" for="commandA">Team A:</label>
                            <input type="text" class="form-control" name="commandA"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-secondary" for="commandB">Team B:</label>
                            <input type="text" class="form-control" name="commandB"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="text-secondary" for="img_src">Image Link:</label>
                            <input type="text" class="form-control" name="img_src"/>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Add event</button>
                </form>
            </div>
        </div>

    </div>

@endsection
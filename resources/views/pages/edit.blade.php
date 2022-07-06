@extends('layouts.app')

@section('content')
    <div class="card">
        <h3>Edit Todo</h3>
        {!! Form::open(['action' => ['App\Http\Controllers\TodoController@update', $todo->id], 'method' => 'POST']) !!}
            {{Form::label('title', 'New Todo')}}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{ Form::text('title', $todo->title, ['class' => 'form-control', 'placeholder' => 'Title...'])}}
            </div>
            <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{ Form::text('body', $todo->body, ['class' => 'form-control', 'placeholder' => 'Body...'])}}
            </div>
            {{Form::submit('Submit'), ['class' => 'btn btn-primary']}}
        {{Form::hidden('_method', 'PUT')}}
        {!! Form::close()!!}
    </div>
@endsection


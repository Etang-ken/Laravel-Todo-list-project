@extends('layouts.app')

@section('content')
    <div>
        <h1>Todo List</h1>
        <br>
        
        <br>
            @if(count($todos) > 0)
                @foreach($todos as $todo)

                    <div class="row card">
                        <div class="col-7">
                            <h4 class="py-3">{{$todo->title}}</h4>
                            <p class="py-3">{{$todo->body}}</p>
                        </div>
                        <div class="col-4">
                            <a href="/todos/{{$todo->id}}/edit" class="btn btn-primary">Edit Todo</a>
                            {!!Form::open(['action' => ['App\Http\Controllers\TodoController@destroy', $todo->id], 'method' => 'POST'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}
                        </div>
                    </div>
                @endforeach
            @else 
                <p>No Todo is available</p>
            
            @endif
            <hr style="height: 2px;">

            <br><br>

        <div class="card">
            <h3>Create Todo</h3>
            {!! Form::open(['action' => 'App\Http\Controllers\TodoController@store', 'method' => 'POST']) !!}
                {{Form::label('title', 'New Todo')}}
                <div class="form-group">
                    {{Form::label('title', 'Title')}}
                    {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title...'])}}
                </div>
                <div class="form-group">
                    {{Form::label('body', 'Body')}}
                    {{ Form::text('body', '', ['class' => 'form-control', 'placeholder' => 'Body...'])}}
                </div>
                {{Form::submit('Submit'), ['class' => 'btn btn-primary']}}
            {!! Form::close()!!}
        </div>
    </div>
@endsection
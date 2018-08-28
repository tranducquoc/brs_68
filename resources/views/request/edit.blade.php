@extends('layouts.app')

@section('content')
<div class="container">
    @include('common/errors')
    <div class="row">
        {!! Form::open(['route' => ['requests.update', $id], 'method' => 'PATCH']) !!}
            <div class="form-group">
                {!! Form::label('title', 'title') !!}
                {!! Form::text('title', $requestBook->title , ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('author', 'author') !!}
                {!! Form::text('author', $requestBook->author, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'description') !!}
                {!! Form::text('description', $requestBook->description, ['class' => 'form-control']) !!}
            </div>
            {{ Form::hidden('user_id', Auth::user()->id) }}
            {{ Form::submit(trans('comment.submit'), ['class' => 'btn btn-primary']) }}
        {!! Form::close() !!}
    </div>

</div>
@endsection

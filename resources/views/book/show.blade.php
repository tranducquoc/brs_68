@extends('layouts.app')
@section('content')
    <div class="container">

        <h1 class="mt-4 mb-3"> @lang('book.title'):
            <small>
                <a href="#">{{ $book->title }}</a>
            </small>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">@lang('book.mark')</button>
        </h1>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @lang('book.you_sure')
                    </div>

                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-10">
                <img class="img-fluid rounded" src="{{ $book->image }}" alt="">
                <hr>
                <p>@lang('book.author'): {{ $book->author }}</p>
                <p>@lang('book.description'): {{$book->description}}</p>

            </div>

            <div class="container">

                @foreach($book->comments as $comment)
                    <div class="media mb-4">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $comment->user->name }}</h5>
                            <p>{{ $comment->content }}</p>
                            <span><small>{{ $comment->created_at }}</small></span>


                            @if (Auth::check())
                                <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{$comment->id}}')"> @lang('comment.edit') </button>

                            @endif


                        </div>

                    </div>

                @endforeach

                @if (Auth::check())
                    <div class="container">
                        {!! Form::open(['route' => 'comments.store']) !!}
                            <div class="form-group">
                                {{ Form::text('content', null, ['class' => 'form-control', 'required', 'placeholder' => trans('comment.push_comment')]) }}
                                {{ Form::hidden('user_id', Auth::user()->id) }}
                                {{ Form::hidden('book_id', $book->id) }}

                            </div>
                            {{ Form::submit(trans('comment.submit'), ['class' => 'btn btn-primary']) }}
                        {!! Form::close() !!}
                    </div>
                @endif
            </div>

            <div class="modal fade" id="editModal" role="dialog">
                <div class="modal-dialog">

                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"> @lang('comment.edit')</h4>
                        </div>
                        <div class="modal-body">
                            @if (Auth::check())
                                <div class="container">

                                    {!! Form::model($comment, ['method' => 'PATCH', 'route' => ['comments.update', $comment->id]]) !!}

                                        <div class="form-group">
                                            <label for="edit_comment"> @lang('comment.title_input')</label>
                                            {!! Form::text('edit_comment', null, ['class' => 'form-control', 'placeholder' => trans('comment.push_comment'), 'id' => 'edit_comment']) !!}
                                        </div>
                                        {{ Form::hidden('edit_id') }}
                                        {{ Form::submit(trans('comment.submit'), ['class' => 'btn btn-default']) }}
                                    {!! Form::close() !!}

                                </div>
                            @endif

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

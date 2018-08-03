@extends('layouts.app')
@section('content')
    <div class="container">

        <h1 class="mt-4 mb-3">@lang('book.title'):
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
                <img class="img-fluid rounded" src="{{ $book->images }}" alt="">
                <hr>
                <p>@lang('book.author'): {{ $book->author }}</p>
                <p>@lang('book.description'): {{$book->description}}</p>

            </div>
        </div>
    </div>
@endsection

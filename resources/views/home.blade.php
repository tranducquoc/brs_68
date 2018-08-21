@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-sm-8">

                {!! Form::open(['method'=>'GET', 'route'=>'search'])  !!}

                    <div class="input-group custom-search-form">
                        {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' =>trans('home.search')]) !!}
                        <span class="input-group-btn">
                            {!! Form::submit(trans('comment.submit')) !!}
                        </span>
                    </div>
                {!! Form::close() !!}

                <h2 class="mt-4">@lang('home.book_list')</h2>
            </div>
        </div>

        <div class="row">
            @foreach($books as $book)
            <div class="col-sm-4 my-4">
                <div class="card">
                    <a href="{{ route('books.show', $book->id) }}"><img class="card-img-top" src="{{ $book->image }}" alt=""></a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
@endsection

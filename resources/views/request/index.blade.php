@extends('layouts.app')

@section('content')
<div class="container">
    @include('notify')

    <div class="row">
        <a href="{{route('requests.create')}}" class="btn btn-success"> @lang('request.create') </a>
    </div>

    <div class="row">
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td> @lang('request.id') </td>
                        <td> @lang('request.title') </td>
                        <td> @lang('request.author') </td>
                        <td> @lang('request.description') </td>
                        <td> @lang('request.status') </td>
                        <td colspan="2"> @lang('request.action') </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requests as $request)
                    <tr>
                        <td>{{$request->id}}</td>
                        <td>{{$request->title}}</td>
                        <td>{{$request->author}}</td>
                        <td>{{$request->description}}</td>
                        <td>{{$request->StatusText}}</td>
                        <td>
                            @if ($request->StatusText == 'pending')
                                <a href="{{ route('requests.edit', $request->id) }}"> @lang('request.edit') </a>
                            @endif
                        </td>
                        <td>
                            {!! Form::open(['route' => ['requests.destroy', $request->id], 'method' => 'DELETE' ]) !!}
                                {{ Form::submit(trans('request.delete'), ['class' => 'btn btn-primary']) }}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        <div>
    </div>
</div>
@endsection

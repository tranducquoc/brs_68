@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> @lang('auth.register') </div>

                <div class="card-body">
                    {!! Form::open(['route' => 'register']) !!}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"> @lang('auth.name') </label>

                            <div class="col-md-6">

                                <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('auth.name')]) !!}
                                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                </div>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"> @lang('auth.adress_email') </label>

                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
                                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('auth.adress_email')]) !!}
                                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                </div>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"> @lang('auth.password') </label>

                            <div class="col-md-6">
                                 <div class="form-group {{ $errors->has('password') ? 'has-error' :'' }}">
                                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('auth.password')]) !!}
                                    {!! $errors->first('password','<span class="help-block">:message</span>') !!}
                                </div>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">@lang('auth.confirm_password') </label>

                            <div class="col-md-6">

                                {!! Form::password('password_confirmation', ['class' => 'form-control','placeholder' => trans('auth.confirm_password'), 'id' => 'password-confirm']) !!}

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {!! Form::submit(trans('auth.register')) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

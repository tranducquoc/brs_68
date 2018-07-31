@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> @lang('auth.login') </div>

                <div class="card-body">
                    {!! Form::open(['route' => 'login']) !!}

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right"> @lang('auth.adress_email') </label>

                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
                                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('auth.adress_email')]) !!}
                                    {!! $errors->first('email','<span class="help-block">:message</span>') !!}
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
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">

                                    {!! Form::checkbox('remember', '', old('remember') ? 'checked' : '', ['class' => 'form-check-input', 'id' => 'remember']) !!}

                                    <label class="form-check-label" for="remember">
                                        @lang('auth.remember_me')
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                {!! Form::submit(trans('auth.login')) !!}

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    @lang('auth.forgot_password')
                                </a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> @lang('auth.reset_pass') </div>

                <div class="card-body">
                    @include('notify')

                     {!! Form::open(['route' => 'password.request']) !!}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"> @lang('auth.adress_email') </label>

                            <div class="col-md-6">

                                <div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
                                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' =>trans('auth.adress_email')]) !!}
                                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                </div>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {!! Form::submit(trans('auth.send_link_pass')) !!}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

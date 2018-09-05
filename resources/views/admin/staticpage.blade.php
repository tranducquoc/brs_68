@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                    <a href="{{route('requestbooks.index')}}" class="btn btn-success"> @lang('admin.manage_request') </a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-home"></i></span>
                <div class="info-box-content">
                    <a href="{{route('requestbooks.index')}}" class="btn btn-success"> @lang('admin.manage_user') </a>
                </div>
            </div>
        </div>
    </div>
@endsection

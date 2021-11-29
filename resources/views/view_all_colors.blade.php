@extends('master')

@section('common_css')
@parent
<link rel="stylesheet" href="{{ asset('css/view_color.css') }}">
@endsection

@section('content')
<div class="row">
    <a href="{{ route('user.set_user_color', ['uuid' => $uuid, 'color_code' => config('constants.color_hex_code.GREEN')]) }}">
        <div class="col-sm-6" style="height:400px; background-color:#{{config('constants.color_hex_code.GREEN')}}">
        </div>
    </a>

    <a href="{{ route('user.set_user_color', ['uuid' => $uuid, 'color_code' => config('constants.color_hex_code.RED')]) }}">
        <div class="col-sm-6" style="height:400px; background-color:#{{config('constants.color_hex_code.RED')}}">
        </div>
    </a>

    <a href="{{ route('user.set_user_color', ['uuid' => $uuid, 'color_code' => config('constants.color_hex_code.YELLOW')]) }}">
        <div class="col-sm-6" style="height:400px; background-color:#{{config('constants.color_hex_code.YELLOW')}}">
        </div>
    </a>

    <a href="{{ route('user.set_user_color', ['uuid' => $uuid, 'color_code' => config('constants.color_hex_code.BLUE')]) }}">
        <div class="col-sm-6" style="height:400px; background-color:#{{config('constants.color_hex_code.BLUE')}}">
        </div>
    </a>
</div>
@endsection

@section('common_js')
@parent
@endsection
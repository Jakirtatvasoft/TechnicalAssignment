@extends('master')

@section('common_css')
@parent
<link rel="stylesheet" href="{{ asset('css/user_color.css') }}">
@endsection

@section('content')
<div class="row">

    <a href="{{ route('user.update_user_color', ['uuid' => $uuid, 'old_color_code' => $colorCode, 'new_color_code' => config('constants.color_hex_code.GREEN')]) }}">
        <div class="col-sm-6" style="height:400px; background-color:#{{config('constants.color_hex_code.GREEN')}}">
        </div>
    </a>

    <a href="{{ route('user.update_user_color', ['uuid' => $uuid, 'old_color_code' => $colorCode, 'new_color_code' => config('constants.color_hex_code.RED')]) }}">
        <div class="col-sm-6" style="height:400px; background-color:#{{config('constants.color_hex_code.RED')}}">
        </div>
    </a>
    
    @if(count($checkUserInfo->color) > 1)
        <div class=clearfix></div>
        <a data-href="{{ route('user.delete_user_color', ['uuid' => $uuid, 'color_code' => $colorCode]) }}" class="delete_button">
        <center>
            <i class="fa fa-trash-o delete_icon" id="{{ $uuid }}" style="font-size:100px;color:black"></i>
        </center>
        </a>
    @endif
    
    <a href="{{ route('user.update_user_color', ['uuid' => $uuid, 'old_color_code' => $colorCode, 'new_color_code' => config('constants.color_hex_code.YELLOW')]) }}">
        <div class="col-sm-6" style="height:400px; background-color:#{{config('constants.color_hex_code.YELLOW')}}">
        </div>
    </a>

    <a href="{{ route('user.update_user_color', ['uuid' => $uuid, 'old_color_code' => $colorCode, 'new_color_code' => config('constants.color_hex_code.BLUE')]) }}">
        <div class="col-sm-6" style="height:400px; background-color:#{{config('constants.color_hex_code.BLUE')}}">
        </div>
    </a>

</div>
@endsection

@section('common_js')
@parent
@endsection
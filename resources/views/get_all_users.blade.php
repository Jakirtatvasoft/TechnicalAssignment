@extends('master')

@section('common_css')
@parent
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
<h2>Users List</h2>
    <table class="table table-bordered">
        <tbody>

        @foreach($getAllListUsers as $user)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user['uuid'] }}</td>
            <td>
                <select class="form-control select_color" id="select_color" name="select_color">
                    <option value="" id="" style="background-color: #FFFFFF">Choose color</option>

                    @if($user->color->count())
                    @foreach($user->color as $colorInfo)
                    <option value="{{ $user['uuid'] }}" id="{{ $colorInfo->color_code }}" style="background:#{{ $colorInfo->color_code }}">#{{ $colorInfo->color_code }}</option>
                    @endforeach
                    @endif
                </select>
            </td>
            <td><a href="{{ route('user.view_all_colors', ['uuid' => $user['uuid']]) }}" class="btn btn-info" role="button"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
        </tr>
        @endforeach

        </tbody>
    </table>
@endsection

@section('common_js')
@parent
@endsection
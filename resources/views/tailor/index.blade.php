@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tailors</h1>
@stop

@section('content')
    <table class="table card p-3">
        <tr>
            <th>SL</th>
            <th>
                Name
            </th>
            <th>Email</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($users as $key=>$user)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if(!$user->is_verified)
                        <a class="btn btn-success btn-sm" href="/approve/{{$user->id}}">Approve</a>
                    @else
                        Approved
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{route('tailors.show',$user->id)}}">View</a>
                </td>
            </tr>
        @endforeach
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

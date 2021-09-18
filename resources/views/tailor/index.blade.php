@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tailors</h1>
@stop

@section('content')
    <a class="btn btn-link" href="{{route('tailors.create')}}">Add Tailors</a>
    <table class="table card p-3">
        <tr>
            <th>SL</th>
            <th>
                Name
            </th>
            <th>Email</th>
        </tr>
        @foreach($users as $key=>$user)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
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

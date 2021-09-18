@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tailors</h1>
@stop

@section('content')
<div>
    <form action="{{route('tailors.store')}}" method="post">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Tailor Name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Tailor Email">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="password" placeholder="Tailor Password">
        </div>
        <input type="submit" value="Add">
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

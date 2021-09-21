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
            <input class="form-control" type="file" name="photo" placeholder="Profile Photo" id="">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Tailor Name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" disabled value="{{$user->email}}" name="email" placeholder="Tailor Email">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="phone" value="{{$user->phone}}" placeholder="Phone Number">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="address" id="" cols="30" rows="3"  placeholder="Shop Address">{{$user->address}}</textarea>
        </div>
        <input type="submit" value="Update">
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

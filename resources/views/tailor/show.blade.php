@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tailors</h1>
@stop

@section('content')
<div>
    <form action="{{route('tailors.update',$user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="">Name</label>
            <input disabled type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Tailor Name">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" disabled value="{{$user->email}}" name="email" placeholder="Tailor Email">
        </div>
        <div class="form-group">
            <label for="">Phone</label>
            <input disabled type="text" class="form-control" name="phone" value="{{$user->phone}}" placeholder="Phone Number">
        </div>
        <div class="form-group">
            <label for="">Shop Address</label>
            <textarea disabled="" class="form-control" name="address" id="" cols="30" rows="3"  placeholder="Shop Address">{{$user->address}}</textarea>
        </div>
    </form>
    <div>
        <h1>Tailor's Work</h1>
        <div class="row">
        @foreach($user->medias as $file)
            <div class="col-md-3">
                <img class="m-2" style="width: 300px" src="{{asset($file->media_url)}}" alt="">
        </div>
        @endforeach
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

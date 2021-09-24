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
            <label for="">Select QR code</label>
           <div>
               <img class="img-fluid" style="height: 100px" src="{{asset($user->photo_url)}}" alt="">
           </div>
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
    <div>
        <h1>Add my work</h1>
        <div class="row p-3 m-2">
        @foreach($user->medias as $file)
            <div class="col-md-3 m-2">
                <img class="card m-3 p-2" style="width: 300px" src="{{asset($file->media_url)}}" alt="">
        </div>
        @endforeach
        </div>
        <form class="card p-3" action="{{route('tailors.add_work')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <input class="form-control" type="file" name="photo" placeholder="Profile Photo" id="">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Add">
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

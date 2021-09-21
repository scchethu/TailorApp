@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Order</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-4 card p-3 sticky-top">
        <form action="{{route('orders.store')}}" method="post">
            @csrf
            <input type="hidden" name="fabric_id" value="{{$fabric_id}}" >
            <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}" >
            <div class="form-group">
                <label for="">Measurements</label>
                <textarea  required class="form-control" name="measurements" id="" cols="30" rows="5" placeholder="Enter measurements"></textarea>
            </div>
            <div class="form-group">
                <label for="">Delivery Address</label>
                <textarea  required class="form-control" name="address" id="" cols="30" rows="5" placeholder="Enter Address"></textarea>
            </div>
            <div class="form-group">
                <label for="">Tailor</label>
                <select class="form-control" name="tailor_id" id="">
                    @foreach(\App\Models\Tailor::where('is_verified',true)->get() as $tailor)
                        <option value="{{$tailor->id}}">{{$tailor->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Place Order">
            </div>
        </form>
    </div>
    <div class="col-md-8">
        <h2>Standard Measurements</h2>
        <img class="img-fluid" src="{{asset('img/20210301_124536-01.jpeg')}}" alt="">
        <img class="img-fluid" src="{{asset('img/20210301_124613-01.jpeg')}}" alt="">
        <img class="img-fluid" src="{{asset('img/1632031820490_1632031644096_20210301_124602-01.jpeg')}}" alt="">
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

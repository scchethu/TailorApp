@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Fabrics</h1>
@stop

@section('content')
    <div class="row">
        @foreach($fabrics as $fabric)
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-img-top mx-auto p-4 "  >
                        <img class="img-fluid" style="width:100%;height: 200px;object-fit: scale-down" src="{{str_replace("public","storage",$fabric->image)}}"/>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            Type: {{$fabric->type}}
                        </div>
                        <div class="card-text">
                            Color: {{$fabric->color}}
                        </div>
                        @can('user')
                            <div>
                                <a href="{{route('orders.create',['fabric_id'=>$fabric->id])}}">Place Order</a>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Orders</h1>
    @can('tailor')
        <div class="float-right m-1">
            <a class="btn btn-success" href="{{route('tailors.edit',\Illuminate\Support\Facades\Auth::id())}}">Profile</a>
        </div>
    @endcan
@stop

@section('content')

        @if(session('error'))
            <div class="alert alert-warning">
                {{ session()->pull('error') }}
            </div>
            @endif
    @php
        $heads = [
            'ID',
            'fabric Type',
            ['label' => 'Tailor/Customer', 'width' => 40],
            ['label' => 'Order Status', 'no-export' => true, 'width' => 5],
            'View'
        ];


    @endphp

    {{-- Compressed with style options / fill data using the plugin config --}}
    <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark"
                          striped hoverable bordered compressed>
        @foreach($orders as $order)
            <tr>

                    <td>{{$order->id}}</td>
                    <td>{{$order->fabric->type}}</td>
                  @can('user')
                    <td>{{$order->tailor->name}}</td>
                @endcan
                @can('tailor')
                    <td>{{$order->user->name}}</td>
                @endcan
                    <td>{{$order->status}}</td>
                    <td><a href="{{route('orders.edit',$order->id)}}">View Order</a></td>
            </tr>
        @endforeach
    </x-adminlte-datatable>
@stop

@section('css')
<style>
    span.select2.select2-container.select2-container--default.select2-container--below.select2-container--focus,.select2.select2-container.select2-container--default{
        width: 100%!important;
    }
</style>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#colors').select2();
        });
    </script>

@stop

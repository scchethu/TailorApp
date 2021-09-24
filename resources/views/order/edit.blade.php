@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Orders</h1>
@stop

@section('content')
    <div class="col-6 card mx-auto p-3">
        <div class="card-title">
         <h2>   Order Details</h2>
        </div>
        <div class="img mx-auto">
            <img class="card p-3 m-3 img-fluid" style="height: 300px" src="{{asset(str_replace("public","storage",$order->fabric->image))}}" alt="">
        </div>
        <div>
            <span class="font-weight-bold">Fabric Type:</span>  {{$order->fabric->type}}
        </div>
        <div>
            <span class="font-weight-bold">Fabric Color:</span>   {{$order->fabric->color}}
        </div>
        <div>
            <span class="font-weight-bold"> Order to :</span>  {{$order->tailor->name}}
        </div>
        <div>
            <span class="font-weight-bold">Tailor's QR code :</span>
            <img style="height: 200px" src="{{asset($order->tailor->photo_url)}}" alt="">
        </div>
        <div>
            <span class="font-weight-bold">Measurements :</span>
            {{json_decode($order->measurements)->data}}
        </div>
        <div>
            <span class="font-weight-bold">Customer Name :</span>
            {{$order->user->name}}
        </div>

        <div>
            <span class="font-weight-bold">Customer Delivery Address :</span>
            {{$order->address}}
        </div>
        <div>
            <span class="font-weight-bold"> Status :</span>
            {{$order->status}}
        </div>

        <div>
            <span class="font-weight-bold"> Amount to be pay :</span>
            {{$order->amount}}
        </div>
        <form action="{{route('orders.update',$order->id)}}" method="post">
            @csrf
            @method('put')
          @can('tailor')
                <div class="form-group">
                    <label for="">Status</label>
                    <select class="form-control" name="status" id="">
                        <option @if($order->status ==\App\Models\Order::STATUS_PROCESSING) selected @endif>{{\App\Models\Order::STATUS_PROCESSING}}</option>
                        <option @if($order->status ==\App\Models\Order::STATUS_APPROVED) selected @endif>{{\App\Models\Order::STATUS_APPROVED}}</option>
                        <option @if($order->status ==\App\Models\Order::STATUS_PAID) selected @endif>{{\App\Models\Order::STATUS_PAID}}</option>
                        <option @if($order->status ==\App\Models\Order::STATUS_SHIPPED) selected @endif>{{\App\Models\Order::STATUS_SHIPPED}}</option>
                        <option @if($order->status ==\App\Models\Order::STATUS_DELIVERED) selected @endif>{{\App\Models\Order::STATUS_DELIVERED}}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Amount</label>
                    <input value="{{$order->amount}}" class="form-control" type="number" name="amount">
                </div>

            @endcan


            @if( $order->status ==\App\Models\Order::STATUS_DELIVERED)
                <div class="form-group">
                    <label for="">Feedback</label>
                    <textarea class="form-control" name="feedback" id="" cols="30" rows="10">{{$order->feedback}} </textarea>
                </div>
                <button class="btn badge-dark btn-primary" type="submit">Update Feedback</button>
                @endif
               @can('tailor')
                <div class="form-group">
                    <label for="">Feedback</label>
                    <textarea class="form-control" disabled="true" name="feedback" id="" cols="30" rows="10">{{$order->feedback}} </textarea>
                </div>
                <div class="form-group">
                    <button class="btn badge-dark btn-primary" type="submit">Update</button>
                </div>
            @endcan

            @can('user')
                @if($order->status !=\App\Models\Order::STATUS_PAID && $order->status !=\App\Models\Order::STATUS_PROCESSING )
                    <div class="form-group">
                        <input type="hidden" name="is_paid" value="true">
                        <button class="btn badge-dark btn-primary" name="pay" type="submit">Pay</button>
                    </div>
                    @endif
            @endcan
        </form>
    </div>
@stop


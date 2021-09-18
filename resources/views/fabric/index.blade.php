@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tailors</h1>
@stop

@section('content')
    @php
        $heads = [
            'ID',
            'Type',
            ['label' => 'Color', 'width' => 40],
            ['label' => 'Image', 'no-export' => true, 'width' => 5],
        ];

        $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </button>';
        $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                          <i class="fa fa-lg fa-fw fa-trash"></i>
                      </button>';
        $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                           <i class="fa fa-lg fa-fw fa-eye"></i>
                       </button>';

        $config = [
            'data' => [
                    $data
            ],
            'order' => [[1, 'asc']],
            'columns' => [null, null, null, ['orderable' => false]],
        ];
    @endphp
    {{-- Custom --}}
    <x-adminlte-modal id="modalCustom" title="Add Fabric" size="lg" theme="teal"
                      icon="fas fa-bell" v-centered static-backdrop scrollable>
        <form  method="post" action="{{route('fabrics.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input class="form-control"  name="type" placeholder="Fabric type"></input>
            </div>
            <div class="form-group">
                <select name="color" id="colors" >
                    <option value="" disabled selected>Select Color</option>
                    @foreach($colors as $color)
                    <option>{{$color}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="file" name="image_file" class="form-file-control" placeholder="choose image">
            </div>
            <div class="form-group">
                <x-adminlte-button type="submit" class="mr-auto" theme="success" label="Add"/>
            </div>
        </form>
        <x-slot name="footerSlot">

            <x-adminlte-button theme="danger" label="Dismiss" data-dismiss="modal"/>
        </x-slot>
    </x-adminlte-modal>
    {{-- Example button to open modal --}}
    <x-adminlte-button label="Add Fabrics" data-toggle="modal" data-target="#modalCustom" class="bg-teal"/>


    {{-- Compressed with style options / fill data using the plugin config --}}
    <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark"
                          striped hoverable bordered compressed>
        @foreach($data as $cell)
            <tr>

                    <td>{{$cell->id}}</td>
                    <td>{{$cell->type}}</td>
                    <td>{{$cell->color}}</td>
                    <td><img style="height: 50px" src="{{str_replace("public","storage",$cell->image)}}" alt=""></td>
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

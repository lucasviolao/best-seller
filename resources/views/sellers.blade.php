@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            Relatório de venda
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12" style="text-align: center">
                <a href="{{route('sellers.show')}}" class="btn btn-xs btn-primary">Vendedores</a>
                <a href="{{route('sales.show')}}" class="btn btn-xs btn-success">Venda</a>
                <a href="{{route('salestoseller.show')}}" class="btn btn-xs btn-info">Venda por Vendedores</a>
                <a href="{{route('endday-report')}}" class="btn btn-xs btn-danger">Finalizar Dia</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered dataTable no-footer"
                        id="sellersReport" role="grid">
                        <thead>
                            <tr>
                                <td>Id.</td>
                                <td>Nome Vendedor</td>
                                <td>Email Vendedor</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sellers as $seller)
                                <tr>
                                    <td>{{$seller->id}}</td>
                                    <td>{{$seller->name}}</td>
                                    <td>{{$seller->email}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection

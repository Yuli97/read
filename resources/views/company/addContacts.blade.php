@extends('layouts.base')
@section('title','FACTURACION UTN| Contactos Compañía')
@section('content')
<div class="container">
        <div id="content-wrapper">
            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Creando Compañía</a>
                    </li>
                    <li class="breadcrumb-item active">Agregar Contactos</li>
                </ol>

<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    @include('sections.messages')
                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Compañia</th>
                        <th scope="col">RUC</th>
                        <th scope="col">Slogan</th>
                        <th scope="col">Dirección</th>
                        </tr>
                    </thead>
                    <tbody>

                            <tr>
                                <th scope="row">{{$company->name}}</th>
                                <td>{{$company->ruc}}</td>
                                <td>{{$company->slogan}}</td>
                                <td>{{$company->Address->description}}</td>
                                <td>
                                    @foreach($company->Contact as $c )
                                    {{$c->KindCont->description." : ".$c->description}}<br>
                                    @endforeach
                                </td>


                            </tr>

                    </tbody>
                    </table>

                </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<form-contact></form-contact>
@endsection

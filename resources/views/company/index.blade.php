@extends('layouts.base')
@section('title','FACTURACION UTN| Compañia')
@section('content')
<div class="container">
    <div id="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Compañía</a>
                </li>
                <li class="breadcrumb-item active">Información</li>
            </ol>



            <div class="row justify-content-center">
                <div class="col-md-12">
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
                                <th scope="col">Contactos</th>
                                <th scope="coll"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($company as $com)
                                    <tr>
                                        <th scope="row">{{$com->name}}</th>
                                        <td>{{$com->ruc}}</td>
                                        <td>{{$com->slogan}}</td>
                                        <td>{{$com->Address->description}}</td>
                                        <td>
                                            @foreach($com->Contact as $c )
                                            {{$c->KindCont->description." : ".$c->description}}<br>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a title="Editar" href="{{route('company.edit',$com->id_comp)}}" class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </td>
                                        {{--
                                        <td>
                                            <a title="Ver" href="{{route('peliculas.show',$pel->idpelicula)}}" class="btn btn-info btn-xs"><i class="fa fa-folder-open" aria-hidden="true"></i></a>
                                            @can('delete',$pel)
                                            <a title="Editar" href="{{route('peliculas.edit',$pel->idpelicula)}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            <a title="Eliminar" data-toggle="modal" data-target="#modalDelete"
                                            data-name="{{$pel->titulo}}" href="#"
                                            data-action="{{route('peliculas.destroy',$pel->idpelicula)}}"
                                            class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            @endcan


                                        </td>  --}}
                                    </tr>
                                @endforeach
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
@endsection

@extends('layouts.base')
@section('title','FACTURACION UTN| Compañia')
@section('content')
<div class="container">
    <div id="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">

                <li class="breadcrumb-item">
                    <a href="#">  Compañía</a>
                </li>
                <li class="breadcrumb-item active">Listar Datos</li>
            </ol>
            <a class="btn btn-primary" href="{{url('company/create')}}" title="Agregar Compañía" role="button">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>  Nuevo
            </a>

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card-body">
                            @include('sections.messages')
                        <div class="table-responsive">
                            <table class="table">
                            <thead class="thead-light">
                                <tr>
                                <th scope="col">COMPAÑÍA</th>
                                <th scope="col">RUC</th>
                                <th scope="col">ESLOGAN</th>
                                <th scope="col">CIUDAD</th>
                                <th scope="col">CONTACTOS</th>
                                <th scope="coll"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($company as $com)
                                    <tr>
                                        <th>{{$com->name}}</th>
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
                                            <a title="Eliminar" data-toggle="modal" data-target="#modalDelete"
                                            data-name="{{$com->name}}" href="#"
                                            data-action="{{route('company.destroy',$com->id_comp)}}"
                                            class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Datos de Compañía</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                {{Form::open(['route'=>['company.destroy',"$com->id_comp"],'method'=>'delete'])}}
                                                <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6 id="txtEliminar">¿Está seguro de eliminar los datos de la compañía {{$com->name}} ?</h6>
                                                            </div>
                                                        </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
                                                    <input type="submit" class="btn btn-primary" value="Aceptar">
                                                  </div>
                                                  {{Form::Close()}}
                                              </div>
                                            </div>
                                          </div>

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
@prepend('scripts')   <!-- PREPEND ejecuta de urgencia el condigo js -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#modalDeletes').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var action = button.data('action');
            var name = button.data('name');
            var modal = $(this);
            modal.find(".modal-content #txtEliminar").html("¿Está seguro de eliminar los datos de la compañía <b>" + name + "</b>?");
            modal.find(".modal-content form").attr('action', action);
        });
    });
</script>
@endprepend

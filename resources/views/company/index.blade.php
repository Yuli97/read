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
                            @include('company.delete')
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

                                          {{--  <a title="Eliminar" data-toggle="modal" data-target="#modalDelete"
                                            data-name="{{$com->name}}" href="#"
                                            data-action="{{route('company.destroy',$com->id_comp)}}"
                                            class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>  --}}

                                            {{Form::open(['route'=>['company.destroy',"$com->id_comp"],'method'=>'delete'])}}

                                            <button  type="submit" class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                                {{Form::Close()}}
                                        </td>

                                    </tr>



                                @endforeach
                            </tbody>
                            </table>
                            {{$company->links()}}
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
        $('#modalDelete').on('show.bs.modal', function (event) {
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

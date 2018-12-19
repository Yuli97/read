@extends('layouts.base')
@section('title','FACTURACION UTN| Contactos Compañía')
@section('content')
<div class="container">
        <div id="content-wrapper">
                <div class="container-fluid">

                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item">
                            <a href="#">  Compañía</a>
                        </li>
                        <li class="breadcrumb-item active">Editar Datos</li>
                    </ol>


        <a class="btn btn-primary" href="{{url('company')}}" title="Regresar al listado" role="button">
                <i class="fa fa-reply" aria-hidden="true"></i> Listado
        </a>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('sections.messages')
                    {!! Form::open(['route' => ['company.update', $company->id_comp],'method' => 'PATCH']) !!}
                        <div class="form-group row">
                            <label for="ruc" class="col-sm-2 col-form-label">RUC</label>
                            <div class="col-sm-6">
                                <input required type="text" maxlength="13" placeholder="Ej:0000000000001 (13 dígitos)"  class="form-control" id="ruc" name="ruc" value="{{$company->ruc}}">
                             </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-6">
                                <input required type="text" maxlength="100" placeholder="Nombre de la compañía" class="form-control" id="name" name="name" value="{{$company->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slogan" class="col-sm-2 col-form-label">Eslogan</label>
                            <div class="col-sm-6">
                                <input required type="text" maxlength="150" placeholder="Eslogan de la compañía"  class="form-control" id="slogan" name="slogan" value="{{$company->slogan}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Ciudad</label>
                                <div class="col-sm-8">
                                    @foreach ($addresses as $addr)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" {{($addr->id_addr)==($company->Address->id_addr) ? 'checked' : ''}} value="{{$addr->id_addr}}" name="address">
                                            <label class="form-check-label">
                                                  {{$addr->description}}
                                              </label>
                                            </div>
                                    @endforeach
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_cont_k" class="col-sm-2 col-form-label">Contacto</label>
                                @foreach ($company->Contact as $contact)
                                <div class="col-sm-4">
                                    <div class="">
                                        <select required class="form-control" id="id_cont_k" name="id_cont_k" >
                                            {{--  <option value="{{$contact->KindCont->id_cont_k}}">{{$contact->KindCont->description}}</option>  --}}
                                            @foreach($contacts_k as $cont_k)
                                                <option value="{{$cont_k->id_cont_k}}" {{($cont_k->id_cont_k) == ($contact->KindCont->id_cont_k) ? 'selected' : ''}}>{{$cont_k->description}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                     <input required type="text" maxlength="150" style="width: 100%" class="form-control" placeholder="Escribir contacto" id="contact_desc" name="contact_desc" value="{{$contact->description}}">
                                </div>
                                @endforeach

                        </div>

                        <div class="form-group row">
                                <div class="col-sm-10">
                                  <button type="submit" class="btn btn-success">Guardar Cambios</button>
                                </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

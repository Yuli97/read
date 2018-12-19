@extends('layouts.base')
@section('title','FACTURACION UTN| Crear Compañia')
@section('content')
<div class="container">
        <div id="content-wrapper">
                <div class="container-fluid">

                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Compañía</a>
                        </li>
                        <li class="breadcrumb-item active">Agregar Nuevo</li>
                    </ol>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> AGREGAR NUEVA COMPAÑIA </div>
                    <div class="card-body">
                        @include('sections.messages')
                        {!! Form::open(['url' => 'company','files'=>'true']) !!}
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">NOMBRE</label>
                            <div class="col-sm-6">
                                <input required type="text" maxlength="100" class="form-control" id="name" name="name" value="{{old('name')}}">
                            </div>
                        </div>
                            <div class="form-group row">
                                <label for="ruc" class="col-sm-2 col-form-label">RUC</label>
                                <div class="col-sm-6">
                                    <input required type="text" maxlength="15"  class="form-control" id="ruc" name="ruc" value="{{old('ruc')}}">
                                 </div>
                            </div>

                            <div class="form-group row">
                                <label for="slogan" class="col-sm-2 col-form-label">ESLOGAN</label>
                                <div class="col-sm-6">
                                    <input required type="text" maxlength="150"  class="form-control" id="slogan" name="slogan" value="{{old('slogan')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-2 col-form-label">CIUDAD</label>
                                    <div class="col-sm-8">
                                        @foreach ($addresses as $addr)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="{{$addr->id_addr}}" name="address">
                                                <label class="form-check-label">
                                                      {{$addr->description}}
                                                  </label>
                                                </div>
                                        @endforeach
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="id_cont_k" class="col-sm-2 col-form-label">CONTACTO</label>
                                        <div class="col-sm-4">
                                            <div class="">
                                                <select required class="form-control" id="id_cont_k" name="id_cont_k" >
                                                    @foreach($contacts_k as $cont_k)
                                                        <option value="{{$cont_k->id_cont_k}}">{{$cont_k->description}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <input required type="text" maxlength="150" style="width: 100%" class="form-control" placeholder="escribir contacto" id="description" name="description" value="{{old('description')}}">
                                        </div>


                            </div>
                         {{--  <div class="form-group row">
                                    <label for="id_cont_k" class="col-sm-2 col-form-label">Contacto</label>
                                        <div class="col-sm-8">
                                            @foreach ($contacts_k as $cont_k)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="{{$cont_k->id_cont_k}}" name="id_cont_k[]">
                                                    <label class="form-check-label">
                                                          {{$cont_k->description}}
                                                      </label>
                                                    </div>
                                            @endforeach
                                        </div>
                            </div>  --}}

                            <div class="form-group row">
                                    <div class="col-sm-10">
                                      <button type="submit" class="btn btn-primary">Guardar</button>
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

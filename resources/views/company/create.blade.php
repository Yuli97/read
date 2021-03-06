@extends('layouts.base')
@section('title','FACTURACION UTN| Crear Compañia')
@section('content')
<div class="container">


                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Compañía</a>
                        </li>
                        <li class="breadcrumb-item active">Agregar Nuevo</li>
                    </ol>
        <div class="row justify-content-center">
            <div class="col-md-12">
                    <a class="btn btn-primary" href="{{url('company')}}" title="Regresar al listado" role="button">
                            <i class="fa fa-reply" aria-hidden="true"></i>
                    </a>
                <div class="card">
                    <div class="card-header"> AGREGAR NUEVA COMPAÑIA </div>
                    <div class="card-body">
                        @include('sections.messages')
                        {!! Form::open(['url' => 'company','files'=>'true']) !!}
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">NOMBRE</label>
                            <div class="col-sm-6">
                                <input required type="text" maxlength="100" placeholder="Nombre de la Compañía" class="form-control" id="name" name="name" value="{{old('name')}}">
                            </div>
                        </div>
                            <div class="form-group row">
                                <label for="ruc" class="col-sm-2 col-form-label">RUC</label>
                                <div class="col-sm-6">
                                    <input required type="text" maxlength="13" placeholder="Ej:0000000000001 (13 dígitos)"  class="form-control" id="ruc" name="ruc" value="{{old('ruc')}}">
                                 </div>
                            </div>

                            <div class="form-group row">
                                <label for="slogan" class="col-sm-2 col-form-label">ESLOGAN</label>
                                <div class="col-sm-6">
                                    <input required type="text" maxlength="150" placeholder="Eslogan de la compañía" class="form-control" id="slogan" name="slogan" value="{{old('slogan')}}">
                                </div>
                            </div>
                            {{--  <div class="form-group row">
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
                            </div>  --}}
                            <div class="form-group row">
                                    <label for="address" class="col-sm-2 col-form-label">Ciudad</label>
                                        <div class="col-sm-6">

                                            <div class="">
                                                <select required class="form-control"  id="address" name="address" >
                                                    @foreach($addresses as $addr)
                                                    @foreach($addressesL2 as $addrL2)
                                                    @foreach($addressesL1 as $addrL1)
                                                    @if ($addr->id_addr_m == $addrL2->id_addr && $addrL2->id_addr_m == $addrL1->id_addr )
                                                    <option value="{{$addr->id_addr}}">{{$addr->description}} - {{$addrL2->description }}
                                                            - {{ $addrL1->description}}
                                                    </option>


                                                    @endif

                                                    @endforeach
                                                    @endforeach
                                                    @endforeach
                                                </select>

                                            </div>

                                        </div>
                            </div>
                             {{--  <div class="form-group row">
                                    <label for="id_cont_k" class="col-sm-2 col-form-label">CONTACTO</label>
                                        <div class="col-sm-4">
                                            <div class="">
                                                <select required class="form-control" id="id_cont_k" name="id_cont_k" >
                                                    @foreach($contacts_k as $cont_k)
                                                        <option value="{{$cont_k->id_cont_k}}">{{$cont_k->description}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <input required type="text"  maxlength="150" style="width: 100%" class="form-control" placeholder="Escribir contacto {{ ($cont_k->id_cont_k)==2 ? 'cell':''  }}" id="description" name="description" value="{{old('description')}}">
                                        </div>
                            </div>  --}}
                            {{--  <div id="app">
                            <newcontact :contacts_k="{{json_encode($contacts_k)}}"></newcontact>
                            </div>  --}}

                            <div class="form-group row">
                                    <div class="col-sm-10">
                                      <button type="submit" class="btn btn-success">Guardar</button>
                                    </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection

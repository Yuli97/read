@extends('layouts.base')
@section('title','FACTURACION UTN| Contactos Compañía')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a class="btn btn-warning" href="{{url('company')}}" title="Regresar al listado" role="button">
                    REGRESAR LISTADO
            </a>  INGRESAR NUEVA COMPAÑIA </div>
                <div class="card-body">
                    @include('sections.messages')
                    {!! Form::open(['route' => ['company.update', $company->id_comp],'method' => 'PATCH']) !!}
                        <div class="form-group row">
                            <label for="ruc" class="col-sm-2 col-form-label">RUC</label>
                            <div class="col-sm-4">
                                <input required type="text" maxlength="15"  class="form-control" id="ruc" name="ruc" value="{{$company->ruc}}">
                             </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input required type="text" maxlength="100" class="form-control" id="name" name="name" value="{{$company->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slogan" class="col-sm-2 col-form-label">Eslogan</label>
                            <div class="col-sm-10">
                                <input required type="text" maxlength="150"  class="form-control" id="slogan" name="slogan" value="{{$company->slogan}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Dirección</label>
                                <div class="col-sm-8">
                                    @foreach ($addresses as $addr)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" {{\App\Company::findAddress($addresses,$company->Address->id_addr) ? 'checked' : ''}} value="{{$addr->id_addr}}" name="address">
                                            <label class="form-check-label">
                                                  {{$addr->description}}
                                              </label>
                                            </div>
                                    @endforeach
                                </div>
                        </div>
                        <div class="form-group row">
                                <div class="col-sm-10">
                                  <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

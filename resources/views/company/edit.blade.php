@extends('layouts.base')
@section('title','FACTURACION UTN| Contactos Compañía')
@section('content')
<div class="container">
                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item">
                            <a href="#">  Compañía</a>
                        </li>
                        <li class="breadcrumb-item active">Editar Datos</li>

                    </ol>


         <a class="btn btn-primary" href="{{url('company')}}" title="istado" role="button">
                <i class="fa fa fa-reorder" aria-hidden="true"></i>
        </a>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('sections.messages')
                    {!! Form::open(['route' => ['company.update', $company->id_comp],'method' => 'PATCH']) !!}
                        <div class="form-group row">
                            <input type="hidden" name="id_comp" value="{{$company->id_comp}}"/><br/>
                            <label for="ruc" class="col-sm-2 col-form-label">RUC</label>
                            <div class="col-sm-6">
                                <input style="color:  #3498db ;" required type="text" maxlength="13" placeholder="Ej:0000000000001 (13 dígitos)"  class="form-control" id="ruc" name="ruc" value="{{$company->ruc}}">
                             </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-6">
                                <input style="color:#3498db;border-color: #fff ;background-color:  #F5F5F5 ;" required type="text" maxlength="100" placeholder="Nombre de la compañía" class="form-control" id="name" name="name" value="{{$company->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slogan" class="col-sm-2 col-form-label">Eslogan</label>
                            <div class="col-sm-6">
                                <input style="color:#3498db;border-color: #fff ;background-color:  #F5F5F5 ;" required type="text" maxlength="150" placeholder="Eslogan de la compañía"  class="form-control" id="slogan" name="slogan" value="{{$company->slogan}}">
                            </div>
                        </div><hr>
                        {{--  <div class="form-group row">
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


                        <hr>
                        <div id="app">
                            <Contact :company="{{ json_encode($company) }}" :contacts_k="{{json_encode($contacts_k)}}"></Contact>
                         </div>
                        <div class="form-group row">
                                <div class="col-sm-10">
                                  <button type="submit" class="btn btn-success">Finalizar Edición</button>
                                </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <br>

</div>
@endsection

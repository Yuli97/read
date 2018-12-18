@extends('layouts.base')

@section('content')
<div id="content-wrapper">
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Panel</a>
          </li>
          <li class="breadcrumb-item active">Estadísticas</li>
        </ol>



        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Estadísticas Comercio</div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">Por actualizar</div>
        </div>


      </div>
</div>
@stop


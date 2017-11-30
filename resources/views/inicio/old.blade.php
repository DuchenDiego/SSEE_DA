@extends('layouts.app')
@section('content')
    <div class="central">
      <div class="container-fluid">
        <div class="main row">
          <article class="col-md-2"></article>
          <article class="col-md-8">
          <br><br>
            <div class="alert alert-info" role="alert">
              <h2 style="text-align: center;">Bienvenido!</h2>
              <p style="text-align: center;">Por favor escoja una opción</p>
            </div>
          </article>
          <article class="col-md-2"></article>
        </div>
        <br>
        <div class="row">
          <a href="{{ route('inicio.newDiagnostico') }}" class="btn btn-primary btn-lg btn-block">Iniciar <span class="glyphicon glyphicon-share-alt"></span></a>
        </div>
        <br><br><br>
        <div class="row">
          <a href="{{ route('historial') }}" class="btn btn-warning btn-lg btn-block">Historial <span class="glyphicon glyphicon-th-list"></span></a>
        </div>
      </div>
    </div>
@endsection
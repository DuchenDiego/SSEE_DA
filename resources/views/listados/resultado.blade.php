@extends('layouts.app')
@section('content')
    <div class="central">
      <div class="container-fluid">
        <div class="main row">
          <article class="col-md-2"></article>
          <article class="col-md-8">
          <br><br>
            <div class="alert alert-success" role="alert">
              <h2 style="text-align: center;">Resultados</h2>
            </div>
          </article>
          <article class="col-md-2"></article>
        </div>
        <br>
        <div class="row">
          <div class="container">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <tr>
                  <th>Credencial</th>
                  <th>Nombre</th>
                  <th>Ap. Paterno</th>
                  <th>Ap. Materno</th>
                  <th>Carrera</th>
                  <th>Semestre</th>
                  <th>Fecha Nacimiento</th>
                  <th>Número Diagnóstico</th>
                  <th>Resultado</th>
                  <th>Tipo de Trastorno</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                </tr>
                <tr>
                  <td>{{ $user->idcredencial }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->appaterno }}</td>
                  <td>{{ $user->apmaterno }}</td>
                  <td>{{ $user->carrera }}</td>
                  <td>{{ $user->semestre }}</td>
                  <td>{{ $user->fechanac }}</td>
                  <td>{{ $diag->numero }}</td>
                  <td>{{ $diag->resultado }}</td>
                  <td>{{ $diag->tipotrastorno }}</td>
                  <td>{{ $diag->fecha }}</td>
                  <td>{{ $diag->hora }}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <article class="col-md-6"></article>
          <article class="col-md-6">
            <a href="{{ route('detalle', ['iddiag'=>$diag->id]) }}" class="btn btn-warning btn-lg btn-block">Detalles</a>
          </article>
        </div>
      </div>
    </div>
@endsection
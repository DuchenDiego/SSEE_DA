@extends('layouts.app')
@section('content')
    <div class="central">
      <div class="container-fluid">
        <div class="main row">
          <article class="col-md-2"></article>
          <article class="col-md-8">
          <br><br>
            <div class="alert alert-warning" role="alert">
              <h2 style="text-align: center;">Historial de Resultados</h2>
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
                  <th>Detalle</th>
                </tr>
                @foreach($diag as $di) 
                <tr>
                  <td>{{ $user->idcredencial }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->appaterno }}</td>
                  <td>{{ $user->apmaterno }}</td>
                  <td>{{ $user->carrera }}</td>
                  <td>{{ $user->semestre }}</td>
                  <td>{{ $user->fechanac }}</td>
                  <td>{{ $di->numero }}</td>
                  <td>{{ $di->resultado }}</td>
                  <td>{{ $di->tipotrastorno }}</td>
                  <td>{{ $di->fecha }}</td>
                  <td>{{ $di->hora }}</td>
                  <td>
                    <a href="{{ route('detalle', ['iddiag'=>$di->id]) }}" class="btn btn-warning btn-lg">Detalle</a></td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <article class="col-md-6">
            <a href="{{ route('inicio.inicio') }}" class="btn btn-danger btn-lg btn-block">Atrás</a>
          </article>
          <article class="col-md-6"></article>
        </div>
      </div>
    </div>
@endsection
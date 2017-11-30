@section('content')  
   @extends('personal/template_pers/contentpers')
   @section('busqueda')
   		  <div class="row">
   		  	<div class="col-md-12">
   		  		<div style="overflow:auto;" class="container col-md-12">
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
		                @foreach($orden as $or) 
		                <tr>
		                  <td>{{ $or["credencial"] }}</td>
		                  <td>{{ $or["nombre"] }}</td>
		                  <td>{{ $or["appaterno"] }}</td>
		                  <td>{{ $or["apmaterno"] }}</td>
		                  <td>{{ $or["carrera"] }}</td>
		                  <td>{{ $or["semestre"] }}</td>
		                  <td>{{ $or["fechanac"] }}</td>
		                  <td>{{ $or["numdiag"] }}</td>
		                  <td>{{ $or["resultado"] }}</td>
		                  <td>{{ $or["tipotrastorno"] }}</td>
		                  <td>{{ $or["fecha"] }}</td>
		                  <td>{{ $or["hora"] }}</td>
		                  <td>
		                    <a href="{{ route('detallepers',['iddiag'=>$or["iddiag"]]) }}" class="btn btn-warning btn-lg">Detalle</a></td>
		                </tr>
		                @endforeach
		              </table>
		            </div>
		          </div>
   		  	</div>
   		  </div>
   		  <br>
   		  <div class="row">
                <article class="col-md-2">
                     <a href="{{ route('personal.dashboard') }}" class="btn btn-danger">Atrás</a>
                </article>
          </div>
   @endsection
@endsection
@extends('layouts.apppersonal')
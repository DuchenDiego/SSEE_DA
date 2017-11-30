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
		                @foreach($listado as $lis) 
		                <tr>
		                  <td>{{ $lis["credencial"] }}</td>
		                  <td>{{ $lis["nombre"] }}</td>
		                  <td>{{ $lis["appaterno"] }}</td>
		                  <td>{{ $lis["apmaterno"] }}</td>
		                  <td>{{ $lis["carrera"] }}</td>
		                  <td>{{ $lis["semestre"] }}</td>
		                  <td>{{ $lis["fechanac"] }}</td>
		                  <td>{{ $lis["numdiag"] }}</td>
		                  <td>{{ $lis["resultado"] }}</td>
		                  <td>{{ $lis["tipotrastorno"] }}</td>
		                  <td>{{ $lis["fecha"] }}</td>
		                  <td>{{ $lis["hora"] }}</td>
		                  <td>
		                    <a href="{{ route('detallepers', ['iddiag'=>$lis["iddiag"]]) }}" class="btn btn-warning btn-lg">Detalle</a></td>
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

@section('content')
<div class="central">
	<div class="main row">
		<article class="col-md-2"></article>
          <article class="col-md-8">
          <br><br>
            <div class="alert alert-warning" role="alert">
              <h2 style="text-align: center;">Detalles Diagnóstico</h2>
            </div>
          </article>
          <article class="col-md-2"></article>
	</div>
	<br>
	<div class="row">
		<div style="overflow:auto;height:300px;" class="container">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<td>
					<table class="table table-striped table-bordered table-hover">
							<tr><th>Medicamentos Consumidos</th></tr>
								@foreach($medic as $med)
								<tr>
								<td>{{ $med }}</td>
								</tr>
								@endforeach
						</table>
				</td>
				<td>
					<table class="table table-striped table-bordered table-hover">
							<tr><th>Síntomas Registrados</th></tr>
								@foreach($sinto as $sint)
								<tr>
								<td>{{ $sint }}</td>
								</tr>
								@endforeach
						</table>
				</td>
				<td>
					<table class="table table-striped table-bordered table-hover">
							<tr><th>Predisposiciones</th></tr>
								@foreach($predis as $pred)
								<tr>
								<td>{{ $pred }}</td>
								</tr>
								@endforeach
						</table>
				</td>
			</table>
		</div>
	</div>
	</div>
	<br>
	<br>
	<div class="row">
		<article class="col-md-4">
          <a href="{{ route('personal.dashboard') }}" class="btn btn-warning btn-lg btn-block">Atrás</a>
        </article>
        <article class="col-md-4"></article>	
        <article class="col-md-4">
        	<a href="" class="btn btn-success btn-lg btn-block">Generar pdf</a>
        </article>
</div>
@endsection
@extends('layouts.apppersonal')
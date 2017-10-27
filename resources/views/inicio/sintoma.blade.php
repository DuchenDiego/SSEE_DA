@extends('layouts.app')
@section('content')
    <form action="{{ route('inicio.sintoma') }}" method="POST" onload="">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="criterio" value="{{ $criterio }}">
      <input type="submit" id="boton" style="display:none;">
    </form>
    <!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
    <script src="{{ asset('plugins/jquery/js/jquery-3.2.1.js') }}"></script>
    <script>
    $(document).ready(function(){
      $('#boton').trigger('click');
    });
    </script>
      <div class="central">
      <div class="container-fluid">
        <div class="main row">
          <article class="col-md-2"></article>
          <article class="col-md-8">
          <br><br><br><br>
            <div class="alert alert-info" role="alert">
              Cargando los componentes necesarios, por favor espere...
            </div>
          </article>
          <article class="col-md-2"></article>
        </div>
      </div>
    </div>
@endsection
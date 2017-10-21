@extends('layouts.app')
@section('content')
    <form action="{{ route('inicio.diagnostico') }}" method="POST" onload="ocultar_btn()">
   		<input type="hidden" name="_token" value="{{ csrf_token() }}">
   		<input type="hidden" name="estudiante" value="{{ $estudiante }}">
   		<input type="submit" id="boton" style="display:none;">
    </form>
    <!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
    <script src="{{ asset('plugins/jquery/js/jquery-3.2.1.js') }}"></script>
    <script>
		$(document).ready(function(){
 			$('#boton').trigger('click');
		});
    </script>
@endsection
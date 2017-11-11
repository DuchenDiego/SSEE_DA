@section('content')  
   @extends('criterios/medicinas/template_med/contentmedaux')
   @section('destinoform')
    <form action="{{ route('reglas.antiasmaticos.update')}}" method="POST">
   @endsection
   @section('pregunta','Usted consumió ultimamente o consume actualmente antiasmáticos debido a un tratamiento o alguna otra razón?')
   @section('tratamientos','(Ejemplos de tratamientos implicados de los antiasmáticos: Tratamiento del asma, dilatación de bronquios para tratamientos alérgicos)')
@endsection
@extends('layouts.app')
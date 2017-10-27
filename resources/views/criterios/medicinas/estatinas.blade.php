@section('content')  
   @extends('criterios/medicinas/template_med/contentmed')
   @section('destinoform')
    <form action="{{ route('reglas.estatinas.update')}}" method="POST">
   @endsection
   @section('pregunta','Usted consumió ultimamente o consume actualmente estatinas debido a un tratamiento o alguna otra razón?')
   @section('tratamientos','(Ejemplos de tratamientos implicados de las estatinas: Tratamientos relacionados a la reduccion de niveles de colesterol)')
@endsection
@extends('layouts.app')
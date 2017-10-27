@section('content')  
   @extends('criterios/medicinas/template_med/contentmed')
   @section('destinoform')
    <form action="{{ route('reglas.benzodiazepinas.update')}}" method="POST">
   @endsection
   @section('pregunta','Usted consumió ultimamente o consume actualmente benzodiazepinas debido a un tratamiento o alguna otra razón?')
   @section('tratamientos','(Ejemplos de tratamientos implicados de los benzodiazepinas: Tratamiento de insomnio y trastornos psicológicos)')
@endsection
@extends('layouts.app')
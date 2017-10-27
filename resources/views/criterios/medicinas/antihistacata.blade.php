@section('content')  
   @extends('criterios/medicinas/template_med/contentmed')
   @section('destinoform')
    <form action="{{ route('reglas.antihistacata.update')}}" method="POST">
   @endsection
   @section('pregunta','Usted consumió ultimamente o consume actualmente antihistaminicos o anticatarrales debido a un tratamiento o alguna otra razón?')
   @section('tratamientos','(Ejemplos de tratamientos implicados de los antihistaminicos o anticatarrales: Tratamiento para el catarro y resfrio común, Tratamiento de alergias)')
@endsection
@extends('layouts.app')
@section('content')  
   @extends('criterios/medicinas/template_med/contentmed')
   @section('destinoform')
    <form action="{{ route('reglas.anticonvulsivos.update')}}" method="POST">
   @endsection
   @section('pregunta','Usted consumió ultimamente o consume actualmente anticonvulsivos debido a un tratamiento o alguna otra razón?')
   @section('tratamientos','(Ejemplos de tratamientos implicados de los anticonvulsivos: Prevención o interrupción de crisis epilépticas o convulsiones)')
@endsection
@extends('layouts.app')
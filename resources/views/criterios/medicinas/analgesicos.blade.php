@section('content')  
   @extends('criterios/medicinas/template_med/contentmed')
   @section('destinoform')
    <form action="{{ route('reglas.analgesicos.update')}}" method="POST">
   @endsection
   @section('pregunta','Usted consumió ultimamente o consume actualmente analgesicos debido a un tratamiento o alguna otra razón?')
   @section('tratamientos','(Ejemplos de tratamientos implicados de los analgesicos: Alivio de Dolores de cabeza y musculares)')
@endsection
@extends('layouts.app')
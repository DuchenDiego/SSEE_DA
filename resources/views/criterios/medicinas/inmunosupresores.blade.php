@section('content')  
   @extends('criterios/medicinas/template_med/contentmed')
   @section('destinoform')
    <form action="{{ route('reglas.inmunosupresores.update')}}" method="POST">
   @endsection
   @section('pregunta','Usted consumió ultimamente o consume actualmente inmunosupresores debido a un tratamiento o alguna otra razón?')
   @section('tratamientos','(Ejemplos de tratamientos implicados de los inmunosupresores: Prevencion de rechazo de organos despues de un trasplante o tratamiento contra enfermedades autoinmunitarias)')
@endsection
@extends('layouts.app')
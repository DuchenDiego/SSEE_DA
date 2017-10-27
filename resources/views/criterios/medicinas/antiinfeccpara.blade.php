@section('content')  
   @extends('criterios/medicinas/template_med/contentmed')
   @section('destinoform')
    <form action="{{ route('reglas.antiinfeccpara.update')}}" method="POST">
   @endsection
   @section('pregunta','Usted consumió ultimamente o consume actualmente antiinfecciosos o antiparasitarios debido a un tratamiento o alguna otra razón?')
   @section('tratamientos','(Ejemplos de tratamientos implicados de los antiinfecciosos o antiparasitarios: Tratamiento contra la parasitosis, Tratamiento para infección de garganta, Tratamiento para la Neumonía)')
@endsection
@extends('layouts.app')
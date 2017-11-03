@section('content')  
   @extends('criterios/sintomas/template_sin/contentsin')
   @section('destinoform')
    <form action="{{ route('reglas.irritabilidad.upd')}}" method="POST">
   @endsection
   @section('pregunta','Te sientes constantemente irritado, agresivo o con mal temperamento?')
@endsection
@extends('layouts.app')
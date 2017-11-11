@section('content')  
   @extends('criterios/sintomas/template_sin/contentsin')
   @section('destinoform')
    <form action="{{ route('reglas.difdormir.upd')}}" method="POST">
   @endsection
   @section('pregunta','Siente que tiene dificultad al momento de conciliar el sueño?')
@endsection
@extends('layouts.app')
@section('content')  
   @extends('criterios/sintomas/template_sin/contentsin')
   @section('destinoform')
    <form action="{{ route('reglas.anticipaciones.upd')}}" method="POST">
   @endsection
   @section('pregunta','Tiene la sensación de anticipar constantemente situaciones antes de que ocurran?')
@endsection
@extends('layouts.app')
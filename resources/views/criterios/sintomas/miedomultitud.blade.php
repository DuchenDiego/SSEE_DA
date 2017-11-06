@section('content')  
   @extends('criterios/sintomas/template_sin/contentsin')
   @section('destinoform')
    <form action="{{ route('reglas.miedomultitud.upd')}}" method="POST">
   @endsection
   @section('pregunta','Siente temor a estar rodeado de multitud de personas?')
@endsection
@extends('layouts.app')
@section('content')  
   @extends('criterios/sintomas/template_sin/contentsin')
   @section('destinoform')
    <form action="{{ route('reglas.pesadillas.upd')}}" method="POST">
   @endsection
   @section('pregunta','Siente que tiene pesadillas recurrentes?')
@endsection
@extends('layouts.app')
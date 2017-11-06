@section('content')  
   @extends('criterios/sintomas/template_sin/contentsin')
   @section('destinoform')
    <form action="{{ route('reglas.miedoextraños.upd')}}" method="POST">
   @endsection
   @section('pregunta','Siente miedo de hablar con personas desconocidas?')
@endsection
@extends('layouts.app')
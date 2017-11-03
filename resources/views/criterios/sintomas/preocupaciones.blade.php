@section('content')  
   @extends('criterios/sintomas/template_sin/contentsin')
   @section('destinoform')
    <form action="{{ route('reglas.preocupaciones.upd')}}" method="POST">
   @endsection
   @section('pregunta','Usted se sintió ultimamente o se siente preocupad@ debido a problemas laborales, familiares, sociales o alguna otra razón?')
@endsection
@extends('layouts.app')
@section('content')  
   @extends('criterios/sintomas/template_sin/contentsin')
   @section('destinoform')
    <form action="{{ route('reglas.fatiga.upd')}}" method="POST">
   @endsection
   @section('pregunta','Se siente fatigado por actividades que realiza o sin razon aparente?')
@endsection
@extends('layouts.app')   
@section('content')  
   @extends('criterios/sintomas/template_sin/contentsin')
   @section('destinoform')
    <form action="{{ route('reglas.miedoscuridad.upd')}}" method="POST">
   @endsection
   @section('pregunta','Siente temor a la oscuridad?')
@endsection
@extends('layouts.app')
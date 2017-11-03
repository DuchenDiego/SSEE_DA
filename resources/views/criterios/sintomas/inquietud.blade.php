@section('content')  
   @extends('criterios/sintomas/template_sin/contentsin')
   @section('destinoform')
    <form action="{{ route('reglas.inquietud.upd')}}" method="POST">
   @endsection
   @section('pregunta','Siente que no puede relajarse debido a un estado de inquietud?')
@endsection
@extends('layouts.app')   
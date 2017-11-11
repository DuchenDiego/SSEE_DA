@section('content')  
   @extends('criterios/sintomas/template_sin/contentsin')
   @section('destinoform')
    <form action="{{ route('reglas.suenofrag.upd')}}" method="POST">
   @endsection
   @section('pregunta','Se despierta constantemente durante las noches?')
@endsection
@extends('layouts.app')
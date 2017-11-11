@section('content')  
   @extends('criterios/sintomas/template_sin/contentsin')
   @section('destinoform')
    <form action="{{ route('reglas.difconcen.upd')}}" method="POST">
   @endsection
   @section('pregunta','Siente que no puede concentrarse al momento de realizar sus actividades?')
@endsection
@extends('layouts.app')
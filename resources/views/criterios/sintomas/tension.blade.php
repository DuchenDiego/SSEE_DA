@section('content')  
   @extends('criterios/sintomas/template_sin/contentsin')
   @section('destinoform')
    <form action="{{ route('reglas.tension.upd')}}" method="POST">
   @endsection
   @section('pregunta','Se sintió ultimamente o se siente actualmente tenso?')
@endsection
@extends('layouts.app')
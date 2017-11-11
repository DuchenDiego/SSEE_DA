@section('content')  
   @extends('criterios/sintomas/template_sin/contentsin')
   @section('destinoform')
    <form action="{{ route('reglas.memred.upd')}}" method="POST">
   @endsection
   @section('pregunta','Sintió fallos en su memoria ultimamente?')
@endsection
@extends('layouts.app')
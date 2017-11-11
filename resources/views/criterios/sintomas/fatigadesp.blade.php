@section('content')  
   @extends('criterios/sintomas/template_sin/contentsin')
   @section('destinoform')
    <form action="{{ route('reglas.fatigadesp.upd')}}" method="POST">
   @endsection
   @section('pregunta','Siente cansancio, debilidad o fatiga al momento de despertar?')
@endsection
@extends('layouts.app')
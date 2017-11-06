@section('content')  
   @extends('criterios/sintomas/template_sin/contentsin')
   @section('destinoform')
    <form action="{{ route('reglas.miedosoledad.upd')}}" method="POST">
   @endsection
   @section('pregunta','Tiene temor a quedarse solo o miedo a la soledad')
@endsection
@extends('layouts.app')
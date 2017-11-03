@section('content')  
   @extends('criterios/sintomas/template_sin/contentsin')
   @section('destinoform')
    <form action="{{ route('reglas.temblor.upd')}}" method="POST">
   @endsection
   @section('pregunta','Ha sentido o siente que le tiembla alguna parte de el cuerpo?')
@endsection
@extends('layouts.app')   
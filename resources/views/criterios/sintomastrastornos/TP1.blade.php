@section('content')  
   @extends('criterios/sintomastrastornos/template_sinttras/contentsinttrasaux')
   @section('pregunta','Ha experimentado "ataques" súbitos de miedo o malestar intenso en los que se producen cuatro(o más) de los siguientes síntomas?')
   @section('infoextra')
   -Palpitaciones				-Sudoración<br>
   -Temblor						-Dificultad para respirar<br>
   -Sensación de ahogo			-Náuseas<br>
   -Escalofríos					-Hormigueos
   @endsection
@endsection
@extends('layouts.app')


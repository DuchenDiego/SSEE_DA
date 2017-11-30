@section('content')  
   @extends('criterios/sintomastrastornos/template_sinttras/contentsinttrasaux')
   @section('pregunta','Siente que la preocupacion intesa mencionada está asociada a tres(o más) de los siguientes síntomas?')
   @section('infoextra')
   -Impaciencia							-Fatigabilidad<br>
   -Dificultad para concetrarse			-Irritabilidad<br>
   -Tensión								-Alteraciones del Sueño
   @endsection
@endsection
@extends('layouts.app')
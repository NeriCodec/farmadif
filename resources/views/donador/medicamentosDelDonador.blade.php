@extends('layouts.app')

@section('content')

        <div>
           @include('donador.panelDatosDonador') 
        </div>
				
         <div>
            @include('donador.medicamentosDonados') 
         </div>   

				

    
@endsection
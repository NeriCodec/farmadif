@if(session()->has('mensaje'))
	
	<div class='notifications bottom-right notificacion'></div>
	<input type="hidden" id="mensaje" value="{{ session()->get('mensaje') }}">
	
@endif
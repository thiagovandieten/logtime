<!-- Extend: header -->
@extends('dashboard.header')

<!-- Application name -->
@section('application_name')
	Logtime
@stop

<!-- Application Version -->
@section('application_version')
	Version 0.9
@stop
<!-- Count the notifications -->
@section('notiamount')
    9	
@stop

<!-- Get the notifications -->
@section('get_notifications')
	Hier komen de notificaties
@stop

<!-- Get the user name -->
@section('username')
	Maaria van de Visser
@stop

<!-- Extend: main content -->
@include('dashboard.main')

@stop
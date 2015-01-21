@extends('template.main')
@section('content')

	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<div class="filter-wrap">

		<div class="filter-omgeving" style="margin-left: 0px;">
			<p>Filter op</p>
			<form>
				<select class="light-table-filter" data-table="order-table">
					<option>Taak</option>
					@foreach($userlogs as $userlog)
					<option value="{{$userlog['task']}}">{{$userlog['task']}}</option>
					@endforeach

				</select>
			</form>
		</div>
	</div>

	<div class="projecten-overzicht">
		<table class="order-table table" cellspacing="0">
			<thead>
			<tr class="border_bottom">
				<td style="color: #666; width: 10%">Datum</td>
				<td style="color: #666; width: 20%">Taak</td>
				<td style="color: #666; width: 10%">Begintijd</td>
				<td style="color: #666; width: 10%">Eindtijd</td>
				<td style="color: #666">Totale uren</td>
				<td style="color: #666">Omschrijving</td>
				<td style="color: #666">Bewerken</td>
				<td style="color: #666">Verwijderen</td>
			</tr>
			</thead>
			@foreach($userlogs as $userlog)
				<tr>
					<td>{{$userlog['date']}}</td>
					<td>{{$userlog['project']}}</td>
					<td>{{$userlog['categorie']}}</td>
					<td>{{$userlog['task']}}</td>
					<td>{{$userlog['start_time']}}</td>
					<td>{{$userlog['stop_time']}}</td>
					<td>{{$userlog['total_time_in_hours']}}</td>
					<td>{{$userlog['description']}}</td>
					{{Form::open(array('route' => array('logboek.edit' , $userlog['id']),'method' => 'GET')) }}
					<td>{{Form::submit('Bewerken', ['class'=>'studenten-bewerken'])}}</td>
					{{Form::close() }}
					{{Form::open(array('route' => array('logboek.destroy' , $userlog['id']),'method' => 'DELETE')) }}
					<td>{{Form::submit('Verwijderen', ['class'=>'studenten-verwijderen'])}}</td>
					{{Form::close() }}
				</tr>
			@endforeach

</table>
		<script>
			$(document).ready(function()
			{
				$("table tr:odd").css("background-color", "#ededed");
			});
		</script>
		<script>
			(function(document) {
				'use strict';

				var LightTableFilter = (function(Arr) {

					var _input;

					function _onInputEvent(e) {
						_input = e.target;
						var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
						Arr.forEach.call(tables, function(table) {
							Arr.forEach.call(table.tBodies, function(tbody) {
								Arr.forEach.call(tbody.rows, _filter);
							});
						});
					}

					function _filter(row) {
						var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
						row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
					}

					return {
						init: function() {
							var inputs = document.getElementsByClassName('light-table-filter');
							Arr.forEach.call(inputs, function(input) {
								input.oninput = _onInputEvent;
							});
						}
					};
				})(Array.prototype);

				document.addEventListener('readystatechange', function() {
					if (document.readyState === 'complete') {
						LightTableFilter.init();
					}
				});

			})(document);
		</script>
@stop
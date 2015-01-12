@extends('template.main')

@section('content')
<table>
	<tr>
		<td>Projectnaam</td>
		<td>Laatst geupdate</td>
	</tr>
	@foreach ($projects as $project)
		<tr>
			<td>{{$project->project_name}}</td>
			<td>{{$project->updated_at}}</td>
		</tr>
	@endforeach
	<tr>
		<td>Kasboekje</td>
		<td>1-1-2001</td>
	</tr>
</table>

@stop

@section('content')
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <div class="filter-wrap">
        <div class="buttons-wrap">
            <button class="nieuw-knop">Nieuw</button>
            <button class="delete-knop" style="margin-left: 5px;">Verwijderen</button>
        </div>
        <div class="filter-omgeving">
            <p>Filter op</p>
            <form>
                <select class="light-table-filter" data-table="order-table">
                    <option value=" ">Leerjaar</option>
                    <option value="Leerjaar 1">Leerjaar 1</option>
                    <option value="Leerjaar 2">Leerjaar 2</option>
                    <option value="Leerjaar 3">Leerjaar 3</option>
                </select>
                <select class="light-table-filter" data-table="order-table">
                    <option value=" ">Periode</option>
                    <option value="periode 1">Periode 1</option>
                    <option value="periode 2">Periode 2</option>
                    <option value="periode 3">Periode 3</option>
                    <option value="periode 4">Periode 4</option>
                </select>
                <select class="light-table-filter" data-table="order-table">
                    <option>Klas</option>
                    <option value="Klas 1D0W">1D0W</option>
                    <option value="Klas 3H3W">3H0W </option>
                    <option value="Klas 3H0W">3H0W</option>
                </select>
            </form>
        </div>
    </div>
    <div class="projecten-overzicht">
        <table class="order-table table" cellspacing="0">
            <thead>
            <tr class="border_bottom">
                <td style="color: #666; width: 3%">#</td>
                <td style="color: #666; width: 10%">Leerjaar</td>
                <td style="color: #666; width: 10%">Periode</td>
                <td style="color: #666; width: 10%">Klas</td>
                <td style="color: #666; width: 30%">Projectnaam</td>
                <td style="color: #666">Laats geupdated</td>
                <td style="color: #666">Voortgang</td>
            </tr>
            </thead>
            <tr>
                <td><input type="checkbox"  style="display: block"></td>
                <td><span>Leerjaar 2</span></td>
                <td>Periode 1</td>
                <td>Klas 1D0W</td>
                <td>Pizza today</td>
                <td>12 November 2014</td>
                <td><div class="progress">
                        <div data-percentage="0%" style="width: 75%;" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <p>75%</p></td>
            </tr>
            <tr>
                <td><input type="checkbox" style="display: block"></td>
                <td>Leerjaar 2</td>
                <td>Periode 3</td>
                <td>Klas 1D0W</td>
                <td>Malcome</td>
                <td>12 December 2014</td>
                <td><div class="progress">
                        <div data-percentage="0%" style="width: 68%;" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <p>68%</p></td>
            </tr>
            <tr>
                <td><input type="checkbox" style="display: block"></td>
                <td>Leerjaar 1</td>
                <td>Periode 2</td>
                <td>Klas 3H3W</td>
                <td>Platform techniek</td>
                <td>1 Januari 2015</td>
                <td><div class="progress">
                        <div data-percentage="0%" style="width: 20%;" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <p>20%</p></td>
            </tr>
            <tr>
                <td><input type="checkbox" style="display: block"></td>
                <td>Leerjaar 3</td>
                <td>Periode 2</td>
                <td>Klas 3H0W</td>
                <td>Pizza today</td>
                <td>12 November 2014</td>
                <td><div class="progress">
                        <div data-percentage="0%" style="width: 54%;" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <p>54%</p></td>
            </tr>

        </table>

        <table cellspacing="0" class="order-table table">
            <thead>
            <tr class="border_bottom">
                <td style="color: #666; width: 3%">#</td>
                <td style="color: #666; width: 50%">Projectnaam</td>
                <td style="color: #666">Afgerond</td>
                <td style="color: #666">Tijd</td>
            </tr>
            </thead>
            <tr>
                <td><input type="checkbox" style="display: block"></td>
                <td><a href="#">Pizza today</a></td>
                <td>12 November 2014</td>
                <td>8 uren</td>
            </tr>
            <tr>
                <td><input type="checkbox" style="display: block"></td>
                <td>Malcome</td>
                <td>12 December 2014</td>
                <td>12 uren</td>
            </tr>
            <tr>
                <td><input type="checkbox" style="display: block"></td>
                <td>Platform techniek</td>
                <td>1 Januari 2015</td>
                <td>10 minuten</td>
            </tr>
            <tr>
                <td><input type="checkbox" style="display: block"></td>
                <td>Pizza today</td>
                <td>12 November 2014</td>
                <td>2 uren</td>
            </tr>

        </table>
    </div>
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
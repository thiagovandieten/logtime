@extends('template.main')
@section('content')




    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <div class="filter-wrap">
        <div class="buttons-wrap-student">
            {{HTML::link('studentsettings/create', 'Nieuw', ['class'=>'nieuw-knop', 'style'=>'float: left; margin-right: 10px; padding: 13px 20px 15px 40px!important'])}}

            {{Form::open(array('url' => 'studentsettings/delete', 'files' => false, 'method' => 'post')) }}
            {{Form::submit('Verwijderen', ['class'=>'delete-knop'])}}
            {{Form::close()}}
        </div>
        <div class="filter-omgeving">
            <p>Filter op</p>
            <form>
                <select class="light-table-filter" data-table="order-table" name='leerjaar'>
                    <option value=" ">Leerjaar</option>
                    <option value="Leerjaar 1">Leerjaar 1</option>
                    <option value="Leerjaar 2">Leerjaar 2</option>
                    <option value="Leerjaar 3">Leerjaar 3</option>
                </select>
                <select class="light-table-filter" data-table="order-table" name='periode'>
                    <option value=" ">Periode</option>
                    <option value="periode 1">Periode 1</option>
                    <option value="periode 2">Periode 2</option>
                    <option value="periode 3">Periode 3</option>
                    <option value="periode 4">Periode 4</option>
                </select>
                <select class="light-table-filter" data-table="order-table" name='klas'>
                    <option>Klas</option>
                    <option value="Klas 1D0W">1D0W</option>
                    <option value="Klas 3H3W">3H0W </option>
                    <option value="Klas 3H0W">3H0W</option>
                </select>
            </form>
        </div>
    </div>
    @if ($errors->has())
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
   <p class="student-error"> {{(string)Session::get('msg')}}</p>
    <div class="studenten-overzicht">
        <table class="order-table table" cellspacing="0">
            <thead>
            <tr class="border_bottom">
                <td style="color: #666; width: 3%">#</td>
                <td style="color: #666; width: 10%">Leerjaar</td>
                <td style="color: #666; width: 10%">Periode</td>
                <td style="color: #666; width: 10%">Klas</td>
                <td style="color: #666; width: 30%">Student</td>
                <td style="color: #666">Status</td>
                <td style="color: #666">Bewerken</td>
                <td style="color: #666">Verwijderen</td>
            </tr>
            </thead>
            @foreach($all_students as $data)
                <tr>
                    <td><input type="checkbox"  style="display: block"></td>
                    <td><span>Leerjaar 2</span></td>
                    <td>Periode 1</td>
                    <td>Klas 1D0W</td>
                    <td>  {{$data->first_name}} {{$data->last_name}} </td>
                    <td>
                    	 @if ($data->active == 1)
                            actief
                        @else($data->active == 1)
                            inactief
                        @endif
                        
                    </td>
                    <td>
                        {{Form::open(array('url' => 'studentsettings/edit', 'method' => 'post')) }}
                        {{Form::hidden('invisible', $data->id, array('id' => 'invisible_id')) }}
                        {{Form::submit('Bewerken', ['class'=>'studenten-bewerken'])}}
                        {{Form::close() }}
                    </td>

                    <td>
                        {{Form::open(array('url' => 'studentsettings/delete', 'method' => 'get')) }}   
                        {{Form::hidden('user', $data->id, array('id' => 'invisible_id')) }}
                        {{Form::submit('Verwijder', ['class'=>'studenten-verwijderen'])}}
                        {{Form::close() }}
                    </td>

                </tr>
            @endforeach

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
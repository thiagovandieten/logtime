@extends('template.main')
@section('content')




{{(string)Session::get('msg')}}

    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <div class="filter-wrap">
        <div class="buttons-wrap-student">
            {{HTML::link('docent/usersettings/create', 'Nieuw', ['class'=>'nieuw-knop', 'style'=>'float: left; margin-right: 10px; padding: 13px 20px 15px 40px!important'])}}
        </div>
        <div class="filter-omgeving">
            <p>Filter op</p>
            <form>
                <select class="light-table-filter" data-table="order-table" name='leerjaar'>
                    <option value=" ">Leerjaar</option>
                    @foreach($all_students as $data)
                    @if(!empty($data->nickname))	
                    <option>{{$data->nickname}}</option>
                    @endif
                    @endforeach
                </select>
                <select class="light-table-filter" data-table="order-table" name='periode'>
                    <option value=" ">Actief</option>
                    <option value="Inactief">Inactief</option>
                </select>
                <select class="light-table-filter" data-table="order-table" name='klas'>
                    <option value=" ">Klas</option>
                    @foreach($all_students as $data)
                    @if(!empty($data->name))	
                    <option>{{$data->name}}</option>
                    @endif
                    @endforeach
                </select>
            </form>
        </div>
    </div>
    @if ($errors->has())
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif

    <div class="studenten-overzicht">
        <table class="order-table table" cellspacing="0">
            <thead>
            <tr class="border_bottom">
                <td style="color: #666; width: 3%">#</td>
                <td style="color: #666; width: 10%">Leerjaar</td>
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
                    <td><span>{{$data->nickname}}</span></td>
          
                    <td>{{$data->name}}</td>
                    <td>  {{$data->first_name}} {{$data->last_name}} </td>
                    <td>
                    	 @if ($data->active == 1)
                            actief
                        @else($data->active == 1)
                            inactief
                        @endif
                        
                    </td>
                    <td>
                        {{Form::open(array('url' => 'docent/usersettings/edit', 'method' => 'post')) }}
                        {{Form::hidden('invisible', $data->id, array('id' => 'invisible_id')) }}
                        {{Form::submit('Bewerken', ['class'=>'studenten-bewerken'])}}
                        {{Form::close() }}
                    </td>

                    <td>
                        {{Form::open(array('url' => 'docent/usersettings/delete', 'method' => 'get')) }}   
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
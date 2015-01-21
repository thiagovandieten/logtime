@extends('template.main')

@section('content')
    @foreach($tasks as $task)
        <p>Dit zijn alle $task gegevens</p>
        {{$task->id . '<br>' . $task->task_name . '<br>' . $task->project_id . '<br>' . $task->categorie_id }}

    @endforeach
        <!-- Dit is momenteel copypaste van projectmanagement/docent/index.blade.php -->
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <div class="filter-wrap">
            <div class="buttons-wrap">
                {{HTML::linkRoute('docent.tasks.create', 'Nieuw', '',['class'=>'nieuw-knop', 'style'=>'float: left; margin-right: 10px; padding: 13px 20px 15px 40px!important'])}}
                {{--<button class="delete-knop" style="margin-left: 5px;">Verwijderen</button>--}}
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
                        <option value="Klas 3H3W">3H0W</option>
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
                    <td style="color: #666; width: 10%">Taken</td>
                    <td style="color: #666; width: 30%">Projectnaam</td>
                    <td style="color: #666">Laatst geupdate</td>
                </tr>
                </thead>
                {{--@foreach ($tasks as $task)--}}
                    <tr>
                        <td><input type="checkbox" style="display: block"></td>
                        <td><span>Leerjaar 2</span></td>
                        <td>Periode 1</td>
                        <td>{{HTML::linkRoute('docent.tasks.index', 'Taken beheren', $task->id)}}</td>
                        <td>{{--$task->task_name--}} Project naam</td>
                        <td>{{--$task->updated_at--}} Laatst geupdate</td>


                        <td>
                            {{Form::open(array('route' => array('docent.tasks.edit',$task->id),
                             'method' => 'get')) }}
                            {{--{{Form::hidden('invisible', $data->id, array('id' => 'invisible_id')) }}--}}
                            {{Form::submit('Bewerken', ['class'=>'studenten-bewerken'])}}
                            {{Form::close() }}

                        </td>
                        <td>
                            {{Form::open(array('route' => array('docent.tasks.destroy',$task->id), 'method' => 'delete')) }}
                              
                            {{--{{Form::hidden('user', $data->id, array('id' => 'invisible_id')) }}--}}
                            {{Form::submit('Verwijder', ['class'=>'studenten-verwijderen'])}}
                            {{Form::close() }}
                        </td>
                    </tr>
                {{--@endforeach--}}

            </table>
        </div>
@stop
@extends('template.main')

@section('content')
    <button>Toevoegen</button>
    <button>Wijzigen</button>
    <button>Verwijderen</button>
    <p>Filter op</p>
    <select>
        <option>Leerjaar</option>
    </select>
    <select>
        <option>Periode</option>
    </select>
    <select>
        <option>Klas</option>
    </select>

    <br>
    <form>
    <table>
        <tr>
            <td></td>
            <td>Projectnaam</td>
            <td>Laatst geupdate</td>
        </tr>
        @foreach ($projects as $project)
            <tr>
                <td><a href="www.google.com"><input type="checkbox" style="
    display: block;"></a></td>
                <td>{{$project->project_name}}</td>
                <td>{{$project->updated_at}}</td>
            </tr>
        @endforeach
    </table>
    </form>
@stop
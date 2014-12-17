@extends('template.main')

@section('content')
<div class="filter-wrap">
    <div class="buttons-wrap">
        <button class="nieuw-knop">Nieuw</button>
        <button class="delete-knop" style="margin-left: 5px;">Verwijderen</button>
    </div>
    <div class="filter-omgeving">
    <p>Filter op</p>
    <form>
    <select>
     <option>Leerjaar</option>
    </select>
    <select>
      <option>Periode</option>
     </select>
     <select>
       <option>Klas</option>
     </select>
    </form>
    </div>
</div>

@stop
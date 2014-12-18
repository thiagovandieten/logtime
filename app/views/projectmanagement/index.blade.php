@extends('template.main')

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
    <div class="projecten-overzicht">
        <table cellspacing="0">
            <tr class="border_bottom">
                <td style="color: #666; width: 3%">#</td>
                <td style="color: #666; width: 50%">Projectnaam</td>
                <td style="color: #666">Laats geupdated</td>
                <td style="color: #666">Voortgang</td>
            </tr>
            <tr>
                <td><input type="checkbox" style="display: block"></td>
                <td>Pizza today</td>
                <td>12 November 2014</td>
                <td><div class="progress">
                        <div data-percentage="0%" style="width: 75%;" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <p>75%</p></td>
            </tr>
            <tr>
                <td><input type="checkbox" style="display: block"></td>
                <td>Malcome</td>
                <td>12 December 2014</td>
                <td><div class="progress">
                        <div data-percentage="0%" style="width: 68%;" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <p>68%</p></td>
            </tr>
            <tr>
                <td><input type="checkbox" style="display: block"></td>
                <td>Platform techniek</td>
                <td>1 Januari 2015</td>
                <td><div class="progress">
                        <div data-percentage="0%" style="width: 20%;" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <p>20%</p></td>
            </tr>
            <tr>
                <td><input type="checkbox" style="display: block"></td>
                <td>Pizza today</td>
                <td>12 November 2014</td>
                <td><div class="progress">
                        <div data-percentage="0%" style="width: 54%;" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <p>54%</p></td>
            </tr>

        </table>

        <table cellspacing="0">
            <tr class="border_bottom">
                <td style="color: #666; width: 3%">#</td>
                <td style="color: #666; width: 50%">Projectnaam</td>
                <td style="color: #666">Afgerond</td>
                <td style="color: #666">Tijd</td>
            </tr>
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
@stop
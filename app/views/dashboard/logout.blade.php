{{Form::open(array('url' => 'logout'))}}
    {{Form::submit('logout')}}

{{Form::close()}}

{{ $user = User::findorFail(1) }}
{{ dd($user->project_group_id) }}

@php
    foreach($roles as $role)
    {
        if(Route::is('*.'.$role->slug.'*'))
        {
            $this_role = $role;
        }
    }
@endphp

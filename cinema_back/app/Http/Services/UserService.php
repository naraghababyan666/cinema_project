<?php

namespace App\Http\Services;

use App\Models\User;

class UserService
{
    public function get_users()
    {
        $usersQuery = User::select('id','role_id','is_active','email','name','created_at')
            ->whereNotIn('id',[1,2])
            ->latest()
            ->with('role');

        $usersQuery = isset($_GET['time'])
            ? $_GET['time'] != 'all'
                ? $usersQuery->where('created_at','>',now()->addMonth(-$_GET['time']))
                : $usersQuery
            : $usersQuery->where('created_at','>',now()->addMonth(-1));

        $usersQuery = (isset($_GET['role']) and $_GET['role'] != 'all')
            ? $usersQuery->where('role_id',$_GET['role'])
            : $usersQuery;

        $users = $usersQuery->get();
        return $users;
    }

}

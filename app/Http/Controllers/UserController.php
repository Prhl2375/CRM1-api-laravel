<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function showAction(): object
    {
        $users = (object)[
            'data' => \App\Models\User::select(['id', 'name', 'email', 'is_admin'])->get(),
            'columns' => ['id', 'name', "email", 'role', 'actions'],
            'params' => ['crud']
        ];
        return $users;
    }

    function destroyAction($id){
        if(User::where('id', '=', $id)->first()->is_admin != 1){
            User::destroy($id);
        }
        return $id;
    }
}

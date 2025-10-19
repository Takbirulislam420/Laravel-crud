<?php

namespace App\Http\Controllers;

use App\Models\UserAccount;

class DemoEloquentController extends Controller
{
    public function oneToOne(){
        $userWithProfile=UserAccount::with('profile')
        ->orderBy('id','asc')
        ->limit(3)
        ->get();
        return response()->json($userWithProfile);
    }

    public function hasMany(){
        $Profile=UserAccount::with('transaction')
        ->get();
        return response()->json($Profile);
    }
}

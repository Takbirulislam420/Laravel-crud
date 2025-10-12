<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{   
    //For indicate table
    //protected $table="user_accounts"
    protected $fillable=['email','password','account_number','own_reffer_code'];
}

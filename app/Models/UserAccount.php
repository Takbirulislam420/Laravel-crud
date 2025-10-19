<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{   
    use HasFactory; // if in migration use softDelete then here use SoftDelete also
    //For indicate table
    //protected $table="user_accounts"
    protected $fillable=['email','password','account_number','own_reffer_code'];

    public function profile(){
        return $this->hasOne(UserProfile::class);
    }

    public function transaction(){
        return $this->hasMany(AllTransaction::class, 'user_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory; // if in migration use softDelete then here use SoftDelete also
    protected $fillable=['f_name','f_name'];

    public function userAccount(){
        return $this->belongsTo(UserAccount::class);
    }


}

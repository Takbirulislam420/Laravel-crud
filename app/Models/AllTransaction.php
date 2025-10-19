<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllTransaction extends Model
{
    use HasFactory;
    protected $fillable= ['user_id','receiver_id'];

    public function userAccount(){
        return $this->belongsTo(UserAccount::class, 'user_id', 'id');
    }
}

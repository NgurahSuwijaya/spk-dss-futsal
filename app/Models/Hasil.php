<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    public function pemain_user(){
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}

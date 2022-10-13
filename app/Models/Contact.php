<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Email;
use App\Models\Phone;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Contact extends Model
{
    use HasFactory;
    protected $fillable=['name', 'email_id','phone_id','address','birthday','worked_at','image'];

    protected $dates = ['created_at'];

    public function emails(){
        return $this->hasMany(Email::class,'contact_id','id');
    }
    public function phones(){
        return $this->hasMany(Phone::class,'contact_id','id');
    }
   
}

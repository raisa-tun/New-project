<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Str;

class InboxMessage extends Model
{
    use HasFactory;
    protected $fillable =['inbox_id','user_id','message'];

    public function inbox(){
       return $this->belongsTo(Inbox::class,'inbox_id','id');
    }
    
}

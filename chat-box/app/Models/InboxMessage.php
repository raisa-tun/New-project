<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InboxMessage extends Model
{
    use HasFactory;
    protected $fillable =['inbox_id','user_id','message','is_read'];

    public function inbox(){
       return $this->belongsTo(Inbox::class,'id','inbox_id');
       //dd($this->belongsTo(Inbox::class,'id','inbox_id'));
    }
}

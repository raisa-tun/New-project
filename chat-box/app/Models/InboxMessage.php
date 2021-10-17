<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class InboxMessage extends Model
{
    use HasFactory;
    protected $fillable =['inbox_id','user_id','message'];

    public function inbox(){
       return $this->hasMany(Inbox::class,'inbox_id','id');
    }
    public function path(){
        return url("/inbox/{$this->user_id}-" .Str::slug($this->message) );
    }
}

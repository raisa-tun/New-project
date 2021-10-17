<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Inbox extends Model
{
    use HasFactory;
    protected $fillable =['name','from_user','received_user'];

    public function fromuser(){
        return $this->belongsTo(User::class, 'from_user', 'id');
    }
    public function rcvuser(){
        
        return $this->belongsTo(User::class, 'received_user', 'id');
       }
    public function inboxmsg(){

       return $this->belongsTo(InboxMessage::class, 'id','inbox_id');
      // path();
       
    }
    public function path(){
        return url("/inbox/{$this->user_id}-" .Str::slug($this->message) );
    }
}

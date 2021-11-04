<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


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

       return $this->hasMany(InboxMessage::class, 'inbox_id','id');
    }
   public function getreceiver_inbox($sender_id,$user_id){
    return Inbox::where('from_user',$sender_id)->where('received_user',$user_id)->first();

   }
}

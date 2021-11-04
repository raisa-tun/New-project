<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Inbox;
use App\Models\InboxMessage;


class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        
    }
    public function index()
    {
        $user= Auth::user();
        //dd($user);
        if(empty($user)){
            dd("There is no user logged in right now");
        }
        else{
            $inboxes = $user->inbox;
            
        }
        
       // dd($inboxes);
         // return view('inbox.inbox_list', compact('inboxes'));
           $admins = User::all();
         // $lists = Inbox::with('fromuser','rcvuser','inboxmsg')->paginate(10);
            
            //return view('inbox.inbox_list', ['lists'=>$lists]);                    
            return view('inbox.add', ['admins'=>$admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('inbox.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input('received_user'));
        //dd($request->all());
       
        $logged_in_id = Auth::user()->id;
        // dd($id);
      //  dd($request->received_id);
    
       //dd($inbox_id);
        $inbox = Inbox::where('from_user',$logged_in_id)->where('received_user',$request->received_id)->first();
       // dd($inbox);
       // dd($inbox->rcvuser->inbox,$inbox->fromuser->inbox);
       $fromuser = $inbox->from_user;
      // dd($fromuser);
       $received = $inbox->received_user;
      // dd($received);

        if(isset($inbox) )
        {
            
           // dd("There already data exists");
           
          // dd($inbox_id);
           $inbmsg = InboxMessage::create([
            'inbox_id' => $inbox->id,
            'user_id' => $logged_in_id,
            'message' => $request->message
            
        ]);
        //dd($inbmsg);
          return redirect('/inbox');
        }
        else{

           // dd("Not exists");
            $inbox = Inbox::create([
                'from_user' => $id,
                'received_user' => $request->received_id
                ]);
               // dd($inbox->id);
                 //for inbox_messages
            $inbmsg = InboxMessage::create([
                'inbox_id' => $inbox->id,
                'user_id' => $id,
                'message' => $request->message
                
            ]);
            return redirect('/inbox');
        }
              //for inbox table
       /*       $inbox = Inbox::create([
                    'from_user' => $id,
                    'received_user' => $request->user_id
                    ]);
                     //for inbox_messages
              $inbmsg = InboxMessage::create([
                    'inbox_id' => $inbox->id,
                    'user_id' => $id,
                    'message' => $request->message
                    
                ]);*/
 
            //return redirect('/inbox');
        
        //dd($inbox);
       // $id = Inbox::orderBy('id')->get();
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Inbox $inbox)
    {
     // dd($id->fromuser->name);
        
       // $getuserinbox_id = $id->id;
       // $getuser_id = $id->from_user;
       // $getreceiver_id = $id->received_user;
       $sender_user_message = $inbox->inboxmsg;
      //dd($inbox->inboxmsg);
       $received_user_message = $inbox->getreceiver_inbox($inbox->received_user,$inbox->from_user)->inboxmsg;
       dd($received_user_message);
       
       // $receiver_inbox_id = Inbox::where('from_user',$getreceiver_id)->where('received_user',$getuser_id)->first();
        //dd($receiver_inbox_id->id);

        //$user_messages = InboxMessage::where('inbox_id',$getuserinbox_id)->get();
      // dd($user_messages);
        //$reply_messages = InboxMessage::where('inbox_id',$receiver_inbox_id->id)->get(); 
       // dd($reply_messages);
        return view('inbox.show',compact('inbox','sender_user_message','received_user_message'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = InboxMessage::find($id);
        //dd($user);
        $user->delete();
        return redirect('/inbox');
    }
}

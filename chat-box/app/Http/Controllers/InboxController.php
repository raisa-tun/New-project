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
        if(empty($user)){
            dd("There is no user logged in rigght now");
        }
        else{
            $inboxes = $user->inbox;
            
        }
        //dd($user);
        //dd($inboxes);
          //return view('inbox.inbox_list', compact('inboxes'));
           $admins = User::all();
          //$lists = Inbox::with('fromuser','rcvuser','inboxmsg')->paginate(10);
            
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
       // dd($request->all());
       
        $id = Auth::user()->id;
  //  dd($id);
        $rcv = Auth::user();

        foreach($rcv as $rcv1){
          dd($rcv1->inbox);
        }
        //for inbox table
        if(!$request->user_id == $rcv ){
           $inbox = Inbox::create([
            'from_user' => $id,
            'received_user' => $request->user_id
            ]);
        }

        
        //dd($inbox);
       // $id = Inbox::orderBy('id')->get();
        //for inbox_messages
        $inbmsg = InboxMessage::create([
            'inbox_id' => $inbox->id,
            'user_id' => $id,
            'message' => $request->message
            //'is_read' => 
         ]);
        
            
         return redirect('/inbox'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Inbox $id)
    {
      // dd($id);;
      
       foreach($id as $inbox_id){
        //dd($inbox_id);
       }
        return view('inbox.show',compact('id'));
        
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

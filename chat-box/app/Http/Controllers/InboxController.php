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
         //  $admins = User::all();
          $lists = Inbox::with('fromuser','rcvuser','inboxmsg')->paginate(5);
          //dd($lists->first());
          //dd($lists);
        // $lists = Inbox::with('fromuser','rcvuser','inboxmsg')->first();
        

          //dd($lists->first()->inboxmsg->message);
        return view('inbox.inbox_list', ['lists'=>$lists]);
       //return view('inbox.add', ['admins'=>$admins]);
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
    
        
        //for inbox table
       // if(isset())
        $inbox = Inbox::create([
            'from_user' => $id,
            'received_user' => $request->user_id
            ]);
        
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
    public function show(Inbox $id, $slug)
    {
       //dd($id);

        
       // $id = InboxMessage::where('inbox_id',$id)->first();
        //return $slug;
        return view('inbox.show',compact('id'));
        //return view('inbox.show',['lists'=>$lists]);
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
        //
    }
}

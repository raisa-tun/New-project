@extends('layouts.app')

@section('content')
     <div class = "m-auto w-4/8 py-18 pt-20">
         <div class="text-center">
             <h1 class="text-xl uppercase bold">
                 Chat</h1>
         </div>
     </div>  

     <div class="flex justify-center pt-10">
         <form action="/inbox" method="Post">
         @csrf
           <div class="input-group">
               <textarea class="form-control w-80" aria-label="With textarea" name="message"></textarea>
           </div>
           
           <div class="input-group mt-3">

                <select class="custom-select w-80" id="inputGroupSelect04" name= "user_id">
                    <option selected>Choose...</option>

                    @foreach($admins as $admin)
                    <option value="{{$admin->id}}">{{$admin->name}}</option>
                    @endforeach

                </select>
                
           </div>
           <button type="add" class="bg-blue-500 block shadow-5xl mb-20 p-2 w-80
                         uppercase font-bold  mt-3">
                         Send
                 </button>


         </form>

         
     </div>
               
@endsection


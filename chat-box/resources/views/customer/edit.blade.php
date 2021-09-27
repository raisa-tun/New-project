@extends('layouts.app')

@section('content')
     <div class = "m-auto w-4/8 py-18 pt-20">
         <div class="text-center">
             <h1 class="text-xl uppercase bold">
                 Edit User</h1>
         </div>
     </div>  

     <div class="flex justify-center pt-10">
         <form action="/customer/{{$user->id}}" method="Post">
         @csrf
         @method('PUT')
         
             <div class="block">
                 
                 <input type="text" class="block shadow-5xl mb-6 p-2 w-80 italic    
                        placeholder-gray" name="name" placeholder="Name" value="{{$user->name}}">
                 <input type="text" class="block shadow-5xl mb-6 p-2 w-80 italic    
                        placeholder-gray" name="email" placeholder="Email" value="{{$user->email}}">
                 <input type="password" class="block shadow-5xl mb-6 p-2 w-80 italic    
                        placeholder-gray" name="password" placeholder="Password">
                 <button type="add" class="bg-blue-500 block shadow-5xl mb-20 p-2 w-80
                         uppercase font-bold">
                         Update
                 </button>

             </div>
         </form>
     </div>
    
@endsection


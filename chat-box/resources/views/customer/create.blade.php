@extends('layouts.app')

@section('content')
     <div class = "m-auto w-4/8 py-18 pt-20">
         <div class="text-center">
             <h1 class="text-xl uppercase bold">
                 Create user</h1>
         </div>
     </div>  

     <div class="flex justify-center pt-10">
         <form action="/customer" method="Post">
         @csrf
             <div class="block">
                 
                 <input type="text" class="block shadow-5xl mb-6 p-2 w-80 italic    
                        placeholder-gray" name="name" placeholder="Name">
                        @error('name')
                           <div class="w-4/8 mb-4">{{$message}}</div>
                           @enderror
                 <input type="text" class="block shadow-5xl mb-6 p-2 w-80 italic    
                        placeholder-gray" name="email" placeholder="Email">
                 <input type="password" class="block shadow-5xl mb-6 p-2 w-80 italic    
                        placeholder-gray" name="password" placeholder="Password">
                 <button type="add" class="bg-blue-500 block shadow-5xl mb-20 p-2 w-80
                         uppercase font-bold">
                         Add user
                 </button>

             </div>
         </form>

         
     </div>
                @if($errors->any())
                        <div class="w-4/8 m-auto text-center">
                            @foreach ($errors->all() as $error)
                            <li class="text-red-500 list-none">
                                {{$error}}
                            </li>
                            @endforeach
                    @endif
@endsection


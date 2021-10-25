@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
   th, td {
    font-size: 15px;
  }
  </style>
     <div class="m-auto w-4/5 py-16">
         <div class="text-center">
             <h1 class="text-4xl uppercase bold">
                 User List
             <h1>
         </div>

     <div class="w-5/6 py-10">
         <div class="m-auto">
             <span class="uppercase text-blue-500 font-bold text-xs">
             <div class="container">
          
                    <table class="table" >
                      <thead>
                        <tr>
                          <th>From User</th>
                          
                          <th>Received User</th>
                          <th>Created at</th>
                          
                        </tr>
                      </thead>
                 
                      <tbody>
                      @foreach($inboxes as $inbox)
                        <tr>
                          
                          <td>{{$inbox->fromuser->name}}</td>
                        <td>
                        <?php
                        
                           if(isset($inbox->rcvuser->name)){
                              echo ($inbox->rcvuser->name);
                           }
                           else{
                               echo "Unknown name";
                           }
                          ?>
                          </td>
                          <td>{{$inbox->created_at}}</td>

                   
                          <td>
                            
                              <button type="submit" class="border-b-2 pb-2 border-dotted italic
                                            text-red-500">
                                            
                      
                                
                                          
                                          <a href= " {{url('inbox/'.$inbox->id.'/show')}}">
                                            Show message &rarr;</a>
                                  
                                                
                                          
                                          
                                     
                              </button>
                          </td>
                          <td>
                            
                            @if(isset($inbox->id))
                            <form action="/inbox/{{$inbox->id}}" method="POST">
                                 @csrf
                                 @method('delete')
                                 <button type="submit" class="border-b-2 pb-2 border-dotted italic
                                         text-red-500">
                                      Delete &rarr;
                                  
                                 </button>
                            </form>
                              @else
                                 Nothing to delete
                               @endif
                          </td>
                         
                        </tr>
                   @endforeach
                     
                      </tbody>
                    </table>
           {{--      {{ $lists->links() }}  --}}
                    
</div>

             </span> 
         </div>

         
     </div>
     
</div>

@endsection

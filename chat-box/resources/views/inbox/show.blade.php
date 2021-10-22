@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
   th, td {
    font-size: 15px;
  }
  .flex-container{
    display: flex;
    align-items: stretch;
  }
  .flex-container>div{
    margin:10px;
  }
  </style>
     <div class="m-auto w-4/5 py-16">
         <div class="text-center">
             <h1 class="text-4xl uppercase bold">
                 Chat List
             <h1>
         </div>

     <div class="w-5/6 py-10">
         <div class="m-auto">
             <span class= "text-blue-500 font-bold text-xs">
             <div class="container">
          
                    <table class="table" >
                      <thead>
                        <tr>
                          <th>From User</th>
                          <th>Received User</th>
                          <th>Message</th>
                          <th>Created at</th>
                          
                        </tr>
                      </thead>
                 
                      <tbody>
                      
                     
                        <tr>
                        <td>
                        <?php
                         
                           if(isset($id->fromuser->name)){
                              echo ($id->fromuser->name);

                              
                           }
                           else{
                               echo "Unknown";
                           }
                          
                          
                          ?>
                          </td>
                          <td>
                          <?php
                          
                          if(isset($id->rcvuser->name)){
                             echo ($id->rcvuser->name);

                             
                          }
                          else{
                              echo "Unknown";
                          }
                         
                         
                         ?>
                         </td>

                         <td>
                        <?php
                         
                           if(isset($id->inboxmsg->message)){
                              echo ($id->inboxmsg->message);

                              
                           }
                           else{
                               echo "No messages to show";
                           }
                          
                          
                          ?>
                          </td>
                          <td>
                                {{$id->inboxmsg->created_at}}
                          </td>
                          <td>
                            
                            <button type="submit" class="border-b-2 pb-2 border-dotted italic
                                          text-red-500">
                                       <a href ="">
                                       
                                           Edit &rarr;</a>   
                            </button>
                        </td>
                        <td>
                          <?php// dd($id->inboxmsg);?></td>
                          </tr>
                      
                         
                  
                     
                      </tbody>
                    </table>
                    
                    
                    
</div>
           

             </span> 
    <form action="{{route('showmsg.store')}}" method="Post">
    @csrf
      <div class="flex-container">
            <input type = "hidden" value="{{$id->inboxmsg->inbox_id}}" name="inbox_id">

            <div style="flex-grow: 8">
               <textarea class="form-control" aria-label="With textarea" name="message"></textarea>
            </div>
            <div style ="flex-grow: 3">
               <button type="submit" class="bg-blue-300 block shadow-6xl mb-20 p-2 w-20
                         uppercase font-bold  mt-4">
                         Add 
                 </button>
            </div>
      </div>
    </form>     
         </div>
              
         
     </div>

</div>

@endsection

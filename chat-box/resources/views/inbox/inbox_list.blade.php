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
                      @foreach($lists as $list)
                        <tr>
                          
                          <td>{{$list->fromuser->name}}</td>
                        <td>
                        <?php
                        
                           if(isset($list->rcvuser->name)){
                              echo ($list->rcvuser->name);
                           }
                           else{
                               echo "Unknown name";
                           }
                          ?>
                          </td>
                          <td>{{$list->created_at}}</td>

                   
                          <td>
                            
                              <button type="submit" class="border-b-2 pb-2 border-dotted italic
                                            text-red-500">
                                            
                                  
                                 <?php //   dd($list->inboxmsg->inbox_id); ?>
                                          @if(isset($list->inboxmsg->inbox_id))
                                          <a href= " {{url('inbox/'.$list->inboxmsg->inbox_id.'/show')}}">
                                            Show message &rarr;</a>
                                      <!--   <a href ="inbox/{{$list->inboxmsg->inbox_id}}/show">
                                        
                                         
                                             Show message &rarr;</a>-->
                                                
                                          
                                          @else
                                             No messages
                                          
                                          @endif
                                         
                                          
                              </button>
                          </td>
                          <td>
                            
                            @if(isset($list->inboxmsg->inbox_id))
                            <form action="/inbox/{{$list->inboxmsg->id}}" method="POST">
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
                 {{ $lists->links() }}
                    
</div>

             </span> 
         </div>

         
     </div>
     
</div>

@endsection

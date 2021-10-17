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
                 Chat List
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
                      
                     
                        <tr>
                        <td>
                        <?php
                         
                          dd($id->path->message);
                           
                           if(isset($id->path->message)){
                              echo ($id->path->message);

                              
                           }
                           else{
                               echo "No messages";
                           }
                          
                          
                          ?>
                          </td>
                          </tr>
                      
                         
                  
                     
                      </tbody>
                    </table>
                    
                    
</div>

             </span> 
         </div>
              
         
     </div>
     
</div>

@endsection

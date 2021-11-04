
<!DOCTYPE html>
<html>
<head>



<style>

  .flex-container{
    display: flex;
    align-items: stretch;
    
  }
  .flex-container>div{
    margin:10px;
  }
  .container{
    margin: 70px;
}
.box1 {
    width: 50%;
    float: left;
    padding: 20px;
    border: 1px solid gray;
    
} 
.box2 {
    width: 50%;
    float: right;
    padding: 20px;
    border: 1px solid gray;
    margin: 20px;
} 
.add{
  margin:170px 0px 0px 0px;
  width: 100%;
  padding:20px;
  
}
form{
  width:100%;
}
  </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>   
         
  <body>                     
 <div class= "container">
                  <h1>User Name</h1>
                    <div class="box1">User name</div>
                    <div class="box2">Receiver name</div>
                  
           
           

  <div class = "add">
    <form action="{{route('showmsg.store')}}" method="Post">
    @csrf
      <div class="flex-container">
            

            <div style="flex-grow: 8">
               <textarea class="form-control" aria-label="With textarea" name="message"></textarea>
            </div>
            <div style ="flex-grow: 3">
               <button type="submit" class="bg-blue-300 block shadow-6xl mb-20 p-2 w-20
                         uppercase font-bold  mt-4">
                         Send
                 </button>
            </div>
      </div>
    </form> 
</div>    
</div>    
</body>
</html>             
         
   




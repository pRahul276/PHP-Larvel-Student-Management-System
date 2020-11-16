<!--/* filename    : class.blade.php
** Date            : 14/11/2020
** Description     : To Create a Class, using school_ID which is predefined
                     when this URL load It's Bring all SchoolID From the database In variable $$schoolid
*/-->

<!DOCTYPE html>
<html>
    <head>
        <title>Create a Class</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
<body>

    <form class="" action="{{URL::to('/ClassCreate')}}"  method="post">
         <label for="fname">Create a Class</label><br>
         <input type="text" name="classname" id="classname" value=" "><br><br>
<!--     Showing available schoolID to create a class-->
         <select name="schoolID" id="schoolID" >  
            @foreach($schoolid as $id)
               <option  value="{{ $id->id}}">{{$id->id}}</option>
            @endforeach
     </select>
      <input type="hidden" name="_token" value="{{csrf_token()}} "><br>    <!-- Hidden token to establish connection -->
       <input type="submit" id="submit" name="submit" value="Submit">
</form> 
    <script>
        $(document).ready(function(){
                
                /*
                 * mouseover event to check user En ter data perfectly,
                 * if not show's alert with a error what they missing.
                 * @type Arguments
                 *
                 * And call function datacheck() to check 
                 * validate user enterd class name.
                 * @param {type} CN
                 * @param {type} CI
                 * @returns {undefined}
                 */*/
                $('#submit').mouseover(function(){
                     
                   var classname = $('#classname').val();
                   var schoolID = $('#schoolID').val();
                   if(classname === " " || schoolID === " "){
                       alert ("please Enter Data"); 
                   }
                   
                   datacheck(classname.trim(),schoolID);
                }); 
                
                
               
                /*
                 * Keyup event and call alphanumeric function to validate userInput
                 * @returns {undefined}
                 */*/
                $('#classname').on("keyup",function(){
                   var userInput = $("#classname").val();  //get the userinput val
                   alphanumeric(userInput.trim());
                   });
                
                /*
                 * 
                 * Create a Function alphanumeric to validate use input, 
                 * param {type} CN 
                 */*/
                function alphanumeric(inputtxt)
                   { 
                       var letters = /^[a-zA-Z]+$/;
                       if(inputtxt.match(letters)){
                          return true;
                       }
                       else{
                        alert('Please input alphab only');
                         return false;
                       }
                   }
                   
                /*
                 * function datacheck() to check 
                 * validate user enterd class name.
                 * @param {type} CN
                 * @param {type} CI 
                 */*/
                function datacheck(CN,CI){
                      <?php
                           $className_J= json_encode($ci);
                       ?>
                       var className= <?php echo $className_J;?>;
                       for(var i=0; i<className.length; i++ ){
                           var a = className[i];
                           if(a.name == CN && a.school_id == CI){
                               alert("Class is Not Available");

                           }
                       }

                }
        });        
    </script>

</body>
</html>
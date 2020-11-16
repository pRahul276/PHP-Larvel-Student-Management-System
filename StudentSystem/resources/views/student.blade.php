<!--/* filename    : student.blade.php
** Date            : 14/11/2020
** Description     : To Create a Student, And check user enter valid data or not,
                     when this URL load It's Bring all ClassId From the database.
*/-->
<!DOCTYPE html>
<html>
    <head>
        <title>Enter Student Data</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    

         <body> 
         <form class=""  action="{{URL::to('/StudentCreate')}}" method="post"  
                  id="form" >
            <label for="fname">Create a Student</label><br>
            <input type="text" name="studentNumber" id="studentNumber" value=" "><br><br>
            <input type="text" name="studentFirstName" id="studentFirstName" value=" "><br><br>
            <input type="text" name="studentLastName"  id="studentLastName" value=" "><br><br>
<!--     Showing Not available ClassID to create a class-->
            <select name="classID" >
                @foreach($classid as $id)
                <option value="{{ $id->id}}">{{$id->id}}</option>
                @endforeach
            </select>
            <input type="hidden" name="_token" value="{{csrf_token()}} "><br>
            <input type="submit" id="submit" value="Submit">
          </form> 
              
        <script>
             $(document).ready(function
                
                /*
                 * mouseover event to check user En ter data perfectly,
                 * if not show's alert with a error what they missing.
                 * @type Arguments
                */
                $('#submit').mouseover(function(){
                     
                   var studentNumber = $('#studentNumber').val();
                   var studentFirstName = $('#studentFirstName').val();
                   var studentLastName = $('#studentLastName').val();
                    
                   //Condition to chek eny fiels is missing or not, if Missing gave alert 
                   if(studentNumber === "" || studentFirstName === "" || studentLastName === " " ){
                       alert ("please Enter Data"); 
                   }
                   
                }); 
                
                $('#studentNumber').on("keyup",function(){
                   var userInput = $("#studentNumber").val();  //get the userinput value
                   alphanumeric(userInput.trim());
                   if(userInput.length < 13 ||userInput.length>13)    //if user input length less than 12
                   {
                    $("p").remove();     //remove previous peragraph
                    $("#form").append($("<p>",{text : "please,Enter 12 characters"}))  
                  } 
                  if(userInput.length ===13){
                        $("p").remove();
                         <?php
                          $studentnumber_1 = array();
                          foreach($studentNumber as $num){
                               foreach ($num as $key=>$value) {
                                   array_push($studentnumber_1,$value); ; 
                               }
                           };
                           $j_StudentNumber= json_encode($studentnumber_1);
                        ?>
                        var studentNumber= <?php echo $j_StudentNumber;?>;
                        for(var i=0; i<studentNumber.length; i++){
                            var a = studentNumber[i];                        
                            if(a == userInput.trim()){
                              //   alert("Student in a Database");
                               $("#form").append($("<p>",{text : "Student in a Database"})) 
                            }
                        } 
                    }
                  
                });
             });
            
                /*
                 * 
                 * Create a Function alphanumeric to validate use input, 
                 * param {type} CN 
                 */*/
                function alphanumeric(aa){ 
                    var letters = /^[0-9a-zA-Z]+$/;
                    if(aa.match(letters)){
                       return true;
                    }
                    else{
                     alert('Please input alphanumeric characters only');
                      return false;
                    }
                }          
        </script>
    </body>
</html>
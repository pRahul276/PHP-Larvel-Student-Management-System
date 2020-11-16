<!--/* filename    : school.blade.php
** Date            : 14/11/2020
** Description     : To Create a School, And check user enter valid data or not,
                     when this URL load It's Bring all SchoolName From the database.
*/-->

<!DOCTYPE html>
<html>
    <head>
        <title>Create a School</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
<body>

    <form class="" action="{{URL::to('/SchoolCreate')}}" id="form" method="post">
     <label for="fname">School name:</label><br>
      <input type="text" id="schoolname" name="schoolname" value=" "><br>
      <input type="hidden" name="_token" value="{{csrf_token()}} "><br>
       <input type="submit" id="submit" value="Submit">
    </form> 
    <script>
        $(document).ready(function(){  
                
                /*
                 * mouseover event to check user En ter data perfectly,
                 * if not show's alert with a error what they missing.
                 * @type Arguments
                 *
                 */*/
                $('#submit').mouseover(function(){
                   var schoolname = $('#schoolname').val();
                   if(schoolname == " "){
                       alert ("please Enter Data"); 
                   }  
                }); 
                
                
                /*
                 * Keyup event and call alphanumeric function to validate userInput
                 * @returns {undefined}
                 */*/
                $('#schoolname').on("keyup",function(){
                        var userInput = $("#schoolname").val();  //get the userinput value
                        alphanumeric(userInput.trim());
                        
                        //Calling php to convert Php array to JSON, So in fuure we can use in JS.
                        <?php
                            $schoolName_T= array();
                            foreach($schoolname as $name){
                                foreach ($name as $key=>$value) {
                                            array_push($schoolName_T,$value); ; 
                                        }
                                    }
                            $schoolName_J= json_encode($schoolName_T);      //Decode Array to get Valuw In Front-end
                        ?>

                        //Conver Php value in JS 
                        var schoolName= <?php echo $schoolName_J;?>;

                        //For loop to check user etered data is available in database or not
                        for(var i=0; i<schoolName.length; i++){
                                var a = schoolName[i];         
                                if(a == userInput.trim()){
                                     $("#form").append($("<p>",{text : "School in a Database"})) 
                                    } $("p").remove();
                                } 
            });
                
                /*
                 * function datacheck() to check 
                 * validate user enterd class name.
                 * @param {type} CN
                 * @param {type} CI 
                 */*/
                function alphanumeric(inputtxt)
                    { 
                       var letters = /^[a-zA-Z]+$/;
                       if(inputtxt.match(letters)){
                       return true;
                    }
                    else{
                       alert('Please input alphabeat only');
                       return false;
                   }   
                }
                
        }); 
    </script>
</body>
</html>
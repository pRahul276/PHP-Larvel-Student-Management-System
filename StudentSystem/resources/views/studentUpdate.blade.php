<!--/* filename    : studentUpdate.blade.php
** Date            : 14/11/2020
** Description     : Display all student,and User can update first_Name, Last_Name,Class_id  on this page,
                     Use Predefined JQUERy, AJAX, BOOTSTRAP  to Build TABLE And User Can Delate the student.
*/-->
<!DOCTYPE html>
<html>
    <head>
        <title>Update Student Data</title>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
         <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
    </head>
    <body>
    <div class="container">
      <br />
      <h3 align="center">Update Student's Record</h3>
      <br />
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Sample Data</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            @csrf
            <table id="editable" class="table table-bordered table-striped">
              <thead>
                  <tr>
                  <th>id</th>  
                  <th>student_number</th>
                  <th>first_name</th>
                  <th>last_name</th>
                  <th>classroom_id</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{ $row->id }}</td>  
                  <td>{{ $row->student_number }}</td>
                  <td>{{ $row->first_name }}</td>
                  <td>{{ $row->last_name }}</td>
                  <td>{{ $row->classroom_id }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

<script type="text/javascript">
            $(document).ready(function(){

               //Create to store CSRF hidden value 
                $.ajaxSetup({
                headers:{
                  'X-CSRF-Token' : $("input[name=_token]").val()
                }
              });
              
              //Call Php pto get classID in which user can change for a student.
              <?php
                    $classID_T = array();
                    foreach ($classid as $id){
                        foreach ($id as $key=>$value) {
                            array_push($classID_T,$value); ; 
                            }
                    }
                    $classID = json_encode($classID_T);
                ?>
                     var classID_J = <?php echo $classID; ?>  //Convert in JS OBject

              //Innitialize Editable
              $('#editable').Tabledit({
                url:'{{ route("tabledit.action") }}',    //send action to controller
                dataType:"json",
                columns:{
                  identifier:[0, 'id'],
                   editable:[[2, 'first_name'], [3, 'last_name'], [4, 'classroom_id','{"1":"1", "2":"15"}']]
               },
                
                //Close restioration of the Buttuon
                restoreButton:false,
                onSuccess:function(data, textStatus, jqXHR)
                {
                  if(data.action == 'delete')
                  {
                    $('#'+data.id).remove();
                  }
                }
              });

            });  
</script>
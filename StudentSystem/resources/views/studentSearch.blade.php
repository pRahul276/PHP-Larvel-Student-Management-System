<!--/* filename    : studentSearch.blade.php
** Date            : 14/11/2020
** Description     : To Search Student, User Enter Student Name to Search and display resut on this page,
                     Use Predefined JQUERy, AJAX, BOOTSTRAP  to Build TABLE
*/-->
<!DOCTYPE html>
<html>
    <head>
        <title>Student Search</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
<body>

    <form class="" action="{{URL::to('/StudentSearch')}}"  method="post">
     <label for="fname">Enter First Name</label><br>
     <input type="text" name="firstname" id="firstname" value=" "><br><br>
      
      <input type="hidden" name="_token" value="{{csrf_token()}} "><br>
       <input type="submit" id="submit" name="submit" value="Submit">
</form> 
      
    <div class="container">
      <br />
      <h3 align="center">SEARCH DATA ARE</h3>
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
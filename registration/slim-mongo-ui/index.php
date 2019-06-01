<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand">Navbar</a>
      <form class="form-inline" id="form">
        <input class="form-control mr-sm-2" type="search" name="name" id="name" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </nav>
    <br/>
    <div class="container">
      <a href="insert.php"><button type="button" class="btn btn-info">create student</button></a>
      <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">ลำดับ</th>
              <th scope="col">ชื่อ</th>
              <th scope="col">อายุ</th>
              <th scope="col">ที่อยู่</th>
              <th scope="col">โรงเรียน</th>
              <th scope="col">โรงเรียน</th>
              <th scope="col">มหาวิทยาลัย</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="profile"></tbody>
        </table>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
      function deleteStudent(id){
        if (confirm("คุณต้องการลบหรือไม่")) {
          $.get("http://localhost/slimmongo/delete/"+id, {},
            function (data, textStatus, jqXHR) {
              search();
            }
          );

        }
      }

      function renderTable(data){
          var profile = $("#profile");
          profile.empty();

          $.each(data, function (index, value) { 
             profile.append('<tr>'
              + '<th>'+(index+1)+'</th>'
              + '<td>'+value.name+'</td>'
              + '<td>'+value.age+'</td>'
              + '<td>'+value.address.hno+' '+value.address.subdistrict
                +' '+value.address.district+' '+value.address.province+'</td>'
              + '<td>'+value.education[0]+'</td>'
              + '<td>'+value.education[1]+'</td>'
              + '<td>'+value.education[2]+'</td>'
              + '<td><a href="edit.php?id='+value.id+'"><button class="btn btn-warning">edit</button></a>' 
              + '<button class="btn btn-danger" onclick="deleteStudent(\''+value.id+'\')">delete</button></td>'
            + '</tr>')
          });

        }

        function search(data){
          $.post("http://localhost/slimmongo/search", data,
            function (data, textStatus, jqXHR) {
              renderTable(data);
            }
          );
        }
      $(document).ready(function () {

        search();

        $("#form").submit(function (e) { 
          e.preventDefault();
          var data = $(this).serialize();
          search(data);
        });

      });
    </script>
  </body>
</html>
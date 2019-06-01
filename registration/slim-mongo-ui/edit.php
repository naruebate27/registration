<?php
    $id = $_GET['id'];
    echo $id;
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Edit Student</title>
  </head>
  <body>
    <div class="container">
        <h1>Edit Student</h1>

        <form id="form">
            <input type="hidden" class="form-control" id="id" name="id" value="<?=$id?>">
            <div class="form-group">
                <label>ชื่อ</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label>อายุ</label>
                <input type="number" class="form-control" id="age" name="age">
            </div>
            <div class="form-group">
                <label>บ้านเลขที่</label>
                <input type="text" class="form-control" id="hno" name="hno">
            </div>
            <div class="form-group">
                <label>ตำบล</label>
                <input type="text" class="form-control" id="subdistrict" name="subdistrict">
            </div>
            <div class="form-group">
                <label>อำเภอ</label>
                <input type="text" class="form-control" id="district" name="district">
            </div>
            <div class="form-group">
                <label>จังหวัด</label>
                <input type="text" class="form-control" id="province" name="province">
            </div>
            <div class="form-group">
                <label>โรงเรียนประถม</label>
                <input type="text" class="form-control" id="education0" name="education0">
            </div>
            <div class="form-group">
                <label>โรงเรียนมัธยม</label>
                <input type="text" class="form-control" id="education1" name="education1">
            </div>
            <div class="form-group">
                <label>มหาวิทยาลัย</label>
                <input type="text" class="form-control" id="education2" name="education2">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            var form  = $("#form");
            var id = $("#id").val();

            getStudentById();

            function getStudentById(){
                $.get("http://localhost/slimmongo/findStudentById/"+id, {},
                    function (data, textStatus, jqXHR) {
                        $("#name").val(data.name);
                        $("#age").val(data.age);
                        $("#hno").val(data.address.hno);
                        $("#subdistrict").val(data.address.subdistrict);
                        $("#district").val(data.address.district);
                        $("#province").val(data.address.province);
                        $("#education0").val(data.education[0]);
                        $("#education1").val(data.education[1]);
                        $("#education2").val(data.education[2]);
                    }
                );
            }

            form.submit(function (e) { 
                e.preventDefault();
                var data = form.serialize();
                $.post("http://localhost/slimmongo/update", data,
                    function (data, textStatus, jqXHR) {
                        window.location.href = "http://localhost/swe/";
                    }
                );
            });
        });

    </script>
  </body>
</html>
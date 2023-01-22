<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div>
        <div class="container">
            <!-- Button trigger modal -->

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name : </label>
                                <input type="text" class="form-control" id="userName" aria-describedby="Help" placeholder="Enter Your Name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email : </label>
                                <input type="email" class="form-control" id="userEmail" aria-describedby="emailHelp" placeholder="Enter Your Email">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" onclick="adduser()">Submit</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- updated Modal -->
            <div class="modal fade" id="updatedModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="updateName" class="form-label">Name : </label>
                                <input type="text" class="form-control" id="updateName" aria-describedby="Help">
                            </div>
                            <div class="mb-3">
                                <label for="updateEmail" class="form-label">Email : </label>
                                <input type="email" class="form-control" id="updateEmail" aria-describedby="emailHelp" placeholder="Enter Your Email">
                            </div>
                            <input type="hidden" id="hiddenId">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" onclick="updateData()">Update</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <div>
                <h1>This is MY Ajax CRUD</h1>
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add New User
            </button>


            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyData">

                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script>
            getuser()

            function getuser() {
                $.ajax({
                    url: 'display.php',
                    type: 'get',
                    success: function(res) {
                        $('#tbodyData').html(res);
                    }
                })

            }
            function adduser() {
                var name = $('#userName').val();
                var email = $('#userEmail').val();

                $.ajax({
                    url: 'insert.php',
                    type: 'post',
                    data: {
                        userName: name,
                        userEmail: email,
                    },
                    success: function(res) {
                        $("#exampleModal").modal("hide");
                        getuser()
                    }
                })

            }

            function deleteUser(id) {
                var alarts = confirm("Are You Sure Delete This User!!");

                if (alarts) {
                    $.ajax({
                        url: "delete.php",
                        type: "post",
                        data: {
                            sendId: id
                        },
                        success: function(res) {
                            getuser()
                        }
                    })
                } else {
                    // console.log('success');
                }
            }
            function UpdateUser(id) {
                $("#updatedModel").modal("show");
                $('#hiddenId').val(id);
                $.post("single.php",{updateID:id},function(data){
                    var user = JSON.parse(data);
                    $('#updateName').val(user.name)
                    $('#updateEmail').val(user.email)
                })
               
            }
            function updateData(){
                var upID = $('#hiddenId').val()
                var upName = $('#updateName').val()
                var upEmail = $('#updateEmail').val()
              
               $.post("update.php",{
                upID:upID,
                upName:upName,
                upEmail:upEmail,
               },function(data){
                $("#updatedModel").modal("hide");
                getuser()
               })
            }
        </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Administrator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../images/GigaShop-Logo.png" type="image/png+xml" />
  <link rel="stylesheet" href="css/adminUser.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
</head>
<body>
<?php require 'process.php'?>
<?php require 'updateuser.php'?>
<?php
    if(isset($_SESSION['message'])): ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php 
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    ?>
    </div>
    <?php endif?>
<?php
        $mysqli = new mysqli('localhost', 'root', '','request') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM users") or die($mysqli->error);

  ?>
  <header>
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="#">
            <img src="../images/GigaShop-Logo.png" alt="Giga Shop" class="ml-5 my-1" style="height: 70px" />
            ADMINISTRATOR
          </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item active">
              <a class="nav-link" href="adminUser.php">Accounts<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adminProduct.php">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adminStatus.php">Status</a>
            </li>
            <li>
              <button class="btn btn-dark" data-toggle="modal" data-target=".bs-example-modal-sm">Logout</button>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>

  <div class="container">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-6">
            <h2>Manage <b>Accounts</b></h2>
          </div>
          <div class="col-sm-6">
            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Account</span></a>
            
          </div>
        </div>
      </div>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Contact</th>
            <th>Date Created</th>
            <th>Date Modified</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
    
    while ($row = $result->fetch_assoc()): ?>
          <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['username']; ?></td>
         <td><?php echo $row['email']; ?></td>
         <td><?php echo $row['password']; ?></td>
         <td><?php echo $row['contact']; ?></td>
         <td><?php echo $row['to_date']; ?></td>
         <td><?php echo $row['mod_date']; ?></td>      
            <td>
              <button type="button" class="btn btn-success editbtn" value="Edit">Edit</button>
              <button type="button" class="btn btn-danger deletebtn" value="Delete">Delete</button>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- ADD Modal HTML -->
  <div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="process.php" method="POST">
              <div class="modal-header">
                <h4 class="modal-title">Add User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name ="user-name" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="user-email" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="text" name="user-pass" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Contact Number</label>
                  <input type="text" name="user-contact" class="form-control" required>
                </div>
                
              </div>
              <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" name="signup-btn" class="btn btn-success" value="Add">
              </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Edit Modal HTML -->


  <div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="updateuser.php" method="POST">
          <div class="modal-header">
            <h4 class="modal-title">Edit Account</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="update_id" id="update_id">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="user-name" id="user-name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="user-email" id="user-email" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="text" name="user-pass" id="user-pass" class="form-control" required>
            </div>
            <div class="form-group">
                  <label>Contact Number</label>
                  <input type="text" name="user-contact" id="user-contact" class="form-control" required>
                </div>
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" name="update-btn" class="btn btn-info" value="Save">
          </div>
        </form>
      </div>
    </div>
  </div>

  
  <!-- Delete Modal HTML -->
  <div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="removeuser.php" method="POST">
          <div class="modal-header">
            <h4 class="modal-title">Delete Account?</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
          <input type="hidden" name="delete_id" id="delete_id">

            <p>Do you want to delete this user?</p>
            <p class="text-warning"><small>This action cannot be undone.</small></p>
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <button type="submit" class="btn btn-danger" name="delete-btn">Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--Log out modal-->
  <div class="modal bs-example-modal-sm fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header"><h4>Logout Administrator<i class="fa fa-lock"></i></h4></div>
        <div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to log-off?</div>
        <div class="modal-footer"><a href="index.php" class="btn btn-primary btn-block">Logout</a></div>
      </div>
    </div>
  </div>
  <script src="js/script.js"></script>
  
  
  
  <script>
    $(document).ready(function() {
      $('.deletebtn').on('click', function() {
        $('#deleteEmployeeModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);
        $('#delete_id').val(data[0]);
      
      });
    });
  </script>
  
  
  
  <script>
    $(document).ready(function() {
      $('.editbtn').on('click', function() {
        $('#editEmployeeModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);
        $('#update_id').val(data[0]);
        $('#user-name').val(data[1]);
        $('#user-email').val(data[2]);
        $('#user-pass').val(data[3]);
        $('#user-contact').val(data[4]);

      });
    });
  </script>
</body>
</html>
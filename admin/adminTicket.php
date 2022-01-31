<!DOCTYPE html>
<html lang="en">

<head>
  <title>Administrator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../images/GigaShop-Logo.png" type="image/png+xml" />
  <link rel="stylesheet" href="../css/adminStatus.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/871a2c52f4.js"></script>
</head>

<body>
  <?php require 'process.php' ?>

  <?php
  if (isset($_SESSION['message'])) : ?>
    <div class="alert alert-<?php $_SESSION['msg_type'] ?>">
      <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);
      ?>
    </div>
  <?php endif ?>
  <?php
  require "../source/db_connect.php";
  $result = $mysqli->query("SELECT * FROM GGS_ticket") or die($mysqli->error);

  ?>
  <header class="container-fluid" style="margin-bottom: 125px">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-md navbar-custom fixed-top px-5 py-0">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="../images/GigaShop-Logo.png" alt="Giga Shop" class="ml-5 my-1" style="height: 70px" />
            ADMINISTRATOR
          </a>

          <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse my-2 py-2" id="collapsibleNavbar">
            <ul class="navbar-nav ml-lg-auto">
              <li class="nav-item">
                <a class="nav-link" href="adminProduct.php">Product</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="adminStatus.php">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="adminTicket.php" id="accounts">Tickets<span class="sr-only">(current)</span></a>
              </li>
              <li>
                <button class="btn btn-dark" data-toggle="modal" data-target=".bs-example-modal-sm">Logout</button>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <div class="table-container">
    <div class="table-title">
      <div class="row">
        <div class="col-sm-6">
          <h2>Manage <b>Tickets</b></h2>
        </div>
        <div class="col-sm-6">
          <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><span><i class="fa fa-plus" aria-hidden="true"></i>Add Ticket</span></a>
        </div>
      </div>
    </div>
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Customer Name</th>
          <th>Email</th>
          <th>Subject</th>
          <th>Description</th>
          <th>Date Created</th>
          <th>Date Resolved</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php

        while ($row = $result->fetch_assoc()) : ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['subject']; ?></td>
            <td>
              <div class="issue-container">
                <?php echo $row['issue'] ?>
              </div>
            </td>
            <td><?php echo $row['date_issued']; ?></td>
            <td><?php echo $row['date_resolved']; ?></td>
            <td><?php echo $row["status_update"]; ?> </td>
           
            <td>
            <button type="button" class="btn btn-success editbtn" value="Edit">Edit</button>
              <button type="button" class="btn btn-danger deletebtn" value="Delete">Delete</button>
            </td>

          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  <!-- ADD Modal HTML -->
  <div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="../views/request.php" method="POST">
          <div class="modal-header">
            <h4 class="modal-title">Add Ticket</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <input type='hidden' name="redirect" value="value">
            <div class="form-group">
              <label>Customer name</label>
              <input type="text" name="client_name" id="user-name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" id="user-email" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Issue</label>
              <input type="text" name="issueSubject" id="user-issue" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Description</label>
              <input type="text" name="desc" id="user-description" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" name="submit_button" class="btn btn-success" value="Add">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Edit Modal HTML -->
  <div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="updateticket.php" method="POST">
          <div class="modal-header">
            <h4 class="modal-title">Edit Ticket</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="update_id" id="u-update_id">
            <div class="form-group">
              <label>Customer name</label>
              <input type="text" name="user-name" id="u-user-name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="user-email" id="u-user-email" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Issue</label>
              <input type="text" name="user-issue" id="u-user-issue" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Description</label>
              <input type="text" name="user-description" id="u-user-description" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Date Created</label>
              <input type="textbox" name="user-date_created" id="u-user-date_created" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Date Resolved</label>
              <input type="textbox" name="user-date_resolved" id="u-user-date_resolved" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select class="form-control" id="u-user_status" name="user_status">
                <option value="In Queue">In Queue</option>
                <option value="Resolved">Resolved</option>
              </select>
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
        <form action="removeticket.php" method="POST">
          <div class="modal-header">
            <h4 class="modal-title">Delete Ticket?</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="delete_id" id="delete_id">

            <p>Do you want to delete this ticket?</p>
            <p class="text-danger"><strong>This action cannot be undone.</strong></p>
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
        <div class="modal-header">
          <h4>Logout Administrator<i class="fa fa-lock"></i></h4>
        </div>
        <div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to log-off?</div>
        <div class="modal-footer"><a href="index.php" class="btn btn-primary btn-block">Logout</a></div>
      </div>
    </div>
  </div>
  <script src="../js/script.js"></script>



  <script>
    $(document).ready(function() {
      $('.deletebtn').on('click', function() {
        $('#deleteEmployeeModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
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

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#u-update_id').val(data[0]);
        $('#u-user-name').val(data[1]);
        $('#u-user-email').val(data[2]);
        $('#u-user-issue').val(data[3]);
        $('#u-user-description').val(data[4].trim());
        $("#u-user-date_created").val(data[5]);
        $("#u-user-date_resolved").val(data[6]);
        $("#u-user_status option[value=" + data[7] + "]").attr("selected", "selected");

      });
    });
  </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Administrator</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="../images/GigaShop-Logo.png" type="image/png+xml" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/adminStatus.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
  <?php require 'queuestatus.php' ?>



  <?php
  $mysqli = new mysqli('localhost', 'root', '', 'request') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM purchase_history") or die($mysqli->error);
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
                <a class="nav-link" href="adminProduct.php" id="product">Product</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="adminStatus.php" id="services">Services</a>
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
  </header>

  <div class="container">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-6">
            <h2>Services Status</h2>
          </div>
          <form method="POST" action="printReport.php" class="col-sm-6">
            <button class="btn btn-primary" type="submit" name="download_service_report">Download Report</button>
          </form>
        </div>
      </div>

      <table class="table table-hover table-striped mx-auto mt-0 px-auto">
        <thead>
          <tr>
            <th>ID</th>
            <th>Paypal Transaction ID</th>
            <th>Products</th>
            <th>Qty</th>
            <th>Cost</th>
            <th>Total</th>
            <th>Date Bought</th>
          </tr>
        </thead>
        <tbody>


          <?php
          $total = 0;
          $data = [];

          while ($row = $result->fetch_assoc()) :
            array_push($data, $row);
          ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['transaction_id']; ?></td>
              <td><?php echo $row['products']; ?></td>
              <td><?php echo $row['qty']; ?></td>
              <td><?php echo $row['total']; ?></td>
              <?php
              $total =  $row['qty'] * $row['total'];
              ?>
              <td><?php echo $total; ?></td>
              <td><?php echo $row['date_bought']; ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>


  <!-- Resolve Modal HTML 
  <div id="resolve_ticket" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="resolvestatus.php" method="POST">
          <div class="modal-header">
            <h4 class="modal-title">Resolve Task</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
          <input type="hidden" name="resolve_id" id="resolve_id">

            <p>Is the Task Resolved?</p>
            <p class="text-warning"><small>Make sure the task is completed before proceeding</small></p>
          </div>
          <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="Resolve">Proceed</button>
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            
          </div>
        </form>
      </div>
    </div>
  </div>
-->
  <!-- Queue Modal HTML -->
  <div id="queue_ticket" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="queuestatus.php" method="POST">
          <div class="modal-header">
            <h4 class="modal-title">Queue Task</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="queue_id" id="queue_id">

            <p>Is the Task Resolved?</p>
            <p class="text-warning"><small>Make sure the task is complete before proceeding</small></p>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" name="Queue">Proceed</button>
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">

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
      $('.resolvebtn').on('click', function() {
        $('#resolve_ticket').modal('show');


        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);
        $('#resolve_id').val(data[0]);

      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $('.queuebtn').on('click', function() {
        $('#queue_ticket').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);
        $('#queue_id').val(data[0]);

      });
    });
  </script>

</body>

</html>
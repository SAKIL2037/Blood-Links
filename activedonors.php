<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
    include('header.php');
    ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="main">
      <!-- MAIN CONTENT -->
      <div class="main-content">
        <div class="container-fluid">
          <h2>Hello,  <span style="color: blue"> </span> Manage active donor Here. </h2> <br />
          <p></p> <br />
          <table class="table table-bordered" id="members">
            <thead>
              <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Age</th>
                <th>Date</th>
                <th>Blood Group</th>
              </tr>
            </thead>
            <tbody>
              <?php
              
              $date = date("Y-m-d");
              $date = strtotime(date("Y-m-d", strtotime($date)) . " -4 month");
              $date = date("Y-m-d",$date);
              include('connection.php');
              $result = mysqli_query($connection,"select * from member_info where Date <= '$date'");
              while($row = mysqli_fetch_array($result )) {
              ?>
              <tr>
                <td><?php echo $row['Name'];?></td>
                <td><?php echo $row['Phone'];?></td>
                <td><?php echo $row['Age'];?></td>
                <td><?php echo $row['Date'];?></td>
                <td><?php echo $row['BloodGroup'];?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
    <?php 
      include('header.php'); 
    ?>

  </head>
  <body>
    
    <div class="main">
      <!-- MAIN CONTENT -->
      <div class="main-content">
        <div class="container-fluid">
          <h2>Hello,  <span style="color: blue"> </span> Search Here. </h2> <br />
          
          <form action="FindBloodBank.php" method="POST">
            
            <table>
              
              <tr>
                <td>Division
                  <select class="custom-select" name="address">
                    <option value="" selected>Choose...</option>
                    <?php
                    include('connection.php');
                    $result = mysqli_query($connection,"select DISTINCT Address from bloodbank");
                    while($row = mysqli_fetch_array($result )) {
                    ?>
                    <option value="<?php echo $row['Address'];?>"><?php echo $row['Address'];?></option>
                    <?php }
                    ?>
                    
                    
                  </select>
                </td>
                <td><input type="submit" value="Search"></td>
              </tr>
            </table>
          </form>
          <br><br><hr>
          <table class="table table-bordered" id="members">
            <thead>
              <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include('connection.php');
              $result = mysqli_query($connection,"select *  from bloodbank");
              $address = $_POST['address'];
              while($row = mysqli_fetch_array($result )) {
                
              if( $row['Address'] ==  $address)
              {
              ?>
              <tr>
                <td><?php echo $row['Name'];?></td>
                <td><?php echo $row['Phone'];?></td>
                <td><?php echo $row['Address'];?></td>
            
              </tr>
            <?php } } ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
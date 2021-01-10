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
    <?php include('bloodbankCRUD.php'); ?>
    <div class="main">
      <!-- MAIN CONTENT -->
      <div class="main-content">
        <div class="container-fluid">
          <h2>Hello,  <span style="color: blue"> </span> Manage Blood Bank Here. </h2> <br />
          <p></p> <br />
          <table class="table table-bordered" id="bloodbank">
            <thead>
              <tr>
                <th>Blood Bank ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Blood Bag Quantity</th>
                <th>Address</th>
                <th>Action</th>
                
              </tr>
            </thead>
            <tbody>
              <?php
              include('connection.php');
              $result = mysqli_query($connection,"CALL `viewBloodBankInfo`()");
              while($row = mysqli_fetch_array($result )) {
              ?>
              <tr>
                <td><?php echo $row['serial'];?></td>
                <td><?php echo $row['Name'];?></td>
                <td><?php echo $row['Phone'];?></td>
                 <td><?php echo $row['BBQ'];?></td>
                <td><?php echo $row['Address'];?></td>
                <td> <a href="bloodBank.php?edit=<?php echo $row['serial']; ?>" class="btn btn-success">Edit</a>
                <a href="bloodbankCRUD.php?delete=<?php echo $row['serial']; ?>"   class="btn btn-danger">Delete</a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          <div class="content">
            <form class="form-auth-small" action="bloodbankCRUD.php" method="post">
              <input type="hidden" name="id"  value="<?php echo $id; ?>">
              <div class="form-group">
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $name ?>" placeholder="Enter full name" required="">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $phone ?>" placeholder="Enter phone number" required="">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="bbq" id="bbq" value="<?php echo $bbq ?>" placeholder="Enter phone number" required="">
              </div>
              
              <div class="form-group">
                <input type="text" class="form-control" name="address" id="address" value="<?php echo $address ?>" placeholder="Enter Address" required="">
              </div>
              
              <div class="form-group row">
                <div class="col-sm-10">
                  <?php  if($update == true): ?>
                  <button type="submit" class="btn btn-info" name="update">UPDATE</button>
                  <?php else: ?>
                  <button type="submit" class="btn btn-primary" name="save">SAVE</button>
                  <?php endif;  ?>
                </div>
              </div><br><br>
               
              </div>
            </form>
            <form class="form-auth-small" action="bloodbankCRUD.php" method="post">
                <div class="form-group">
                <input type="text" class="form-control" name="frbb" id="rbb" placeholder="Enter From Blood Bank ID" required="">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="trbb" id="rbb" placeholder="Enter To Blood Bank ID" required="">
              </div>
               <div class="form-group">
                <input type="text" class="form-control" name="qbb" id="qbb" placeholder="Enter Blood Bag Quantity" required="">
              </div>
              <div class="form-group row">
                <div class="col-sm-10">
                 
                  <button type="submit" class="btn btn-primary" name="send">Send Blood Bag</button>
                 
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
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
          
          <form action="searchDivision.php" method="POST">
            
            <table>
              
              <tr>
                <td>Division
                  <select class="custom-select" name="division">
                    <option value="" selected>Choose...</option>
                    <?php
                    include('connection.php');
                    $result = mysqli_query($connection,"select * from Division");
                    while($row = mysqli_fetch_array($result )) {
                    ?>
                    <option value="<?php echo $row['Name'];?>"><?php echo $row['Name'];?></option>
                    <?php }
                    ?>
                    
                    
                  </select>
                </td>
                <td>
                  Blood Group
                  <select class="custom-select" name="bloodgroup">
                    <option value="" selected>Choose...</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O-">O-</option>
                    <option value="O+">O+</option>
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
                <th>Age</th>
                <th>Date</th>
                <th>Blood Group</th>
                
              </tr>
            </thead>
            <tbody>
              <?php
              include('connection.php');
              $result = mysqli_query($connection,"select * from member_info");

              $division = $_POST['division'];
              $bloodgroup = $_POST['bloodgroup'];
              while($row = mysqli_fetch_array($result )) {
              
              if( $row['Division'] == $division  and  $row['BloodGroup'] ==  $bloodgroup)
              {
              ?>
              <tr>
                <td><?php echo $row['Name'];?></td>
                <td><?php echo $row['Phone'];?></td>
                <td><?php echo $row['Age'];?></td>
                <td><?php echo $row['Date'];?></td>
                <td><?php echo $row['BloodGroup'];?></td>
              </tr>
              
              <?php }
              elseif($row['Division'] == $division)
              {
              ?>
              <tr>
                <td><?php echo $row['Name'];?></td>
                <td><?php echo $row['Phone'];?></td>
                <td><?php echo $row['Age'];?></td>
                <td><?php echo $row['Date'];?></td>
                <td><?php echo $row['BloodGroup'];?></td>
              </tr>
              <?php }
              elseif($row['BloodGroup'] ==  $bloodgroup)
              {
              ?>
              <tr>
                <td><?php echo $row['Name'];?></td>
                <td><?php echo $row['Phone'];?></td>
                <td><?php echo $row['Age'];?></td>
                <td><?php echo $row['Date'];?></td>
                <td><?php echo $row['BloodGroup'];?></td>
              </tr>
              <?php } } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
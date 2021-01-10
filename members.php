<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php include('header.php'); ?>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Bootstrap JS -->
        <script src="js/bootstrap.min.js"></script>
        <title>Hello, world!</title>
    </head>
    <body>
        <?php include('membersCRUD.php'); ?>
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <h2>Hello,  <span style="color: blue"> </span> Manage Members Here. </h2> <br />
                    <table class="table table-bordered" id="members">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Age</th>
                                <th>Date</th>
                                <th>Blood Group</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('connection.php');
                            $result = mysqli_query($connection,"CALL `viewMemberInfo`()");
                            while($row = mysqli_fetch_array($result )) {
                            ?>
                            <tr>
                                <td><?php echo $row['Name'];?></td>
                                <td><?php echo $row['Phone'];?></td>
                                <td><?php echo $row['Age'];?></td>
                                <td><?php echo $row['Date'];?></td>
                                <td><?php echo $row['BloodGroup'];?></td>
                                <td> <a href="members.php?edit=<?php echo $row['serial']; ?>" class="btn btn-success">Edit</a>
                                <a href="membersCRUD.php?delete=<?php echo $row['serial']; ?>"   class="btn btn-danger">Delete</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="content">
                        <form class="form-auth-small" action="membersCRUD.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name" value="<?php echo $name ?>" placeholder="Enter full name" required="">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $phone ?>" placeholder="Enter phone number" required="">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="age" id="age" value="<?php echo $age ?>" placeholder="Enter Age" required="">
                            </div>
                            <div class="form-group">
                                Last Blood Donation Date<input type="date" class="form-control" name="date" id="date" value="<?php echo $date ?>" placeholder="Enter Last Blood Donation Date" required="">
                            </div>
                            <div class="form-group">
                                Blood Group
                                <select class="custom-select" name="bloodgroup">
                                    <option selected><?php echo $bloodgroup ?> </option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O-">O-</option>
                                    <option value="O+">O+</option>
                                </select>
                            </div>
                            <div class="form-group">
                                Division
                                <select class="custom-select" name="division" >
                                    <option  selected><?php echo $division ?></option>
                                    <?php
                                    include('connection.php');
                                    $result = mysqli_query($connection,"select * from Division");
                                    while($row = mysqli_fetch_array($result )) {
                                    ?>
                                    <option value="<?php echo $row['Name'];?>"><?php echo $row['Name'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                District
                                <select class="custom-select" name="district">
                                    <option selected><?php echo $district ?></option>
                                    <?php
                                    include('connection.php');
                                    $result = mysqli_query($connection,"select * from District");
                                    while($row = mysqli_fetch_array($result )) {
                                    ?>
                                    <option value="<?php echo $row['Name'];?>"><?php echo $row['Name'];?></option>
                                    <?php } ?>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" placeholder="Email" required="">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" value="<?php echo $password ?>" placeholder="Password" required="">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <?php  if($update == true): ?>
                                    <button type="submit" class="btn btn-info" name="update">UPDATE</button>
                                    <?php else: ?>
                                    <button type="submit" class="btn btn-primary" name="save">SAVE</button>
                                    <?php endif;  ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
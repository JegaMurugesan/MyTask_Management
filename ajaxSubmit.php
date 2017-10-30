<?php
 
 $host = "localhost";
 $user = "root";
 $pass = "admin";
 $dbname = "testdba";
 
 // try{
  
  // $con = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
  // $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
 // }catch(PDOException $ex){
  
  // die($ex->getMessage());
 // }
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$query = "insert into users(name, email, mobile) values ('$name', '$email', '$mobile')";
//$stmt = $con->prepare( $query );
//$stmt->execute();
?>
<table class="table table-bordered table-condensed table-hover table-striped">
    <tr>
        <td colspan="3">
            <div class="alert alert-info">
                <strong>Success</strong>, Form Submitted Successfully...
            </div>
        </td>
    </tr>     
    <tr>
        <th>#ID</th>
        <th>Name</th>
        <th>Email</th>
    </tr>      
   <?php
   $query = "SELECT id, name, email FROM users";
   $stmt = $con->prepare( $query );
   $stmt->execute();
   while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
    extract($row);
    ?>
                <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $email; ?></td>
                </tr>
                <?php
   }
   ?>      
</table>
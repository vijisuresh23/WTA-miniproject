<?php
session_start();
$db = mysqli_connect('localhost', 'root', '','fm');
if(mysqli_connect_errno()){                            //to check if the connection to server is done
    echo "Falied to connect". mysqli_connect_error();
}
  // REGISTER FARMER
  if (isset($_POST['reg_farmer'])) {
    // receive all input values from the form
    $kissancardno = mysqli_real_escape_string($db, $_POST['username']);
    $firstname = mysqli_real_escape_string($db, $_POST['fname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lname']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password']);
    $password_2 = mysqli_real_escape_string($db, $_POST['cpass']);
    $district = mysqli_real_escape_string($db, $_POST['district']);
    $state = mysqli_real_escape_string($db, $_POST['state']);
    $phoneNumber=mysqli_real_escape_string($db, $_POST['phoneNumber']);
    $postalCode=mysqli_real_escape_string($db, $_POST['postalCode']);


    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM fam_registration WHERE KCN='$kissancardno' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
      if ($user['KCN'] === $kissancardno) {
 echo '<script>alert("User already exists!!");</script>';
 }
    }
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
        $query = "INSERT INTO fam_registration (KCN,Fname,Lname,Password,District,State,PhoneNum,PostalCode)
                  VALUES('$kissancardno', '$firstname', '$lastname','$password','$district','$state','$phoneNumber','$postalCode')";
        mysqli_query($db, $query);
$_SESSION['username'] = $kissancardno;
$_SESSION['firstname'] = $firstname;
header('location: index.php');
}

}
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $adharCard = mysqli_real_escape_string($db, $_POST['username']);
    $orgName = mysqli_real_escape_string($db, $_POST['orgName']);
    $orgOwner = mysqli_real_escape_string($db, $_POST['oName']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password']);
    $password_2 = mysqli_real_escape_string($db, $_POST['cpass']);
    $orgType = mysqli_real_escape_string($db, $_POST['orgType']);
    $district = mysqli_real_escape_string($db, $_POST['district']);
    $state = mysqli_real_escape_string($db, $_POST['state']);
    $phoneNumber=mysqli_real_escape_string($db, $_POST['phoneNumber']);
    $postalCode=mysqli_real_escape_string($db, $_POST['postalCode']);


    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM buyer_registration WHERE ACN='$adharCard' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
    if ($user['ACN'] === $adharCard) {

    echo '<script>
    alert("User already exists!!");
    </script>';

    }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database
    $query = "INSERT INTO buyer_registration (ACN,OrgName,Owner,OrgType,Password,District,State,PhoneNum,PostalCode)
    VALUES('$adharCard', '$orgName', '$orgOwner','$orgType','$password','$district','$state','$phoneNumber','$postalCode')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: index.php');
    }
    }

if (isset($_POST['login_user'])) {
    $category = dataFilter($_POST['category']);
$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, $_POST['password']);

if($category == 1){
$password = md5($password);
$query = "SELECT * FROM fam_registration WHERE KCN='$username' AND Password='$password'";
$results = mysqli_query($db, $query);
$num_rows=mysqli_num_rows($results);
if ($num_rows == 1) {
$_SESSION['username'] = $username;
$_SESSION['success'] = "You are now logged in";
header('location: fhome.php');
}
else {?>
<script>
alert(" wrong Login credentials!!");
</script>
<?php
    }
}
else if($category == 2){
$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$results = mysqli_query($db, $query);
$num_rows=mysqli_num_rows($results);
if ($num_rows == 1) {
$_SESSION['username'] = $username;
$_SESSION['success'] = "You are now logged in";
header('location: adminHome.php');
}
else {?>
<script>
alert(" wrong Login credentials!!");
</script>
<?php
    }
}
else{
    $password = md5($password);
    $query = "SELECT * FROM buyer_registration WHERE ACN='$username' AND Password='$password'";
$results = mysqli_query($db, $query);
$num_rows=mysqli_num_rows($results);
if ($num_rows == 1) {
$_SESSION['username'] = $username;
$_SESSION['success'] = "You are now logged in";
header('location: bhome.php');
}
else {?>
<script>
alert(" wrong Login credentials!!");
</script>
<?php
    }

}
}
?>


<?php
// REGISTER BUYER



function dataFilter($data)
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>

<?php
   if (isset($_POST['add_bank'])) {
    // receive all input values from the form
    $name = mysqli_real_escape_string($db, $_POST['Aname']);
    $number = mysqli_real_escape_string($db, $_POST['Anumber']);
    $ifsc = mysqli_real_escape_string($db, $_POST['ifsc']);
    $bname = mysqli_real_escape_string($db, $_POST['Bname']);
    $brname = mysqli_real_escape_string($db, $_POST['Brname']);
    $kcn=$_SESSION['username'];

    $user_check_query = "SELECT * FROM bank_details WHERE KCN=".$_SESSION["username"]." LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    if ($user) { // if user exists
        if ($user['KCN'] === $kcn) {?>
<script>
alert("Details already added");
</script>;
<?php
   }
      }
      // Finally, register user if there are no errors in the form
      else{
          $query = "INSERT INTO bank_details (`id`, `KCN`, `name`, `number`, `ifsc`, `branch`, `Bank_name`)
                    VALUES(NULL,$kcn,'$name','$number','$ifsc','$brname','$bname')";
          mysqli_query($db, $query);


        ?>
<script>
alert("Deatils saved!!");
</script>
<?php
      }
}
?>

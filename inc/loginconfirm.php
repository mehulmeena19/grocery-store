<?php


//if(isset($_POST['login'])){

//$uname = $_POST['usrname'];
//$pwd=md5($_POST['password2']);
include 'assets/dbconnect.php';
//$uname=mysqli_real_escape_string($connection, $uname);
//$query = "SELECT * FROM user WHERE username='{$uname}' and password = '{$pwd}'";
//$select_user_query = mysqli_query($connection, $query);

if(isset($_POST['login'])){
    $_SESSION['logged_in']='False';
     $uname = $_POST['usrname'];
       $password = $_POST['password2'];
     $queryresult = mysqli_query($connection,"select * from user where username = '{$uname}' and password = '{$password}';");
       // confirm_query($queryresult);
      if (mysqli_num_rows($queryresult) == 1) {
        // username/password auth               enticated
                // and only 1 match
          $found_user = mysqli_fetch_array($queryresult);
          $_SESSION['username'] = $found_user['username'];
          $_SESSION['id']=$found_user['id'];
          $_SESSION['logged_in']= 'True';
          header("Location:index.php");
          redirect_to("cart.php?link=null");
      }
      else{
            $message = "Username/password combination incorrect.<br />
                    Please make sure your caps lock key is off and try again.";
                       //redirect_to("home.php");
            $_SESSION['logged_in']='False';
            header("Location:home.php");
           }
       }
?>
<!--/*if (!$select_user_query) {
DIE("QUERY FAILED". mysqli_error($connection));
}
$row = mysqli_fetch_array($select_user_query);

$user_id = $row['id'];
$user_name=$row['username'];
$user_email = $row['email'];
$user_password = $row['password'];
//$user_firstname= $row['firstname'];
//$user_lastname= $row['lastname'];
$user_address= $row['address'];
//$user_city= $row['city'];
//$user_country= $row['country'];
//$user_role = $row['role'];


if (mysqli_num_rows($select_user_query) == 0) {           //if ($uname !== $user_name && $pwd !== $user_password)
echo "<div class='center-align meh'>
  <h5 class='red-text'>Wrong Info</h5>
</div>";
echo $uname;
echo $user_name;
//echo $pwd;
//echo $user_password;
}



else{
   
    $_SESSION['id'] = $user_id;
    $_SESSION['name'] = $user_name;
    //$_SESSION['lastname'] = $user_lastname;
    $_SESSION['address'] = $user_address;
    //$_SESSION['city'] = $user_city;
    //$_SESSION['country'] = $user_country;
    $_SESSION['email'] = $user_email;
    $_SESSION['logged_in']= 'True';
    $back = $_SERVER['HTTP_REFERER'];
    echo '<meta http-equiv="refresh" content="0;url=' . $back . '">';
    header("location: index.php");
 }
}

?>*/-->

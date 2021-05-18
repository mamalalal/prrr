

<?php
session_start();
$emailErr = "";
$hesloErr = "";
if (isset($_POST['registrovat']))
{
    if (empty($_POST["email"])) {
        $nameErr = "Email je povinný";
    } 

    if (empty($_POST["heslo"])) {
        $hesloErr = "Heslo je povinné";
    } 
}

?>


<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="Menu.php">Recepty</a></li>
      <li><a href="PridaniReceptu.php">Přídání receptu</a></li>
     
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="Registrace.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> 
      
    </ul>
  </div>
</nav>





<html>

<form action="Prihlaseni.php" method="post">
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" name="email" class="form-control" id="email">
    <span class="error"> <?php echo $emailErr;?></span>
  </div>
  <div class="form-group">
    <label for="pwd">Heslo:</label>
    <input type="password" class="form-control" id="pwd" name="heslo">
    <span class="error"> <?php echo $hesloErr;?></span>
  </div>
  <button type="submit" class="btn btn-default" name="prihlasit">Přihlásit</button>
</form>

</html>

<?php

if (isset($_POST['prihlasit']))
{
    $email = $_POST['email'];
    $heslo = $_POST['heslo'];

    if($email != "" && $heslo != "")
    {

        $db = mysqli_connect("localhost","root","","receptar");
        $sql = "SELECT * FROM uzivatele WHERE email = '$email' AND heslo = '$heslo'";
        $result = mysqli_query($db,$sql);
        
        if (mysqli_num_rows($result) == 1) {
            
            
                echo "přihlášen";
                $_SESSION['username'] = $email;
                $_SESSION['prihlasen'] = "Odhlásit";
                $_SESSION['success'] = "You are now logged in";
                header('location: menu.php');  
             
        }
        else
        {

            die("Špatná kombinace");
        }

       

    }else
    {
        
        
    }

    

}
?>


</html>
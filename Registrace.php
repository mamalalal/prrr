<?php include('server.php') ?>

<?php
$emailErr = "";
$hesloErr = "";
$heslo2Err = "";
if (isset($_POST['registrovat']))
{
    if (empty($_POST["email"])) {
        $nameErr = "Email je povinný";
    } 

    if (empty($_POST["heslo"])) {
        $hesloErr = "Heslo je povinné";
    } 

    $heslo = $_POST['heslo'];
    $HesloPodruhe = $_POST['heslo2'];
    if ($heslo != $HesloPodruhe) {  
        $heslo2Err = "Hesla se neschodují";
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
      
      <li><a href="Prihlaseni.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>





<html>

<form action="Registrace.php" method="post">
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
  <div class="form-group">
    <label for="pwd">Heslo znovu:</label>
    <input type="password" class="form-control" id="pwd2" name="heslo2">
    <span class="error"> <?php echo $heslo2Err;?></span>
  </div>
  <button type="submit" class="btn btn-default" name="registrovat">Zaregistrovat</button>
</form>

</html>

<?php

if (isset($_POST['registrovat']))
{
    $email = $_POST['email'];
    $heslo = $_POST['heslo'];
    $HesloPodruhe = $_POST['heslo2'];

    if($email != "" && $heslo == $HesloPodruhe && $heslo != "")
    {

        $db = mysqli_connect("localhost","root","","receptar");
        $sql = "SELECT id, email, heslo FROM uzivatele";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              if($row["email"] == $email)
              {

                die("Zadaný email již existuje.");
              }
            }
        }

        $sql = "INSERT INTO Uzivatele (email, heslo)
        VALUES ('$email', '$heslo')";

    }else
    {
        
        
    }

    if ($db->query($sql) === TRUE) {
        echo "New record created successfully";
    }

}
?>


</html>
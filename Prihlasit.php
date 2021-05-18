
<?php
session_Start();
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="Menu.php">Menu</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li><a href=''><span class='glyphicon glyphicon-user'></span> Registrovat </a></li>
    </ul>
  </div>
</nav>

<form method="post">
<div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Heslo</label>
    <input type="password" name="heslo" class="form-control" id="exampleInputPassword1" placeholder="Heslo">
  </div>
  <button type="submit" name="prihlasit" class="btn btn-primary">Prihlasit</button>
</form>

<?php

if(isset($_POST['prihlasit']))
{
$heslo = $_POST['heslo'];
$email = $_POST['email'];



$db = mysqli_connect("localhost","root","","spravazamestnancumo");
$sql = "SELECT email,heslo,role FROM uzivatele";


$result = $db->query($sql);

if ($result->num_rows > 0) 
{

    while($row = $result->fetch_assoc()) 
    {
        if($row['email'] == $email && $heslo == $row['heslo'])
        {
            $_SESSION['name']=$email;
            $_SESSION['role'] = $row['role'];
            echo "Byl jste přihlášen";
            
            header('Location: Menu.php');
        }else
        {
            
        }
        
    }
}else
{
  
                echo "Není zde žádný účet";
            
}


}
?>

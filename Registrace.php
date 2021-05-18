
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
      <li><a href="Prihlasit.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

<form method="post">
<div class="form-group">
    <label for="exampleInputEmail1">Jméno</label>
    <input type="text" name="jmeno" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jméno">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Přijmení</label>
    <input type="text" name="prijmeni" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Přijmení">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Heslo</label>
    <input type="password" name="heslo" class="form-control" id="exampleInputPassword1" placeholder="Heslo">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Kontrola hesla</label>
    <input type="password" name="hesloznovu" class="form-control" id="exampleInputPassword1" placeholder="Kontrola hesla">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Název firmy</label>
    <input type="text" name="nazevfirmy" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Název firmy">
  </div>
  <button type="submit" name="registrovat" class="btn btn-primary">Registrovat</button>
</form>

<?php

if(isset($_POST['registrovat']))
{
    
    $jmeno = $_POST['jmeno'];
    
    $prijmeni = $_POST['prijmeni'];
    
    $heslo = $_POST['heslo'];
    $hesloznovu = $_POST['hesloznovu'];
    $email = $_POST['email'];
    $nazevfirmy = $_POST['nazevfirmy'];
   

    $db = mysqli_connect("localhost","root","","spravazamestnancumo");
    $sql = "SELECT email FROM uzivatele";


    $result = $db->query($sql);

    if ($result->num_rows > 0) 
    {
 
        while($row = $result->fetch_assoc()) 
        {
            if($row['email'] == $email)
            {
                die("Zadaný email je již v databázi");
            }else
            {
                $sql = "INSERT INTO uzivatele (jmeno,prijmeni,heslo,kontrola,email,nazevfirmy,idoddeleni,role) VALUES ('$jmeno','$prijmeni','$heslo','$hesloznovu','$email','$nazevfirmy','1','1')";

                if (mysqli_query($db, $sql)) 
                {
                    echo "Byl jste registrován";
                    header('Location: Menu.php');
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($db);
                }
            }
            
        }
    }else
    {
        
        $sql = "INSERT INTO uzivatele (jmeno,prijmeni,heslo,kontrola,email,nazevfirmy,idoddeleni,role) VALUES ('$jmeno','$prijmeni','$heslo','$hesloznovu','$email','$nazevfirmy','1','1')";

                if (mysqli_query($db, $sql)) 
                {
                    echo "Byl jste registrován";
                    header('Location: Menu.php');
                } 
    }
$_SESSION['name']=$email;


}
?>
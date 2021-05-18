<?php
$emailErr = "";
$hesloErr = "";
$imagesrc = "";
$obtiznost = "";
?>








<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<?php 

  session_start(); 

 
  if (!empty ($_SESSION['prihlasen'])) {
  $out = '<li><a href="Odhlasit.php"><span class="glyphicon glyphicon-log-out"></span>Odhlásit</a></li>';
  $uzi = $_SESSION['username'];
  $singup = "";
  $oblibene =  '<li><a href="Oblibene.php">Oblíbené recepty</a></li>';
  $odlozene =  '<li><a href="Odlozene.php">Odložené recepty</a></li>';

  }
  else{
  	
    $uzi = "";
    $singup = ' <li><a href="Registrace.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
  	$out = '<li><a href="Prihlaseni.php"><span class="glyphicon glyphicon-log-out"></span>Přihlásit</a></li>';
    $oblibene = "";
    $odlozene = "";
  }
  
  
?>

<html>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" >Receptář prima nápadů</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="menu.php">Recepty</a></li>
      <li class="active"><a >Přídání receptu</a></li>
      <?php echo $oblibene ?>
      <?php echo $odlozene ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a><span></span> <?php echo $uzi  ?> </a></li> 
      <?php echo $singup ?>
      
      <?php echo $out ?>
    </ul>
  </div>
</nav>

</html>







<form action="PridaniReceptu.php" method="post">
  <div class="form-group">
    <label for="text">Název:</label>
    <input type="text" name="nazev" class="form-control" id="email">
    <span class="error"> <?php echo $emailErr;?></span>
  </div>
  <div class="form-group">
    <label for="pwd">Postup</label>
    <textarea class="form-control" name="postup" rows="4">
    </textarea>
    <span class="error"> <?php echo $hesloErr;?></span>
    </div>
    <div class="form-group">
    <label for="pwd">Obrázek</label>
    <input type="file" name="pic" accept="image/*">
  </div>
  <div class="form-group">
    <label for="number">Doba přípravy(Hodiny:Minuty)</label>
    <input type="time" name="delka" class="form-control" id="delka">
    <span class="error"> <?php echo $emailErr;?></span>
  </div>

    <label for="pwd">Náročnost</label>

  <div class="form-check">
  
  
    <input type="radio" name="MyRadio" value="Lehký" checked>Lehký<br>
    <input type="radio" name="MyRadio" value="Střední">Střední<br>
    <input type="radio" name="MyRadio" value="Těžký">Těžký<br>
    


    </div>

<br></br>
  <button type="submit" class="btn btn-default" name="pridat">Přidat</button>
</form>
</html>

<script>
function myFunction(browser) {
  document.getElementById("result").value = browser;
 
}
</script>

<?php

if (isset($_POST['pridat']))
{
    $nazev = $_POST['nazev'];
    $postup = $_POST['postup'];
    $imagesrc = $_POST['pic'];
    $imagesrcfinal = "Obrazky/" . $imagesrc;
    
    $cas = $_POST['delka'];
    $radioVal = $_POST["MyRadio"];

    $db = mysqli_connect("localhost","root","","receptar");
    
   
    
    $sql = "INSERT INTO recepty (nazev, postup,obrazek,dobapripravy,narocnost)
    VALUES ('$nazev', '$postup', '$imagesrcfinal' , '$cas' , '$radioVal')";

if ($db->query($sql) === TRUE) {
    echo "New record created successfully";
}

      
    
}else{echo "ejde";}


?>




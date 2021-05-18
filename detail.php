<?php
session_start(); 
$passedId = $_GET['id'];

?>

<html>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</html>

<?php 

  

 
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
      <li><a href="menu.php">Recepty</a></li>
      <li><a href="PridaniReceptu.php">Přídání receptu</a></li>
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
</div>





<?php

        $db = mysqli_connect("localhost","root","","receptar");
        $sql = "SELECT * FROM recepty WHERE id = '$passedId'";

        $result = $db->query($sql);
        while($row = $result->fetch_assoc()) {
            $nazev = $row['nazev'];
            $obrazek = $row['obrazek'];
            $postup = $row['postup'];
            $dobatrvani = $row['dobapripravy'];
            $narocnost = $row['narocnost'];

            echo '<div> <h1>' . $nazev .'</h1></div>';
            echo '<img src="' . $obrazek . '" height = 400; width = 600>';
            echo '<div class = "div1"> <h3> Postup: ' . $postup .'</h3></div>';
            echo '<div> <h3>Dobra trvání (Hodiny:Minuty): ' . $dobatrvani .'</h3></div>';
            echo '<div> <h3>Náročnost: ' . $narocnost .'</h3></div>';
            
            

        }

        

?>

<form  method="post">
<button type="submit" class="btn btn-default" name="oblibene">Přidat do oblíbených</button>
<button type="submit" class="btn btn-default" name="odlozene">Přidat do odložených receptů</button>
    </form>

<?php

if (isset($_POST['oblibene']))
{


    $db = mysqli_connect("localhost","root","","receptar");
        $sql = "SELECT * FROM recepty WHERE id = '$passedId'";

        $result = $db->query($sql);
        while($row = $result->fetch_assoc()) {
            $nazev = $row['nazev'];
            $obrazek = $row['obrazek'];
            $postup = $row['postup'];
            $dobatrvani = $row['dobapripravy'];
            $narocnost = $row['narocnost'];

        }

        $sql = "SELECT * FROM oblibene ";
        $result = $db->query($sql);
        while($row = $result->fetch_assoc()) {
            if($row["id"] == $passedId)
            {

              die("Již je v oblíbených");
            }

        }


    $sql = "INSERT INTO oblibene (id,nazev, postup,obrazek,dobapripravy,narocnost)
    VALUES ('$passedId','$nazev', '$postup', '$obrazek' , '$dobatrvani' , '$narocnost')";

    
           
    

    if ($db->query($sql) === TRUE) {
        echo "New record created successfully";
    }
}

    if (isset($_POST['odlozene']))
    {
    echo "ahoj";
    
        $db = mysqli_connect("localhost","root","","receptar");
            $sql = "SELECT * FROM recepty WHERE id = '$passedId'";
    
            $result = $db->query($sql);
            while($row = $result->fetch_assoc()) {
                $nazev = $row['nazev'];
                $obrazek = $row['obrazek'];
                $postup = $row['postup'];
                $dobatrvani = $row['dobapripravy'];
                $narocnost = $row['narocnost'];
    
            }
    
            $sql = "SELECT * FROM odlozene ";
            $result = $db->query($sql);
            while($row = $result->fetch_assoc()) {
                if($row["id"] == $passedId)
                {
    
                  die("Již je v odložených");
                }
    
            }
    
    
        $sql = "INSERT INTO odlozene (id,nazev, postup,obrazek,dobapripravy,narocnost)
        VALUES ('$passedId','$nazev', '$postup', '$obrazek' , '$dobatrvani' , '$narocnost')";
    
        
               
        
    
        if ($db->query($sql) === TRUE) {
            echo "přidano do odlozenych";
        }
    }


    ?>
    </html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<?php 

  session_start(); 

 
  if (!empty ($_SESSION['prihlasen'])) {
  $out = '<li><a href="Odhlasit.php"><span class="glyphicon glyphicon-log-out"></span>Odhlásit</a></li>';
  $uzi = $_SESSION['username'];
  $singup = "";
  $oblibene =  '<li class="active"><a href="Oblibene.php">Oblíbené recepty</a></li>';
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

<style>
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 800px;
  display: block;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}
div.nazev {
    font-size: 25px;
  padding: 15px;
  text-align: center;
  width : 800px;
  word-wrap: break-word;
}

div.desc {
    
  padding: 15px;
  text-align: center;
  width : 800px;
  word-wrap: break-word;
}
</style>

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
        $sql = "SELECT * FROM oblibene";
        $result = mysqli_query($db,$sql);

        while($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $nazev = $row["nazev"];
            $cas = $row["dobapripravy"];
            $obrazek = $row["obrazek"];
            $narocnost = $row["narocnost"];
            
            echo '<div class="gallery"  id='. $id . ' onclick= CheckId(this.id)>';
            //nazev
            echo '<div class="nazev" >' . $nazev . '</div>';
            //a
            
            //a2
            
            //div
            
            //img
            echo '<img src="'. $obrazek .'" alt="" width="600" height="400" >';
            //divpopisek
            echo '<div class="desc">Obtížnost: ' . $narocnost . '</div>';
            //2
            echo '<div class="desc"> Doba přípravy(Hodiny:Minuty): ' . $cas . '</div>';
            //div2
            echo '</div>';
            
          
           
        }
        
        
        
        

?>

<script>
  
function CheckId(id){
    
    
    location.href = "detail.php?id="+id;
    
    
    
};
</script>
</html>
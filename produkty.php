<?php
$idkat = $_GET['id'];
?>

<head>
<style>
div.gallery
{
float:left;
border: 1px solid #ccc;

}


div.desc {
  width:300px;
  padding: 10px;
  text-align: center;
  font-size:16px;
  word-wrap: break-word
  

}
div.popis {
  width:300px;
  padding: 10px;
  text-align: center;
  font-size:14px;
  word-wrap: break-word

}

div.cena {
  width:300px;
  padding: 10px;
  text-align: right;
  font-size:14px;
  word-wrap: break-word
  
}

p.podtrh
{

    text-decoration: underline;
}

</style>
</head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href=menu.php>Home</a></li>
      <li><a href="kategorie.php">Kategorie</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <a href="kosik.php"> 
    <i class="fa fa-shopping-cart" style="font-size:48px;color:white"></i>
    </a>
    </ul>
  </div>
</nav>


<?php


    $db = mysqli_connect("localhost","root","","eshopmo");
    $sql = "SELECT id,nazev,popis,cena,obrazek FROM produkt WHERE idkategorie='$idkat'";
    $result = $db->query($sql);
    while($row = $result->fetch_assoc())
    {
        $nazev = $row['nazev'];
        $obrazek = $row['obrazek'];
        $id = $row['id'];
        $popis = $row['popis'];
        $cena = $row['cena'];
        $cenabezdph = ($cena * 79)/100;
     
        echo "<div class='gallery'  id =' $id 'onclick='dalsistranka(this.id)'  > ";
        echo "<a target=_blank>";
        echo "<div class='desc'> <p class='podtrh'>$nazev </p></div>";
        echo "<img src=' $obrazek '  width=300 height=250>";
        echo "</a>";
        
        echo "<div class='popis'> $popis </div>";
        echo "<div class='cena'>Cena s DPH: $cena Kč </div>";
        echo "<div class='cena'>Cena bez DPH: $cenabezdph Kč </div>";
      echo "</div>";
      
    }


?>

<script>
function dalsistranka(id)
{
    
    location.href = "Produkt.php?id="+id;
}
</script>   


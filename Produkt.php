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

.produkt
{
    text-align : center;


}
.obrazek{

    display: block;
  margin-left: auto;
  margin-right: auto;
  text-align:center;

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
     
       echo "<h1 class='produkt'>$nazev</h1>;
       <hr width=50% text-align:center background-color:black height:5px>;
       <img class='obrazek' src=' $obrazek '  width=500 height=400>;
       <hr width=50% text-align:center background-color:black height:5px>;
       <h3 class='produkt'>$popis</h3>;
       <hr width=50% text-align:center background-color:black height:5px>;
       <h3 class='produkt'>Cena s DPH: $cena Kč</h3>;
       <h3 class='produkt'>Cena bez DPH: $cenabezdph Kč</h3>;

       ";
      
    }


?>

<form method="post" action="">
<button type="submit" class="obrazek" name="pridat">Přidat do košíku</button>
</form>




<?php
if(isset($_POST['pridat']))
{
    
    $db = mysqli_connect("localhost","root","","EshopMO");
   
    $sql = "SELECT id,pocet FROM kosik WHERE id='$idkat'";
    $result = $db->query($sql);
    if(mysqli_num_rows($result) > 0){
        while($row = $result->fetch_assoc())
    {
    
      
        $pocetvtabulce = $row['pocet'];
        $pocet = $pocetvtabulce + 1;
     
    }
       
}
else{
        $pocet = 1;
        
        $sql =  "INSERT into kosik (id,pocet) VALUES('$id','$pocet')";




        if($db->query($sql) === TRUE) {
    
            }
    }
    


    $celkovacena = $cena * $pocet;
    $sql =  "UPDATE kosik
    SET pocet=$pocet
    WHERE id=$idkat ";




    if($db->query($sql) === TRUE) {
    echo "přidáno do košíku";
    }

    
    $sql =  "UPDATE kosik
    SET cena=$celkovacena
    WHERE id=$idkat ";
    
    if($db->query($sql) === TRUE) {
        echo "přidáno do košíku";
        }

    
}


?>

<?php
echo "<a id='$idkat' class='obrazek' onclick='Zpet(this.id)' name='kosik'>Zpět</a>";
?>
<script>

function Zpet(id)
{
    location.href = "produkty.php?id="+id;
}
</script>

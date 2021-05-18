
<?php
$celkovacena= 0;
?>

<head>
<style>
div.gallery
{

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
    <a href="stranka.php"> 
    <i class="fa fa-shopping-cart" style="font-size:48px;color:white"></i>
    </a>
    </ul>
  </div>
</nav>


<?php
    $db = mysqli_connect("localhost","root","","eshopmo");
    
    


    
    $sql = "SELECT produkt.nazev, produkt.cena, kosik.id,kosik.pocet
    FROM produkt
    INNER JOIN kosik
    ON produkt.id=kosik.id;
    ";
    $result=mysqli_query($db,$sql);   
    
    while($row=mysqli_fetch_array($result))
    {


        $pocet = $row['pocet'];
        $nazev = $row['nazev'];
        //$obrazek = $row['obrazek'];
        $id = $row['id'];
        //$popis = $row['popis'];
        $cena = ($row['cena']) * $pocet;
        
        $cenabezdph = ($cena * 79)/100;

        $result2 = $db->query("SELECT COUNT(*) FROM `kosik` WHERE id = $id");
        $row2 = $result2->fetch_row();


        
            

         
        
     
       
      
    }



    if(isset($_POST['vic']))
    {
        $idcko = $_POST['vic'];
        echo $idcko;
        $db = mysqli_connect("localhost","root","","EshopMO");
        $sql = "SELECT id,pocet FROM kosik WHERE id='$idcko'";
        $result = $db->query($sql);

        while($row = $result->fetch_assoc())
        {
        
          
            $pocetvtabulce = $row['pocet'];
            $pocet = $pocetvtabulce + 1;
         
        }

        
        $sql =  "UPDATE kosik
        SET pocet=$pocet
        WHERE id=$idcko";

        if($db->query($sql) === TRUE) {
    
        }
        $sql = "SELECT produkt.nazev, produkt.cena, kosik.id,kosik.pocet
        FROM produkt
        INNER JOIN kosik
        ON produkt.id=kosik.id;
        ";
        $result=mysqli_query($db,$sql);   
    
    while($row=mysqli_fetch_array($result))
    {


        $pocet = $row['pocet'];
        $nazev = $row['nazev'];
        //$obrazek = $row['obrazek'];
        $id = $row['id'];
        //$popis = $row['popis'];
        $cena = ($row['cena']) * $pocet;
        $cenabezdph = ($cena * 79)/100;

        $result2 = $db->query("SELECT COUNT(*) FROM `kosik` WHERE id = $id");
        $row2 = $result2->fetch_row();


        
            echo "<h3 class='produkt'>$nazev | Cena s DPH: $cena Kč
            
            
            | Cena bez DPH: $cenabezdph Kč | Počet: $pocet Ks</h3>
            
     
            ";

            echo "<form method='post' action=''>
            <button type='submit' value='$id' class='obrazek' name='vic'>+</button>
            </form>";

            echo "<form method='post' action=''>
            <button type='submit' value='$id' class='obrazek' name='min'>-</button>
            </form>";
            
        
            $celkovacena = $celkovacena + $cena;
            $sql =  "UPDATE kosik
            SET cena=$cena
            WHERE id=$id ";
        
            
            if($db->query($sql) === TRUE) {
                echo "přidáno do košíku";
                }
       
      
        }
       
        
            echo "<h3 class='produkt'> Celková cena: $celkovacena Kč</h3>";

            echo "<form method='post' action='konec.php'>
            <button type='submit' class='obrazek' name='dokoncit'>Dokončit nákup</button>
            </form>";
    
    }else if(isset($_POST['min']))
    {
        $idcko = $_POST['min'];
        echo $idcko;
        $db = mysqli_connect("localhost","root","","EshopMO");
        $sql = "SELECT id,pocet FROM kosik WHERE id='$idcko'";
        $result = $db->query($sql);

        while($row = $result->fetch_assoc())
        {
        
          
            $pocetvtabulce = $row['pocet'];
            $pocet = $pocetvtabulce - 1;
         
        }

        
        $sql =  "UPDATE kosik
        SET pocet=$pocet
        WHERE id=$idcko";

        if($db->query($sql) === TRUE) 
        {
    
        }
        $sql = "SELECT produkt.nazev, produkt.cena, kosik.id,kosik.pocet
        FROM produkt
        INNER JOIN kosik
        ON produkt.id=kosik.id;
        ";
        $result=mysqli_query($db,$sql);   
    
    while($row=mysqli_fetch_array($result))
    {


        $pocet = $row['pocet'];
        $nazev = $row['nazev'];
        //$obrazek = $row['obrazek'];
        $id = $row['id'];
        //$popis = $row['popis'];
        $cena = ($row['cena']) * $pocet;
        
        $cenabezdph = ($cena * 79)/100;

        $result2 = $db->query("SELECT COUNT(*) FROM `kosik` WHERE id = $id");
        $row2 = $result2->fetch_row();


        
            echo "<h3 class='produkt'>$nazev | Cena s DPH: $cena Kč
            
            
            | Cena bez DPH: $cenabezdph Kč | Počet: $pocet Ks</h3>
            
     
            ";

            echo "<form method='post' action=''>
            <button type='submit' value='$id' class='obrazek' name='vic'>+</button>
            </form>";

            echo "<form method='post' action=''>
            <button type='submit' value='$id' class='obrazek' name='min'>-</button>
            </form>";
            
            
           
        
     
            $celkovacena = $celkovacena + $cena;
      
           
            $sql =  "UPDATE kosik
            SET cena=$cena
            WHERE id=$id ";
        
            
            if($db->query($sql) === TRUE) {
               
                }

    }
   
   
    echo "<h3 class='produkt'> Celková cena: $celkovacena Kč</h3>";
    echo "<form method='post' action='konec.php'>
    <button type='submit' class='obrazek' name='dokoncit'>Dokončit nákup</button>
    </form>";

    }else
    {
        $db = mysqli_connect("localhost","root","","eshopmo");
    
    


    
        $sql = "SELECT produkt.nazev, produkt.cena, kosik.id,kosik.pocet
        FROM produkt
        INNER JOIN kosik
        ON produkt.id=kosik.id;
        ";
        $result=mysqli_query($db,$sql);   
        
        while($row=mysqli_fetch_array($result))
        {
    
    
            $pocet = $row['pocet'];
            $nazev = $row['nazev'];
            //$obrazek = $row['obrazek'];
            $id = $row['id'];
            //$popis = $row['popis'];
            $cena = ($row['cena']) * $pocet;
            
            $cenabezdph = ($cena * 79)/100;
    
            $result2 = $db->query("SELECT COUNT(*) FROM `kosik` WHERE id = $id");
            $row2 = $result2->fetch_row();
    
    
            
                echo "<h3 class='produkt'>$nazev | Cena s DPH: $cena Kč
                
                
                | Cena bez DPH: $cenabezdph Kč | Počet: $pocet Ks</h3>
                
         
                ";
    
                echo "<form method='post' action=''>
                <button type='submit' value='$id' class='obrazek' name='vic'>+</button>
                </form>";
               
    
                echo "<form method='post' action=''>
                <button type='submit' value='$id' class='obrazek' name='min'>-</button>
                </form>";
    
                
                $celkovacena = $celkovacena + $cena;
         
           
                
                $sql =  "UPDATE kosik
                SET cena=$cena
                WHERE id=$id ";
            
                
                if($db->query($sql) === TRUE) {
                    
                    }
                
          
        }
       
       
        echo "<h3 class='produkt'> Celková cena: $celkovacena Kč</h3>";
        echo "<form method='post' action='konec.php'>
                <button type='submit' class='obrazek' name='dokoncit'>Dokončit nákup</button>
                </form>";
    }


    if(isset($_POST['dokoncit']))
    {
        
    }
    

   
    
    
            
     
         
               
    


?>






<?php
if(isset($_POST['pridat']))
{
    $db = mysqli_connect("localhost","root","","EshopMO");
    $sql =  "INSERT into kosik (id) VALUES('$id')";

    if($db->query($sql) === TRUE) {
    echo "New record created successfully";
    }

    
}


?>

<?php
//echo "<a id='$idkat' class='obrazek' onclick='Zpet(this.id)' name='kosik'>Zpět</a>";
?>
<script>

function Zpet(id)
{
    
}
</script>

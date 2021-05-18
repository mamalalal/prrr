<head>
    <style>
        div.barva
        {
            background-color:red;
            height:150px;
        }

       
       
    </style>
</head>

<?php
session_start();

if(!empty ($_SESSION['name']))
{
    $jmeno = "<li><a href=''><span class='glyphicon glyphicon-user'></span>"  .  $_SESSION['name'] . "</a></li>";
    $out = "<li><a href='Odhlásit.php'><span class='glyphicon glyphicon-log-out'></span> Odhlásit</a></li>";
    if($_SESSION['role'] == 2)
    {
        $oddeleni = "<li><a href='Oddeleni.php'>Úprava oddělení</a></li>";
    }else
    {
        $oddeleni = "";
    }
}else
{
    
    $jmeno = "<li><a href='Registrace.php'><span class='glyphicon glyphicon-user'></span> Registrovat </a></li>";
    $out = "<li><a href='Prihlasit.php'><span class='glyphicon glyphicon-log-in'></span> Přihlásit</a></li>";
}

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="menu.php">Home</a></li>
      <?php echo $oddeleni ?>;
      <li class="active"><a>Správa oddělení</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php echo $jmeno ?>;
      <?php echo $out ?>;
      
    </ul>
  </div>
</nav>



<?php
    $db = mysqli_connect("localhost","root","","spravazamestnancumo");
   


    if(isset($_POST['smazat']))
    {
        $id = $_POST['smazat'];
      
        $sql = "DELETE FROM uzivatele WHERE id='$id'";
        if ($db->query($sql) === TRUE) {
            echo "smazano";
         }


          $sql = "SELECT id,jmeno,prijmeni,datum FROM uzivatele";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
           
            $jmeno = $row['jmeno'];
            $prijmeni = $row['prijmeni'];
           $datum = $row['datum'];
            
            echo '<form method="post">
            <div style=" height:150px; ">
              <div class="form-row">
            
              <div class="form-group col-md-2">
              <label for="inputZip">Zkratka</label>
              <input type="text" name="zkratka" class="form-control" id="inputZip" value="' . $jmeno . '" readonly>
            </div>
            <div class="form-group col-md-2">
            <label for="inputZip">Zkratka</label>
            <input type="text" name="zkratka" class="form-control" id="inputZip" value="' . $prijmeni . '" readonly>
          </div>
            <div class="form-group col-md-2">
            <label for="inputZip">Zkratka</label>
            <input type="text" name="zkratka" class="form-control" id="inputZip" value="' . $datum . '" readonly>
          </div>
              
                <div class="form-group col-md-6">
                    <br>
                    <button type="submit" name="upravit" class="btn btn-primary" value="'. $id .'">Upravit</button>
                        <button type="submit" name="smazat" class="btn btn-primary" value="'. $id .'">Smazat</button>
                        <button type="submit" name="detail" class="btn btn-primary" value="'. $id .'">Detail</button>
                </div>
          
            
               </div>
            </div>
            </form>';
        }

    }


    }else if(isset($_POST['upravit']))
    {
        $id = $_POST['upravit'];
        header( "Location: upravitzamestnance.php?id={$id}" );

    }else if(isset($_POST['detail']))
    {
        $id = $_POST['detail'];
        header( "Location: detailzamestnance.php?id={$id}");
    }else
    {
        
          $sql = "SELECT id,jmeno,prijmeni,datum FROM uzivatele";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
           
            $jmeno = $row['jmeno'];
            $prijmeni = $row['prijmeni'];
           $datum = $row['datum'];
           
            
            echo '<form method="post">
            <div style=" height:60px; ">
              <div class="form-row">
            
                
              <div class="form-group col-md-2">
              <label for="inputZip">Jméno</label>
              <input type="text" name="zkratka" class="form-control" id="inputZip" value="' . $jmeno . '" readonly>
            </div>
            <div class="form-group col-md-2">
            <label for="inputZip">Příjmení</label>
            <input type="text" name="zkratka" class="form-control" id="inputZip" value="' . $prijmeni . '" readonly>
          </div>
            <div class="form-group col-md-2">
            <label for="inputZip">Datum nástupu</label>
            <input type="text" name="zkratka" class="form-control" id="inputZip" value="' . $datum . '" readonly>
          </div>
              
               
            
              
                <div class="form-group col-md-6">
                    <br>
                    <button type="submit" name="upravit" class="btn btn-primary" value="'. $id .'">Upravit</button>
                        <button type="submit" name="smazat" class="btn btn-primary" value="'. $id .'">Smazat</button>
                        <button type="submit" name="detail" class="btn btn-primary" value="'. $id .'">Detail</button>
                </div>
          
            
               </div>
            </div>
            </form>';
        }
    
        }
    }

?>

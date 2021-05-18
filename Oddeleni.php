<head>
    <style>
        
    </style>
</head>

<?php
session_start();

if(!empty ($_SESSION['name']))
{
    $jmeno = "<li><a href=''><span  glyphicon-user'></span>"  .  $_SESSION['name'] . "</a></li>";
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
      <li class="active"><a href="#">Home</a></li>
      <?php echo $oddeleni ?>;
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php echo $jmeno ?>;
      <?php echo $out ?>;
      
    </ul>
  </div>
</nav>

<form method="post">
    <h2>Přidat oddělení</h2><div style='float: right; '> <button  type="submit" name="sprava" class="btn btn-primary">Správa oddělení</button></div><br>
<div class="form-group">
    <label for="exampleInputEmail1">Název oddělení</label>
    <input type="text" name="nazev" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Název">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Zkratka</label>
    <input type="text" name="zkratka" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Zkratka">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Barva</label><br>
  <input type="radio" id="male" name="gender" value="Green">
<label for="male">Zelená</label><br>
<input type="radio" id="female" name="gender" value="Blue">
<label for="female">Modrá</label><br>
<input type="radio" id="other" name="gender" value="Pink">
<label for="other">Růžová</label><br>
<input type="radio" id="other" name="gender" value="Purple">
<label for="other">Fialová</label>
</div>
  <div class="form-group">
    <label for="exampleInputPassword1">Město</label>
    <input type="mesto" name="mesto" class="form-control" id="exampleInputPassword1" placeholder="Město">
  </div>
  <button type="submit" name="pridat" class="btn btn-primary">Přidat</button>
</form>

<form method="post">
    <h2>Upravit oddělení</h2>
<div class="form-group">
    <label for="exampleInputEmail1">Zadejte název oddělení, které chcete upravit</label>
    <input type="text" name="nazev" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Název">
  </div>
  
  <button type="submit" name="vyhledat" class="btn btn-primary">Vyhledat</button>
</form>

<?php
if(isset($_POST['pridat']))
{
    $db = mysqli_connect("localhost","root","","spravazamestnancumo");
    $nazev = $_POST['nazev'];
    $zkratka = $_POST['zkratka'];
    if(empty($_POST['gender']))
    {
        
    }else
    {
        $barva = $_POST['gender'];
    }
    
    $mesto = $_POST['mesto'];



    $db = mysqli_connect("localhost","root","","spravazamestnancumo");
    $sql = "SELECT nazev FROM oddeleni";
    $result = $db->query($sql);
    
      
    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            if($row['nazev'] == $nazev)
            {
                die("Oddělení s tímto názvem již existuje");
            }
        }
    }else {
        echo "0 results";
      }



    if(empty($nazev) || empty($zkratka) || empty($barva) || empty($mesto))
    {
        echo "Není vyplněno vše";
    }else
    {  
        $sql = "INSERT INTO oddeleni (nazev,zkratka,barva,mesto) VALUES ('$nazev','$zkratka','$barva','$mesto')";
        if (mysqli_query($db, $sql)) {
            echo "Přidáno";
          } 
    }
    
}
$nazevoddeleni = "";
if(isset($_POST['vyhledat']))
{
    $nazevoddeleni = $_POST['nazev'];
    
    $db = mysqli_connect("localhost","root","","spravazamestnancumo");
    $sql = "SELECT id,nazev,zkratka,barva,mesto FROM oddeleni WHERE nazev='$nazevoddeleni'";
    $result = $db->query($sql);
    
      
    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
            echo "<label for='exampleInputEmail1'>Název oddělení</label><input class='form-control' type='text'  name='language' value=" . $row['nazev'] ." readonly>";
            echo "<label for='exampleInputEmail1'>Zkratka oddělení</label><input class='form-control' type='text'  name='language' value=" .$row['zkratka']. " readonly>";
            echo "<label for='exampleInputEmail1'>Barva oddělení</label><input class='form-control' type='text'  name='language' value=" . $row['barva'] ." readonly>";
            echo "<label for='exampleInputEmail1'>Město oddělení</label><input class='form-control' type='text'  name='language' value=" .$row['mesto']. " readonly>";
            echo "<form method='post'>
            <h3>Zadejte nové hodnoty</h3>
            <label for='exampleInputEmail1'>Nový název oddělení</label><input class='form-control' type='text'  name='novynazev' value=''>
            <label for='exampleInputEmail1'>Nová kratka oddělení</label><input class='form-control' type='text'  name='novazkratka' value=''>
            <div class='form-group'>
            <label for='exampleInputEmail1'>Barva</label><br>
            <input type='radio' id='male' name='gender' value='Green'>
            <label for='male'>Zelená</label><br>
            <input type='radio' id='female' name='gender' value='Blue'>
            <label for='female'>Modrá</label><br>
            <input type='radio' id='other' name='gender' value='Pink'>
            <label for='other'>Růžová</label><br>
            <input type='radio' id='other' name='gender' value='Purple'>
            <label for='other'>Fialová</label>
            </div>
            <label for='exampleInputEmail1'>Nové město oddělení</label><input class='form-control' type='text'  name='novemesto' value=''>;
            <br>
            <button type='submit' name='upravit' value= ' $id ' class='btn btn-primary'>Upravit</button>
            </form>";
            
        }
    }else {
        echo "V databázi není oddělení s tímto názvem";
      }
}else
{
   
}

if(isset($_POST['sprava']))
{
    
    header('location:sprava.php');
}
?>



<?php
if(isset($_POST['upravit']))
{
    $id = $_POST['upravit'];
    $db = mysqli_connect("localhost","root","","spravazamestnancumo");

    if(!empty($_POST['novynazev']))
    {
       $novynazev = $_POST['novynazev'];
        $sql = "UPDATE oddeleni SET nazev='$novynazev' WHERE id='$id'";
        if ($db->query($sql) === TRUE) 
        {
            echo "Record updated successfully";
        }else 
        {
            echo "Error updating record: " . $db->error;
        }
    }

    if(!empty($_POST['novazkratka']))
    {
        $zkratka = $_POST['novazkratka'];
        $sql = "UPDATE oddeleni SET zkratka='$zkratka' WHERE id='$id'";
        if ($db->query($sql) === TRUE) 
        {
            echo "Record updated successfully";
        }else 
        {
            echo "Error updating record: " . $db->error;
        }
    }

    if(!empty($_POST['gender']))
    {
        $barva = $_POST['gender'];
        $sql = "UPDATE oddeleni SET barva='$barva' WHERE id='$id'";
        if ($db->query($sql) === TRUE) 
        {
            echo "Record updated successfully";
        }else 
        {
            echo "Error updating record: " . $db->error;
        }
    }

    if(!empty($_POST['novemesto']))
    {
        $mesto = $_POST['novemesto'];
        $sql = "UPDATE oddeleni SET mesto='$mesto' WHERE id='$id'";
        if ($db->query($sql) === TRUE) 
        {
            echo "Record updated successfully";
        }else 
        {
            echo "Error updating record: " . $db->error;
        }
    }
}
?>
<?php
$idodd = $_GET['id'];

?>

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
    $id = $idodd;
    
    $db = mysqli_connect("localhost","root","","spravazamestnancumo");
    $sql = "SELECT id,jmeno,prijmeni,nazevfirmy,idoddeleni,role,datum FROM uzivatele WHERE id='$id'";
    $result = $db->query($sql);
    
      
    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
            
            echo "<label for='exampleInputEmail1'>Jméno</label><input class='form-control' type='text'  name='language' value=" . $row['jmeno'] ." readonly>";
            echo "<label for='exampleInputEmail1'>Příjmení</label><input class='form-control' type='text'  name='language' value=" .$row['prijmeni']. " readonly>";
            echo "<label for='exampleInputEmail1'>Název firmy</label><input class='form-control' type='text'  name='language' value=" . $row['nazevfirmy'] ." readonly>";
            echo "<label for='exampleInputEmail1'>Id oddělení</label><input class='form-control' type='text'  name='language' value=" .$row['idoddeleni']. " readonly>";
            echo "<label for='exampleInputEmail1'>Role</label><input class='form-control' type='text'  name='language' value=" .$row['role']. " readonly>";
            echo "<label for='exampleInputEmail1'>Datum přidání</label><input class='form-control' type='text'  name='language' value=" .$row['datum']. " readonly>";
            echo "<form method='post'>

            <h3>Zadejte nové hodnoty</h3>
            <label for='exampleInputEmail1'>Nové jméno</label><input class='form-control' type='text'  name='novejmeno' value=''>
            <label for='exampleInputEmail1'>Nové příjmení</label><input class='form-control' type='text'  name='noveprijmeni' value=''>
            <label for='exampleInputEmail1'>Nový název firmy</label><input class='form-control' type='text'  name='novynazevfirmy' value=''>
            <label for='exampleInputEmail1'>Nové ID oddělení</label><input class='form-control' type='number'  name='noveidoddeleni' value=''>
            <label for='exampleInputEmail1'>Nová role/label><input class='form-control' type='number'  name='novarole' value=''>
            <label for='exampleInputEmail1'>Nový datum</label><input class='form-control' type='date'  name='novydatum' value=''>
            <br>
            <button type='submit' name='upravit' value= ' $id ' class='btn btn-primary'>Upravit</button>
            </form>";
            
        }
    }else {
        echo "V databázi není oddělení s tímto názvem";
      }


      if(isset($_POST['upravit']))
{
    $id = $_POST['upravit'];
    
    $db = mysqli_connect("localhost","root","","spravazamestnancumo");

    if(!empty($_POST['novejmeno']))
    {
      
       $novynazev = $_POST['novejmeno'];
        $sql = "UPDATE uzivatele SET jmeno='$novynazev' WHERE id='$id'";
        if ($db->query($sql) === TRUE) 
        {
            echo "Record updated successfully";
            header('location:spravazamestnancu.php');
        }else 
        {
            echo "Error updating record: " . $db->error;
        }
    }

    if(!empty($_POST['noveprijmeni']))
    {
        $zkratka = $_POST['noveprijmeni'];
        $sql = "UPDATE uzivatele  SET prijmeni='$zkratka' WHERE id='$id'";
        if ($db->query($sql) === TRUE) 
        {
            echo "Record updated successfully";
            header('location:spravazamestnancu.php');
        }else 
        {
            echo "Error updating record: " . $db->error;
        }
    }

    if(!empty($_POST['novynazevfirmy']))
    {
        $barva = $_POST['novynazevfirmy'];
        $sql = "UPDATE uzivatele  SET nazevfirmy='$barva' WHERE id='$id'";
        if ($db->query($sql) === TRUE) 
        {
            echo "Record updated successfully";
            header('location:spravazamestnancu.php');
        }else 
        {
            echo "Error updating record: " . $db->error;
        }
    }

    if(!empty($_POST['noveidoddeleni']))
    {
        
        $mesto = $_POST['noveidoddeleni'];
        $sql = "UPDATE uzivatele  SET idoddeleni='$mesto' WHERE id='$id'";
        if ($db->query($sql) === TRUE) 
        {
            echo "Record updated successfully";
            header('location:spravazamestnancu.php');
        }else 
        {
            echo "Oddělení neexistuje";
        }
    }

    if(!empty($_POST['novarole']))
    {
        $mesto = $_POST['novarole'];
        $sql = "UPDATE uzivatele  SET role='$mesto' WHERE id='$id'";
        if ($db->query($sql) === TRUE) 
        {
            echo "Record updated successfully";
            header('location:spravazamestnancu.php');
        }else 
        {
            echo "Error updating record: " . $db->error;
        }
    }

    if(!empty($_POST['novydatum']))
    {
        $mesto = $_POST['novydatum'];
        $sql = "UPDATE uzivatele  SET datum='$mesto' WHERE id='$id'";
        if ($db->query($sql) === TRUE) 
        {
            echo "Record updated successfully";
            header('location:spravazamestnancu.php');
        }else 
        {
            echo "Error updating record: " . $db->error;
        }
    }

    header('location:spravazamestnancu.php');
    
}
?>
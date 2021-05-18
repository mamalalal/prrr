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
    $sql = "SELECT id,nazev,zkratka,barva,mesto FROM oddeleni WHERE id='$id'";
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


    header('location:sprava.php');
}
?>
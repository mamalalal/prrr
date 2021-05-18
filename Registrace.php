
<?php
session_start();

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Příspěvkové Fórum</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="menu.php">Domů</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="Prihlaseni.php"><span class="glyphicon glyphicon-log-in"></span> Přihlásit</a></li>
    </ul>
  </div>
</nav>


<form method="post">
  <div class="form-group" >
    <label for="exampleInputEmail1">Jméno</label>
    <input type="text" class="form-control" name ="jmeno" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jméno">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Příjmení</label>
    <input type="text" class="form-control" name ="prijmeni" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Příjmení">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Uživatelské jméno</label>
    <input type="text" class="form-control" name ="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Uživatelské jméno">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Heslo</label>
    <input type="password" class="form-control" name ="heslo" id="exampleInputPassword1" placeholder="Heslo">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Heslo znovu</label>
    <input type="password" class="form-control" name ="hesloznovu" id="exampleInputPassword1" placeholder="Heslo znovu">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" class="form-control" name ="email" id="exampleInputPassword1" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Kontrolní otázka</label>
    <input type="text" class="form-control" name ="otazka" id="exampleInputPassword1" placeholder="Kontrolní otázka">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Odpověď na otázku</label>
    <input type="text" class="form-control" name ="odpoved" id="exampleInputPassword1" placeholder="Odpověď na otázku">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Poznámka</label>
    <input type="text" class="form-control" name ="poznamka" id="exampleInputPassword1" placeholder="Poznámka">
  </div>
 
  <button type="submit" name ="registrovat" class="btn btn-primary">Registrovat</button>
</form>

<?php
    if(isset($_POST['registrovat']))
    {
        $db = mysqli_connect("localhost","root","","prispevkoveforummo");
        if(!empty($_POST['jmeno']) && !empty($_POST['prijmeni'])&& !empty($_POST['username'])&& !empty($_POST['heslo']) && !empty($_POST['hesloznovu']) && !empty($_POST['email']) && !empty($_POST['otazka']) && !empty($_POST['odpoved']))
        {
            $jmeno = $_POST['jmeno'];
            $prijmeni = $_POST['prijmeni'];
            $username = $_POST['username'];
            $heslo = $_POST['heslo'];
            $hesloznovu = $_POST['hesloznovu'];
            $email = $_POST['email'];
            $otazka = $_POST['otazka'];
            $odpoved = $_POST['odpoved'];
            $poznamka = $_POST['poznamka'];
            $heslohash = md5($heslo . $salt);
           if($heslo == $hesloznovu)
           {
                
                $sql = "SELECT username FROM uzivatele WHERE jmeno='$jmeno'";
                $result = $db->query($sql);
                if ($result->num_rows > 0) 
                {
                   
                    echo "Zadané uživatelské jméno je již v databázi";
                }else 
                {
                    if(!empty($_POST['poznamka']))
                    {
                        $sql = "INSERT INTO uzivatele (jmeno,prijmeni,username,heslo,email,otazka,odpoved,poznamka,role) VALUES ('$jmeno','$prijmeni','$username','$heslohash','$email','$otazka','$odpoved','$poznamka','1')" ;
                    }else
                    {
                        $sql = "INSERT INTO uzivatele (jmeno,prijmeni,username,heslo,email,otazka,odpoved,role) VALUES ('$jmeno','$prijmeni','$username','$hesloheslohash','$email','$otazka','$odpoved','1')" ;
                    }
                    

                    if ($db->query($sql) === TRUE) {
                        header('Location:menu.php');
                      }
                }
                
           }else
           {
               echo "Hesla nejsou stejná";
           }


        }else
        {
            echo "Vyplňte všechna pole";
        }

    }
?>
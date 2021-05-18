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
    <li><a href="Registrace.php"><span class="glyphicon glyphicon-user"></span> Registrovat</a></li>
    </ul>
  </div>
</nav>


<form method="post">
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" class="form-control" name ="email" id="exampleInputPassword1" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Heslo</label>
    <input type="password" class="form-control" name ="heslo" id="exampleInputPassword1" placeholder="Heslo">
  </div>
 
  <button type="submit" name ="prihlasit" class="btn btn-primary">Přihlásit</button>
</form>

<?php
if(isset($_POST['prihlasit']))
{
    $email = $_POST['email'];
    $heslo = $_POST['heslo'];
    $heslomd5 = md5($heslo);
    
    $db = mysqli_connect("localhost","root","","prispevkoveforummo");
    $sql = "SELECT email,heslo FROM uzivatele WHERE email = '$email'";
    $result = $db->query($sql);

if ($result->num_rows > 0) {
  

    $sql = "SELECT username,email,heslo,otazka,odpoved FROM uzivatele WHERE email = '$email' && heslo = '$heslomd5'";
    
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
  
        while($row = $result->fetch_assoc()) 
        {
     
        if($row['email'] == $email && $row['heslo'] == $heslomd5)
        {
            
            $_SESSION['username'] = $row['username'];
            header('Location:menu.php');
        }else
        {
           
        }
        }

  }else
  {
      
    $sql = "SELECT email,heslo,otazka,odpoved FROM uzivatele WHERE email = '$email'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) 
    {
       
        $odpoved = $row['odpoved'];
        $otazka = $row['otazka'];

    }
}else{}

    echo '<form method="post">
    <div class="form-group">
    <h3>Zapomenuté heslo</h3>
      <label for="exampleInputPassword1">Kontrolní otázka</label>
      <input type="text" class="form-control" name ="email" id="exampleInputPassword1" value="' . $otazka .'" readonly>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Heslo</label>
      <input type="text" class="form-control" name ="odpoved" id="exampleInputPassword1" placeholder="odpověď na otázku">
    </div>
   
    <button type="submit" name ="kontrola" class="btn btn-primary">Zapomenuté heslo</button>
  </form>';
  }

} else {
    
}
}
if(isset($_POST['kontrola']))
{
    echo '<form method="post">
    <div class="form-group">
    <h3>Zapomenuté heslo</h3>
      <label for="exampleInputPassword1">Kontrolní otázka</label>
      <input type="password" class="form-control" name ="email" id="exampleInputPassword1" placeholder="nové heslo" readonly>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Heslo</label>
      <input type="password" class="form-control" name ="odpoved" id="exampleInputPassword1" placeholder="nové heslo znovu">
    </div>
   
    <button type="submit" name ="kontrola" class="btn btn-primary">Zapomenuté heslo</button>
  </form>';
}

?>
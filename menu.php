<?php
session_start();

if(!empty($_SESSION['username']))
{
    $username = '<li><a><span class="glyphicon glyphicon-user"></span>' .  $_SESSION['username'] .'</a></li>';
    $odhlasit = '<li><a href="Odhlaseni.php"><span class="glyphicon glyphicon-log-out"></span> Odhlásit</a></li>';
}else
{
    $username = '<li><a href="Registrace.php"><span class="glyphicon glyphicon-user"></span> Registrovat</a></li>';
    $odhlasit = '<li><a href="Prihlaseni.php"><span class="glyphicon glyphicon-log-in"></span> Přihlásit</a></li>';
}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Příspěvkové Fórum</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Domů</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php echo $username ?>;
      <?php echo $odhlasit ?>;
    </ul>
  </div>
</nav>


<form method="post">
<button type="submit" name ="datum" class="btn btn-primary">Řadit dle data</button>
<button type="submit" name ="abeceda" class="btn btn-primary">Řadit dle názvu</button>
    <div class="form-group">
    <h3>Přidat příspěvek</h3>
      <label for="exampleInputPassword1">Název</label>
      <input type="text" class="form-control" name ="nazev" id="exampleInputPassword1" placeholder="Název" >
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Text</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
    </div>
   
    <button type="submit" name ="pridat" class="btn btn-primary">Zapomenuté heslo</button>
  </form>


  <?php
if(isset($_POST['pridat']))
{
    $nazev = $_POST['nazev'];
    $text = $_POST['text'];
    if(!empty($_SESSION['username']))
    {
        $autor = $_SESSION['username'];
    }else
    {
        $autor = "Neregistrovaný uživatel";
    }

    if(!empty($_POST['nazev']) && !empty($_POST['text']))
    {
        $db = mysqli_connect("localhost","root","","prispevkoveforummo");
        $sql = "INSERT INTO prispevek (nazev,text,autor) VALUES ('$nazev','$text','$autor')";

        if ($db->query($sql) === TRUE) {
            echo "Přidáno";
          }
    }

    
}




if(isset($_POST['detail']))
{
    $id = $_POST['detail'];
    header( "Location: detail.php?id={$id}" );
}else if(isset($_POST['datum']))
{
    $db = mysqli_connect("localhost","root","","prispevkoveforummo");
    $sql = "SELECT nazev,text,autor,datum,id FROM prispevek ORDER BY datum DESC";
    
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) 
        {
            $id = $row['id'];
            $nazev = $row['nazev'];
            $text = $row['text'];
            $datum = $row['datum'];
            $autor = $row['autor'];
           
            echo '<form method="post">
            <div class="row">
            <div class="form-group col-md-4">
            <label for="inputEmail4">Název</label>
            <input type="email" class="form-control" id="inputEmail4" value="'.$nazev.'" readonly>
          </div>
          <div class="form-group col-md-4">
            <label for="inputEmail4">Autor</label>
            <input type="email" class="form-control" id="inputEmail4" value="'.$autor.'" readonly>
          </div>
          <div class="form-group col-md-3">
          <label for="inputEmail4">Datum</label>
          <input type="email" class="form-control" id="inputEmail4" value="'.$datum.'" readonly>
        </div>
        
        <div class="form-group col-md-12">
      
        <label for="exampleFormControlTextarea1">Text</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" v rows="3" readonly>'.$text.'</textarea>
      </div><br>
      <button type="submit" name ="detail" value="'.$id.'" class="btn btn-primary">Detail</button><br>
      
            </div>
          </form>
          <hr>';
        }
    }
}else if(isset($_POST['abeceda']))
{
    
    $db = mysqli_connect("localhost","root","","prispevkoveforummo");
    $sql = "SELECT nazev,text,autor,datum,id FROM prispevek ORDER BY nazev ASC";
    
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) 
        {
            $id = $row['id'];
            $nazev = $row['nazev'];
            $text = $row['text'];
            $datum = $row['datum'];
            $autor = $row['autor'];
           
            echo '<form method="post">
            <div class="row">
            <div class="form-group col-md-4">
            <label for="inputEmail4">Název</label>
            <input type="email" class="form-control" id="inputEmail4" value="'.$nazev.'" readonly>
          </div>
          <div class="form-group col-md-4">
            <label for="inputEmail4">Autor</label>
            <input type="email" class="form-control" id="inputEmail4" value="'.$autor.'" readonly>
          </div>
          <div class="form-group col-md-3">
          <label for="inputEmail4">Datum</label>
          <input type="email" class="form-control" id="inputEmail4" value="'.$datum.'" readonly>
        </div>
        
        <div class="form-group col-md-12">
      
        <label for="exampleFormControlTextarea1">Text</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" v rows="3" readonly>'.$text.'</textarea>
      </div><br>
      <button type="submit" name ="detail" value="'.$id.'" class="btn btn-primary">Detail</button><br>
      
            </div>
          </form>
          <hr>';
        }
    }

}else{
    $db = mysqli_connect("localhost","root","","prispevkoveforummo");
    $sql = "SELECT nazev,text,autor,datum,id FROM prispevek";
    
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) 
        {
            $id = $row['id'];
            $nazev = $row['nazev'];
            $text = $row['text'];
            $datum = $row['datum'];
            $autor = $row['autor'];
           
            echo '<form method="post">
            <div class="row">
            <div class="form-group col-md-4">
            <label for="inputEmail4">Název</label>
            <input type="email" class="form-control" id="inputEmail4" value="'.$nazev.'" readonly>
          </div>
          <div class="form-group col-md-4">
            <label for="inputEmail4">Autor</label>
            <input type="email" class="form-control" id="inputEmail4" value="'.$autor.'" readonly>
          </div>
          <div class="form-group col-md-3">
          <label for="inputEmail4">Datum</label>
          <input type="email" class="form-control" id="inputEmail4" value="'.$datum.'" readonly>
        </div>
        
        <div class="form-group col-md-12">
      
        <label for="exampleFormControlTextarea1">Text</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" v rows="3" readonly>'.$text.'</textarea>
      </div><br>
      <button type="submit" name ="detail" value="'.$id.'" class="btn btn-primary">Detail</button><br>
      
            </div>
          </form>
          <hr>';
        }
    }
}

  ?>
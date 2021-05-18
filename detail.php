<?php
$startid = $_GET['id'];
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
      <li class="active"><a href="Menu.php">Domů</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php echo $username ?>;
      <?php echo $odhlasit ?>;
    </ul>
  </div>
</nav>

<?php
$db = mysqli_connect("localhost","root","","prispevkoveforummo");
$sql = "SELECT nazev,text,autor,datum,id FROM prispevek WHERE id='$startid'";

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
  
  
        </div>
      </form>
      <hr>  <h3>Komentáře</h3>';

    }

   

}



      if(isset($_POST['pridat']))
      {
          $text = $_POST['textkom'];
          $autor = $_SESSION['username'];
          
        $db = mysqli_connect("localhost","root","","prispevkoveforummo");
        $sql = "INSERT INTO komentar (autor,text,idprispevku) VALUES ('$autor','$text','$startid')";
        if ($db->query($sql) === TRUE) {
            
          }

          $db = mysqli_connect("localhost","root","","prispevkoveforummo");
          $sql = "SELECT text,autor FROM komentar WHERE idprispevku='$startid'";
          
          $result = $db->query($sql);
          if ($result->num_rows > 0) 
          {
          
              while($row = $result->fetch_assoc()) 
              {
                  $text = $row['text'];
                  $autor = $row['autor'];
                  echo '
                  <form method="post">
                  <div class="row">
                  <div class="form-group col-md-4">
                  <label for="inputEmail4">Název</label>
                  <input type="email" class="form-control" id="inputEmail4" value="'.$autor.'" readonly>
                </div>
                
              
              <div class="form-group col-md-12">
            
              <label for="exampleFormControlTextarea1">Text</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" v rows="2" readonly>'.$text.'</textarea>
            </div><br>
            
            
                  </div>
                </form>
                <hr>';
              }
          }

          
echo '<h3>Přidat komentář</h3>
<form method="post">
<div class="row">



<div class="form-group col-md-12">

<label for="exampleFormControlTextarea1">Text</label>
<textarea class="form-control" name="textkom" id="exampleFormControlTextarea1" v rows="2"></textarea>
</div><br>


</div>
<button type="submit" name ="pridat" value="'.$id.'" class="btn btn-primary">Přidat</button><br>
</form>
<hr>';

      }else
      {
        $db = mysqli_connect("localhost","root","","prispevkoveforummo");
        $sql = "SELECT text,autor FROM komentar WHERE idprispevku='$startid'";
        
        $result = $db->query($sql);
        if ($result->num_rows > 0) 
        {
        
            while($row = $result->fetch_assoc()) 
            {
                $text = $row['text'];
                $autor = $row['autor'];
                echo '
                <form method="post">
                <div class="row">
                <div class="form-group col-md-4">
                <label for="inputEmail4">Název</label>
                <input type="email" class="form-control" id="inputEmail4" value="'.$autor.'" readonly>
              </div>
              
            
            <div class="form-group col-md-12">
          
            <label for="exampleFormControlTextarea1">Text</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" v rows="2" readonly>'.$text.'</textarea>
          </div><br>
          
          
                </div>
              </form>
              <hr>';

              
            }
            
echo '<h3>Přidat komentář</h3>
<form method="post">
<div class="row">



<div class="form-group col-md-12">

<label for="exampleFormControlTextarea1">Text</label>
<textarea class="form-control" name="textkom" id="exampleFormControlTextarea1" v rows="2"></textarea>
</div><br>


</div>
<button type="submit" name ="pridat" value="'.$id.'" class="btn btn-primary">Přidat</button><br>
</form>
<hr>';
        }
      }

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="">Záznamový systém</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="Menu.php">Home</a></li>
      <li class="active"><a href="">Přidat záznam</a></li>
      <li><a href="Zaznamy.php">Zobrazit Záznamy</a></li>
      
    </ul>
  </div>
</nav>

<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Text záznamu</label>
    <textarea maxlength="255" class="form-control" id="exampleFormControlTextarea1" rows="3" name="text" ></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Typ záznamu</label>
    <select multiple class="form-control" id="exampleFormControlSelect2" name="typ">
      <option>Informace</option>
      <option>Upozornění</option>
      <option>Chyba</option>
      <option>Kritická chyba</option>
    </select>
  </div>
  
  <button type="submit" class="btn btn-primary" name="pridat">Přidat záznam</button>
</form>

<?php

if(isset($_POST['pridat']))
{
    $text = $_POST['text'];
    $typ = $_POST['typ'];
    $db = mysqli_connect("localhost","root","","logovacisystem");
    $datum = date("Y/m/d");

    echo $datum;
    


    $sql = "INSERT INTO zaznamy (text, typ,datum)
    VALUES ('$text', '$typ','$datum')";
    if ($db->query($sql) === TRUE) {
        echo "Přidáno do databáze";
    }
}



?>
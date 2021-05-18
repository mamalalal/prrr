<?php
$passedId = $_GET['dalsi'];

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<html>
<head>
<style>
div.col-sm-3 { 
  width:30%;
  border:solid;
  word-wrap: break-word;
  float:right;
}

div.center{
    float:left;
  
}
}
</style>
</head>
</html>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="">Záznamový systém</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="Menu.php">Home</a></li>
      <li><a href="PridatZaznam.php">Přidat záznam</a></li>
      <li class="active"><a href="">Zobrazit Záznamy</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Filtrovat <span class="caret"></span></a>
        <ul class="dropdown-menu">
          
          <form method="post">
          <button type="submit" class="btn btn-primary" name="informace">Informace</button>
          <button type="submit" class="btn btn-primary" name="upozorneni">Upozornění</button>
          <button type="submit" class="btn btn-primary" name="chyba">Chyba</button>
          <button type="submit" class="btn btn-primary" name="kritickachyba">Kritická Chyba</button>
          </form>
        </ul>
      </li>
    </ul>
  </div>
</nav>
<form method="post">
          <button type="submit" class="btn btn-primary" name="vcera">Včera</button>
          <button type="submit" class="btn btn-primary" name="2dny">2 dny</button>
          <button type="submit" class="btn btn-primary" name="3dny">3 dny</button>
          <button type="submit" class="btn btn-primary" name="4dny">4 dny</button>
          <button type="submit" class="btn btn-primary" name="5dny">5 dny</button>
          <button type="submit" class="btn btn-primary" name="6dny">6 dny</button>
          <button type="submit" class="btn btn-primary" name="7dny">7 dny</button>
          <button type="submit" class="btn btn-primary" name="8dny">8 dny</button>
          <button type="submit" class="btn btn-primary" name="9dny">9 dny</button>
          <button type="submit" class="btn btn-primary" name="10dny">10 dny</button>
          
          </form>



<?php


$i = $passedId * 10;
$to = $i + 20;
$a = $passedId *10;


$db = mysqli_connect("localhost","root","","logovacisystem");
$sql = "SELECT id,text,typ,cas,datum FROM zaznamy WHERE id > $i";

$result = $db->query($sql);

if(isset($_POST['vcera']))
{
    $yesterday_date = date('d.m.Y',strtotime("-1 days"));
    // Show yesterdays date
    
    $db = mysqli_connect("localhost","root","","logovacisystem");
    $sql = "SELECT id,text,typ,cas FROM zaznamy WHERE datum = '$yesterday_date'";

    $result = $db->query($sql);
    while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    
    
    
    
    $text = $row['text'];
    $typ = $row['typ'];
    $cas = $row['cas'];

   
    if($typ == "Informace")
    {
        $barva = "LightBlue";
    }else if($typ == "Upozornění")
    {
        $barva = "Yellow";
    }else if($typ == "Chyba")
    {
        $barva = "Red";
    }
    else if($typ == "Kritická chyba")
    {
        $barva = "Purple";
    }else
    {
        $barva = "Green";
    }
    
    echo '<div class="row">
    <div class="col-sm-3"  id = "1" style="background-color:'.$barva.'">' . $text .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $typ .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $cas .'</div>
  </div>';

    }


}
if(isset($_POST['2dny']))
{
    $yesterday_date = date('d.m.Y',strtotime("-2 days"));
    // Show yesterdays date
    
    $db = mysqli_connect("localhost","root","","logovacisystem");
    $sql = "SELECT id,text,typ,cas FROM zaznamy WHERE datum = '$yesterday_date'";

    $result = $db->query($sql);
    while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    
    
    
    
    $text = $row['text'];
    $typ = $row['typ'];
    $cas = $row['cas'];

   
    if($typ == "Informace")
    {
        $barva = "LightBlue";
    }else if($typ == "Upozornění")
    {
        $barva = "Yellow";
    }else if($typ == "Chyba")
    {
        $barva = "Red";
    }
    else if($typ == "Kritická chyba")
    {
        $barva = "Purple";
    }else
    {
        $barva = "Green";
    }
    
    echo '<div class="row">
    <div class="col-sm-3"  id = "1" style="background-color:'.$barva.'">' . $text .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $typ .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $cas .'</div>
  </div>';

    }


}
if(isset($_POST['3dny']))
{
    $yesterday_date = date('d.m.Y',strtotime("-3 days"));
    // Show yesterdays date
    
    $db = mysqli_connect("localhost","root","","logovacisystem");
    $sql = "SELECT id,text,typ,cas FROM zaznamy WHERE datum = '$yesterday_date'";

    $result = $db->query($sql);
    while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    
    
    
    
    $text = $row['text'];
    $typ = $row['typ'];
    $cas = $row['cas'];

   
    if($typ == "Informace")
    {
        $barva = "LightBlue";
    }else if($typ == "Upozornění")
    {
        $barva = "Yellow";
    }else if($typ == "Chyba")
    {
        $barva = "Red";
    }
    else if($typ == "Kritická chyba")
    {
        $barva = "Purple";
    }else
    {
        $barva = "Green";
    }
    
    echo '<div class="row">
    <div class="col-sm-3"  id = "1" style="background-color:'.$barva.'">' . $text .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $typ .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $cas .'</div>
  </div>';

    }


}
if(isset($_POST['4dny']))
{
    $yesterday_date = date('d.m.Y',strtotime("-4 days"));
    // Show yesterdays date
    
    $db = mysqli_connect("localhost","root","","logovacisystem");
    $sql = "SELECT id,text,typ,cas FROM zaznamy WHERE datum = '$yesterday_date'";

    $result = $db->query($sql);
    while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    
    
    
    
    $text = $row['text'];
    $typ = $row['typ'];
    $cas = $row['cas'];

   
    if($typ == "Informace")
    {
        $barva = "LightBlue";
    }else if($typ == "Upozornění")
    {
        $barva = "Yellow";
    }else if($typ == "Chyba")
    {
        $barva = "Red";
    }
    else if($typ == "Kritická chyba")
    {
        $barva = "Purple";
    }else
    {
        $barva = "Green";
    }
    
    echo '<div class="row">
    <div class="col-sm-3"  id = "1" style="background-color:'.$barva.'">' . $text .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $typ .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $cas .'</div>
  </div>';

    }


}
if(isset($_POST['5dny']))
{
    $yesterday_date = date('d.m.Y',strtotime("-5 days"));
    // Show yesterdays date
    
    $db = mysqli_connect("localhost","root","","logovacisystem");
    $sql = "SELECT id,text,typ,cas FROM zaznamy WHERE datum = '$yesterday_date'";

    $result = $db->query($sql);
    while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    
    
    
    
    $text = $row['text'];
    $typ = $row['typ'];
    $cas = $row['cas'];

   
    if($typ == "Informace")
    {
        $barva = "LightBlue";
    }else if($typ == "Upozornění")
    {
        $barva = "Yellow";
    }else if($typ == "Chyba")
    {
        $barva = "Red";
    }
    else if($typ == "Kritická chyba")
    {
        $barva = "Purple";
    }else
    {
        $barva = "Green";
    }
    
    echo '<div class="row">
    <div class="col-sm-3"  id = "1" style="background-color:'.$barva.'">' . $text .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $typ .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $cas .'</div>
  </div>';

    }


}
if(isset($_POST['6dny']))
{
    $yesterday_date = date('d.m.Y',strtotime("-6 days"));
    // Show yesterdays date
    
    $db = mysqli_connect("localhost","root","","logovacisystem");
    $sql = "SELECT id,text,typ,cas FROM zaznamy WHERE datum = '$yesterday_date'";

    $result = $db->query($sql);
    while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    
    
    
    
    $text = $row['text'];
    $typ = $row['typ'];
    $cas = $row['cas'];

   
    if($typ == "Informace")
    {
        $barva = "LightBlue";
    }else if($typ == "Upozornění")
    {
        $barva = "Yellow";
    }else if($typ == "Chyba")
    {
        $barva = "Red";
    }
    else if($typ == "Kritická chyba")
    {
        $barva = "Purple";
    }else
    {
        $barva = "Green";
    }
    
    echo '<div class="row">
    <div class="col-sm-3"  id = "1" style="background-color:'.$barva.'">' . $text .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $typ .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $cas .'</div>
  </div>';

    }


}
if(isset($_POST['7dny']))
{
    $yesterday_date = date('d.m.Y',strtotime("-7 days"));
    // Show yesterdays date
    
    $db = mysqli_connect("localhost","root","","logovacisystem");
    $sql = "SELECT id,text,typ,cas FROM zaznamy WHERE datum = '$yesterday_date'";

    $result = $db->query($sql);
    while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    
    
    
    
    $text = $row['text'];
    $typ = $row['typ'];
    $cas = $row['cas'];

   
    if($typ == "Informace")
    {
        $barva = "LightBlue";
    }else if($typ == "Upozornění")
    {
        $barva = "Yellow";
    }else if($typ == "Chyba")
    {
        $barva = "Red";
    }
    else if($typ == "Kritická chyba")
    {
        $barva = "Purple";
    }else
    {
        $barva = "Green";
    }
    
    echo '<div class="row">
    <div class="col-sm-3"  id = "1" style="background-color:'.$barva.'">' . $text .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $typ .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $cas .'</div>
  </div>';

    }


}
if(isset($_POST['8dny']))
{
    $yesterday_date = date('d.m.Y',strtotime("-8 days"));
    // Show yesterdays date
    
    $db = mysqli_connect("localhost","root","","logovacisystem");
    $sql = "SELECT id,text,typ,cas FROM zaznamy WHERE datum = '$yesterday_date'";

    $result = $db->query($sql);
    while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    
    
    
    
    $text = $row['text'];
    $typ = $row['typ'];
    $cas = $row['cas'];

   
    if($typ == "Informace")
    {
        $barva = "LightBlue";
    }else if($typ == "Upozornění")
    {
        $barva = "Yellow";
    }else if($typ == "Chyba")
    {
        $barva = "Red";
    }
    else if($typ == "Kritická chyba")
    {
        $barva = "Purple";
    }else
    {
        $barva = "Green";
    }
    
    echo '<div class="row">
    <div class="col-sm-3"  id = "1" style="background-color:'.$barva.'">' . $text .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $typ .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $cas .'</div>
  </div>';

    }


}
if(isset($_POST['9dny']))
{
    $yesterday_date = date('d.m.Y',strtotime("-9 days"));
    // Show yesterdays date
    
    $db = mysqli_connect("localhost","root","","logovacisystem");
    $sql = "SELECT id,text,typ,cas FROM zaznamy WHERE datum = '$yesterday_date'";

    $result = $db->query($sql);
    while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    
    
    
    
    $text = $row['text'];
    $typ = $row['typ'];
    $cas = $row['cas'];

   
    if($typ == "Informace")
    {
        $barva = "LightBlue";
    }else if($typ == "Upozornění")
    {
        $barva = "Yellow";
    }else if($typ == "Chyba")
    {
        $barva = "Red";
    }
    else if($typ == "Kritická chyba")
    {
        $barva = "Purple";
    }else
    {
        $barva = "Green";
    }
    
    echo '<div class="row">
    <div class="col-sm-3"  id = "1" style="background-color:'.$barva.'">' . $text .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $typ .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $cas .'</div>
  </div>';

    }


}
if(isset($_POST['10dny']))
{
    $yesterday_date = date('d.m.Y',strtotime("-10 days"));
    // Show yesterdays date
    
    $db = mysqli_connect("localhost","root","","logovacisystem");
    $sql = "SELECT id,text,typ,cas FROM zaznamy WHERE datum = '$yesterday_date'";

    $result = $db->query($sql);
    while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    
    
    
    
    $text = $row['text'];
    $typ = $row['typ'];
    $cas = $row['cas'];

   
    if($typ == "Informace")
    {
        $barva = "LightBlue";
    }else if($typ == "Upozornění")
    {
        $barva = "Yellow";
    }else if($typ == "Chyba")
    {
        $barva = "Red";
    }
    else if($typ == "Kritická chyba")
    {
        $barva = "Purple";
    }else
    {
        $barva = "Green";
    }
    
    echo '<div class="row">
    <div class="col-sm-3"  id = "1" style="background-color:'.$barva.'">' . $text .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $typ .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $cas .'</div>
  </div>';

    }


}


if(isset($_POST['informace']))
{
    $db = mysqli_connect("localhost","root","","logovacisystem");
    $sql = "SELECT id,text,typ,cas FROM zaznamy WHERE typ = 'Informace'";

    $result = $db->query($sql);
    while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    
    
    
    
    $text = $row['text'];
    $typ = $row['typ'];
    $cas = $row['cas'];

   
    if($typ == "Informace")
    {
        $barva = "LightBlue";
    }else if($typ == "Upozornění")
    {
        $barva = "Yellow";
    }else if($typ == "Chyba")
    {
        $barva = "Red";
    }
    else if($typ == "Kritická chyba")
    {
        $barva = "Purple";
    }else
    {
        $barva = "Green";
    }
    
    echo '<div class="row">
    <div class="col-sm-3"  id = "1" style="background-color:'.$barva.'">' . $text .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $typ .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $cas .'</div>
  </div>';

    }


}

if(isset($_POST['upozorneni']))
{

    $db = mysqli_connect("localhost","root","","logovacisystem");
    $sql = "SELECT id,text,typ,cas FROM zaznamy WHERE typ = 'Upozornění'";

    $result = $db->query($sql);
    while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    
    
    
    
    $text = $row['text'];
    $typ = $row['typ'];
    $cas = $row['cas'];

   
    if($typ == "Informace")
    {
        $barva = "LightBlue";
    }else if($typ == "Upozornění")
    {
        $barva = "Yellow";
    }else if($typ == "Chyba")
    {
        $barva = "Red";
    }
    else if($typ == "Kritická chyba")
    {
        $barva = "Purple";
    }else
    {
        $barva = "Green";
    }
    
    echo '<div class="row">
    <div class="col-sm-3"  id = "1" style="background-color:'.$barva.'">' . $text .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $typ .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $cas .'</div>
  </div>';

    }
}

if(isset($_POST['chyba']))
{

    $db = mysqli_connect("localhost","root","","logovacisystem");
    $sql = "SELECT id,text,typ,cas FROM zaznamy WHERE typ = 'Chyba'";

    $result = $db->query($sql);
    while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    
    
    
    
    $text = $row['text'];
    $typ = $row['typ'];
    $cas = $row['cas'];

   
    if($typ == "Informace")
    {
        $barva = "LightBlue";
    }else if($typ == "Upozornění")
    {
        $barva = "Yellow";
    }else if($typ == "Chyba")
    {
        $barva = "Red";
    }
    else if($typ == "Kritická chyba")
    {
        $barva = "Purple";
    }else
    {
        $barva = "Green";
    }
    
    echo '<div class="row">
    <div class="col-sm-3"  id = "1" style="background-color:'.$barva.'">' . $text .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $typ .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $cas .'</div>
  </div>';

    }
}

if(isset($_POST['kritickachyba']))
{

    $db = mysqli_connect("localhost","root","","logovacisystem");
    $sql = "SELECT id,text,typ,cas FROM zaznamy WHERE typ = 'Kritická chyba'";

    $result = $db->query($sql);
    while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    
    
    
    
    $text = $row['text'];
    $typ = $row['typ'];
    $cas = $row['cas'];

   
    if($typ == "Informace")
    {
        $barva = "LightBlue";
    }else if($typ == "Upozornění")
    {
        $barva = "Yellow";
    }else if($typ == "Chyba")
    {
        $barva = "Red";
    }
    else if($typ == "Kritická chyba")
    {
        $barva = "Purple";
    }else
    {
        $barva = "Green";
    }
    
    echo '<div class="row">
    <div class="col-sm-3"  id = "1" style="background-color:'.$barva.'">' . $text .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $typ .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $cas .'</div>
  </div>';

    }
}


while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    
    
    

    if($row['id'] <$to && $row['id'] >0)
    {
        //echo $row['id'];
    
    $text = $row['text'];
    $typ = $row['typ'];
    $cas = $row['cas'];

   
    if($typ == "Informace")
    {
        $barva = "LightBlue";
    }else if($typ == "Upozornění")
    {
        $barva = "Yellow";
    }else if($typ == "Chyba")
    {
        $barva = "Red";
    }
    else if($typ == "Kritická chyba")
    {
        $barva = "Purple";
    }else
    {
        $barva = "Green";
    }
    
    echo '<div class="row">
    <div class="col-sm-3"  id = "1" style="background-color:'.$barva.'">' . $text .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $typ .'</div>
    <div class="col-sm-3" style="background-color:'.$barva.'">'. $cas .'</div>
  </div>';
  
    }else
    {
    echo '<br></br>';
    echo '<br></br>';
    
    $result = $db->query("SELECT COUNT(*) FROM `zaznamy`");
    $row = $result->fetch_row();


$x = ((int) ($row[0]/20)) + 2;



for ($i = 1; $i < $x; $i++) {
    echo '<form action="dalsi.php">
    <div class="center">
    <input type="submit"   name="dalsi" value="'. $i .'" />
    </div>
</form>';
//error_reporting(E_ERROR | E_PARSE);
}

}

  }
  
  if(isset($_POST['dalsi']))
  {
    

  }

?>

<script>
 function filter(){
    console.log("some");
 }
</script>
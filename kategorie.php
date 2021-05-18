<head>
<style>
div.gallery
{
float:left;
border: 1px solid #ccc;
}

div.desc {
  width:300px;
  padding: 10px;
  text-align: center;
  font-size:15px;
  word-wrap: break-word

}
</style>
</head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href=menu.php>Home</a></li>
      <li class="active"><a href="">Kategorie</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <a href="kosik.php"> 
    <i class="fa fa-shopping-cart" style="font-size:48px;color:white"></i>
    </a>
    </ul>
  </div>
</nav>

   

<?php


    $db = mysqli_connect("localhost","root","","eshopmo");
    $sql = "SELECT id,nazev,obrazek FROM kategorie ORDER BY nazev";
    $result = $db->query($sql);
    while($row = $result->fetch_assoc())
    {
        $nazev = $row['nazev'];
        $obrazek = $row['obrazek'];
        $id = $row['id'];
        echo "<div class='gallery'  id =' $id 'onclick='dalsistranka(this.id)'  > ";
        echo "<a target=_blank>";
        echo "<img src=' $obrazek '  width=300 height=250>";
        echo "</a>";
        echo "<div class='desc'> $nazev </div>";
      echo "</div>";
      //echo "<div onclick='dalsistranka()'><h3>It's recommended that you follow</h3><h2>Engineering School</h2></div>";
    }


?>

<script>
function dalsistranka(id)
{
    
    location.href = "produkty.php?id="+id;
}
</script>   
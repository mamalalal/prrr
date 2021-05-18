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

   


<form method="post" >
  <div class="form-group">
    <label for="exampleInputEmail1">Jméno</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="jmeno" aria-describedby="emailHelp" placeholder="Jméno">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Přijmení</label>
    <input type="text" class="form-control" name="prijmeni" id="exampleInputPassword1" placeholder="Přijmení">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Ulice</label>
    <input type="text" class="form-control" name="ulice" id="exampleInputPassword1" placeholder="Ulice">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Číslo popisné</label>
    <input type="text" class="form-control" name="cp" id="exampleInputPassword1" placeholder="Číslo popisné">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">PSČ</label>
    <input type="text" class="form-control" name="psc" id="exampleInputPassword1" placeholder="PSČ">
  </div>
  <div class="form-check">
  <label for="exampleInputPassword1">Způsob dopravy</label>
    
  </div>
  <div class="form-check">
  <input type="radio" id="male" name="gender" value="0">
<label for="male">Osobní odběr: 0kč</label><br>
<input type="radio" id="female"  name="gender" value="129">
<label for="female">dovoz přepravní společností: 129Kč </label><br>
<br></br>
</div>
  <button type="submit" onclick="souhrn()" name="dokoncitnakup" class="btn btn-primary">Uložit</button>
 

</form>


<?php
    if(isset($_POST['dokoncitnakup']))
    {
        $cislo = $_POST['gender'];
        $jmeno = $_POST['jmeno'];
        $prijmeni = $_POST['prijmeni'];
        $ulice = $_POST['ulice'];
        $cp = $_POST['cp'];
        $psc = $_POST['psc'];
        $celkovacena= 0;
        
        $db = mysqli_connect("localhost","root","","EshopMO");
        $sql = "SELECT cena FROM kosik";
        $result = $db->query($sql);

        while($row = $result->fetch_assoc())
        {
            $cena = $row['cena'];
            $celkovacena=$celkovacena+$cena;
            
         
        }


     $celkovacenasdopravou = $celkovacena + $cislo;

     $sql = "INSERT INTO objednavka (jmeno,prijmeni,ulice,cp,psc,cena) VALUES ('$jmeno','$prijmeni','$ulice','$cp','$psc','$celkovacenasdopravou')";
     if($db->query($sql) === TRUE) 
     {
 
     }
     header('Location: souhrn.php');

    }
    

?>

<script>

    function souhrn() {
        location.href = "souhrn.php";
        console.log("asdsad");
    };
</script>


<?php

        $db = mysqli_connect("localhost","root","","eshopmo");
    
    
    
        $sql = "SELECT produkt.nazev, produkt.cena, kosik.id,kosik.pocet
        FROM produkt
        INNER JOIN kosik
        ON produkt.id=kosik.id;
        ";
        $result=mysqli_query($db,$sql);   
        
        while($row=mysqli_fetch_array($result))
        {
    
    
            $pocet = $row['pocet'];
            $nazev = $row['nazev'];
            //$obrazek = $row['obrazek'];
            $id = $row['id'];
            //$popis = $row['popis'];
            $cena = ($row['cena']) * $pocet;
            
            $cenabezdph = ($cena * 79)/100;
    
            $result2 = $db->query("SELECT COUNT(*) FROM `kosik` WHERE id = $id");
            $row2 = $result2->fetch_row();
    
                
                $sql =  "UPDATE kosik
                SET cena=$cena
                WHERE id=$id ";
            
                
                if($db->query($sql) === TRUE) {
                    
                    }
                
          
        }



        $sql = "SELECT jmeno,prijmeni,ulice,cp,psc,cena
        FROM objednavka ORDER BY id DESC LIMIT 1";
        $result=mysqli_query($db,$sql);   
        
        while($row=mysqli_fetch_array($result))
        {
            $jmeno = $row['jmeno'];
            
            $prijmeni= $row['prijmeni']; 
            $ulice= $row['ulice'];
            $cp= $row['cp']; 
           
            $psc= $row['psc']; 
            $cena= $row['cena']; 
           $cenabezdph = ($cena * 79)/100;
            echo "<h3 class='produkt'>Vaše jméno: $jmeno</h3>";
            echo "<hr>";
            echo "<h3 class='produkt'>Vaše přijmení: $prijmeni</h3>";
            echo "<hr>";
            echo "<h3 class='produkt'>Ulice: $ulice</h3>";
            echo "<hr>";
            echo "<h3 class='produkt'>Číslo popisné: $cp</h3>";
            echo "<hr>";
            echo "<h3 class='produkt'>PSČ: $psc</h3>";
            echo "<hr>";
            echo "<h3 class='produkt'>Celková cena: $cena Kč</h3>";
            echo "<hr>";
            echo "<h3 class='produkt'>Cena bez DPH: $cenabezdph Kč</h3>";
            }
            
            
        echo "<form method='post' ' >
                <button type='submit' class='obrazek' name='dokoncit'>Odeslat objednávku</button>
                </form>";
                

                if(isset($_POST['dokoncit']))
                {
                    mysqli_query($db,'TRUNCATE TABLE kosik');
                    header('Location: menu.php');
                }

              
                
    

    ?>
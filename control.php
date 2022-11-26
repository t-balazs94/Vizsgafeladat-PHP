<?php
    
    session_start();
    require_once 'const.php';    
    require_once 'function.php';
    
    // csatlakozás az adatbázishoz
    $dbc = mysqli_connect("localhost", "root", "", "szotar");
    // karekterillesztés beállítása
    $sql = "set names utf8";
    mysqli_query($dbc, $sql);
    
    // kliens-oldalról érkező adatok szűrése
    $event = filter_input(INPUT_POST, "event", FILTER_SANITIZE_SPECIAL_CHARS);
    $angol = filter_input(INPUT_POST, "angol", FILTER_SANITIZE_SPECIAL_CHARS);
    $magyar = filter_input(INPUT_POST, "magyar", FILTER_SANITIZE_SPECIAL_CHARS);
    $keresett = filter_input(INPUT_POST, "keresett", FILTER_SANITIZE_SPECIAL_CHARS);
    $uzenet = "";
    
     // eseménykezelés
if (aktUrlFajlnev() === "index"){
    if ($event === "hozzáad"){
        if (mb_strlen(trim($angol && $magyar)) < 1) {
             $uzenet .= "Hiba! A szó túl rövid.<br>";
        }
        
        if ($angol === $magyar){
             $uzenet .= "Hiba! A két szó nem lehet ugyanaz.<br>";
        }
        
        if (angolSzoEll($angol, 0, 0, 0, 0)){
            $uzenet .= "Hiba! Nem szerepelhet benne relációs jel, nagybetű, ékezet vagy szám. (angol)<br>";
        }
        
        if (magyarSzoEll($magyar, 0, 0, 0)){
            $uzenet .= "Hiba! Nem szerepelhet benne relációs jel, nagybetű vagy szám. (magyar)<br>";
        }
        
        if (str_contains($angol, " ")) {
            $uzenet .= "Hiba! Nem lehet benne szóköz!<br>";
        }
        
        if (str_contains($magyar, " ")) {
            $uzenet .= "Hiba! Nem lehet benne szóköz!<br>";
        }
        
        
        $sql = "select count(*) as db from szotar where angol = '$angol' and  magyar = '$magyar'";
        $Tabla = mysqli_query($dbc, $sql);
        list($db) = mysqli_fetch_row($Tabla);
        if ($db > 0) {
            $uzenet .= "Hiba! Ez a szó már létezik!<br>";
        }
        
        $sql1 = "select count(*) as db from szotar where angol = '$magyar' and  magyar = '$angol'";
        $Tabla1 = mysqli_query($dbc, $sql1);
        list($db1) = mysqli_fetch_row($Tabla1);
        if ($db1 > 0) {
            $uzenet .= "Hiba! Az angolban nem szerepelhet magyar szó és magyarban nem szerepelhet angol szó!<br>";
        }
            
        if ($uzenet === "") {
             $sql ="insert into szotar (angol, magyar) values ('$angol', '$magyar')";
             mysqli_query($dbc, $sql);
             $uzenet .= "Szópár felvitele sikeres!<br>";
         }
     }
}
     
 if (aktUrlFajlnev() === "index"){
      if ($event === "keresés"){
          if (!empty($keresett)){
          $kszo = "Keresett szó: $keresett";
          $sql = "select angol, magyar from szotar where magyar = '$keresett'";
          $sql1 = "select magyar, angol from szotar where angol = '$keresett'";
          $sql3 = "select angol, magyar from szotar where angol = '$keresett' or magyar = '$keresett'";
          $szoTabla = mysqli_query($dbc, $sql);
          $szoTabla2 = mysqli_query($dbc, $sql1);
          $szoTabla3 = mysqli_query($dbc, $sql3);
          list($kangol, $kmagyar) = mysqli_fetch_row($szoTabla3); 
   
        if (empty($kangol && $kmagyar)){
               $uzenet .= "Hiba! Nincs találat.<br>";
            }
        
        if (mb_strlen(trim($keresett)) < 2) {
            $uzenet .= "Hiba! A szó túl rövid.<br>";
        }
         
        if (str_contains($keresett, " ")) {
            $uzenet .= "Hiba! Nem lehet benne szóköz!<br>";
        }
         
        if (keresoSzoEll($keresett, 0, 0)){
            $uzenet .= "Hiba! Nem szerepelhet benne relációs jel, vagy szám.<br>";
        }
        
      } else {
          $uzenet .= "Hiba! Mezőt ki kell tölteni.<br>";
      }
    }
  } 
?>
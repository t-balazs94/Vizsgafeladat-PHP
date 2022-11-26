<?php
    require_once 'header.php';
?>
    <body>
        <header class="p-3">
            <h1>Szótár</h1>
        </header>
        <!-- Keresés -->
        <?php
        if (mb_strlen($uzenet) > 0) {
            $alert = mb_substr($uzenet, 0, 4) === "Hiba" ? "alert-danger" : "alert-success";
        ?>
            <div class="alert <?php echo $alert; ?> alert-dismissible fade show" role="alert">
                <?php echo $uzenet; ?>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        ?>
        <div class="p-4">
            <p class="text-center text-danger">
            <?php 
            if(!empty($keresett)){
               echo $kszo;               
            }
            ?>
            </p>
<?php
   if (!empty($keresett)){
      //angol-magyar
     $tiltott = "";
     while (list($aangol, $amagyar) = mysqli_fetch_row($szoTabla)){   
?>     
            <h2 class="pb-3">Angol fordítás</h2>
            <p><?php echo $aangol?></p>
            <h2 class="pb-3">Magyar fordítás</h2>
<?php
            if ($amagyar !== $tiltott){
            if ($amagyar !== $keresett){
?>
            <p><?php echo $amagyar?></p> 
<?php    
            }
            }
              if($kmagyar == $keresett){
?>
              <p><?php echo $kmagyar?></p> 
<?php             
              }
     $tiltott = $amagyar;
              }
         
     //magyar-angol
      $elozo = "";
      while (list($mmagyar, $mangol) = mysqli_fetch_row($szoTabla2)){  
           if ($mangol !== $elozo) { 
           if ($mangol !== $tiltott){
?>         
            <h2 class="pb-3">Angol fordítás</h2>
            <p><?php  echo $mangol?></p>
            <h2 class="pb-3">Magyar fordítás</h2>
<?php
           }
           } 
                $elozo = $mangol;
?>
            <p ><?php echo $mmagyar?></p>  
<?php 
      }
} 
?>                                            
        </div>
        <div class="container p-4">
            <h2>Keresés</h2>
            <form class="row g-3 flex justify-content-center" name="szoKereses" onsubmit="return searchValidation()" method="post">
                <div class="col-auto">
                    <input class="form-control" type="text" name="keresett" id="keresett" placeholder="Keresett szó">
                </div>
                <div class="col-auto">
                    <input type="hidden" name="event" value="keresés">
                    <button class="btn" type="submit">Keresés</button>
                </div>
            </form>
        </div>
        <!-- Úticélok -->
        <section>
            <div class="p-5">
                <h2>Úticélok</h2>
                <div class="d-lg-flex justify-content-evenly">
                    <article>
                        <img src="img/big-ben.jpg" alt="Big-Ben"/>
                        <p>Big Ben, London</p> 
                    </article>
                    <article>
                        <img src="img/manhattan-bridge.jpg" alt="Manhattan-bridge"/>
                        <p>Manhattan Bridge, New York</p>       
                    </article>
                    <article>
                        <img src="img/budapest.jpg" alt="Országház"/>
                        <p>Országház, Budapest</p>       
                    </article>
                </div>
            </div>      
        </section>
        <!-- Szópár felvitele -->
        <h2>Szópár felvitel</h2>
        <form class="mx-auto" id="szopar" name="szoparFelvetel" method="post" onsubmit="return addValidation()" novalidate>
            <div class="col-auto">
                <input class="form-control" type="text" name="angol" placeholder="Angol szó" required>
                <div class="errorMsg"></div>
            </div>
            <div class="col-auto my-3">
                <input class="form-control" type="text" name="magyar" placeholder="Magyar szó" required>
                <div class="errorMsg"></div>
            </div>
            <div class="my-3 text-center">
                <input type="hidden" name="event" value="hozzáad">
                <input class="btn" type="submit" name="hozzadGomb" value="Hozzáad">
            </div>
        </form>

        <?php
        require_once 'footer.php';
        ?>
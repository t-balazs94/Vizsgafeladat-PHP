<?php

     function aktUrlFajlnev() {
        return pathinfo(filter_input(INPUT_SERVER, "PHP_SELF", FILTER_SANITIZE_SPECIAL_CHARS), PATHINFO_FILENAME);
    }

     function magyarSzoEll($magyarszo, $minnbdb, $minszdb, $minijdb) {
        $nbdb = 0;
        $szdb = 0;
        $ijdb = 0;
        for ($i = 0; $i < mb_strlen($magyarszo); $i++) {
            if (is_int(mb_strpos(NB, $magyarszo[$i]))) {
                $nbdb++;
            } else
            if (is_int(mb_strpos(SZ, $magyarszo[$i]))) {
                $szdb++;
            } else
            if (is_int(mb_strpos(IJ, $magyarszo[$i]))) {
                $ijdb++;
            }
        }
        return $nbdb > $minnbdb || $szdb > $minszdb || $ijdb > $minijdb;
    }
    
     function angolSzoEll($angolszo, $minnbdb, $minszdb, $minijdb, $minvbdb) {
        $nbdb = 0;
        $szdb = 0;
        $ijdb = 0;
        $vbdb = 0;
        for ($i = 0; $i < mb_strlen($angolszo); $i++) {
            if (is_int(mb_strpos(NB, $angolszo[$i]))) {
                $nbdb++;
            } else
            if (is_int(mb_strpos(SZ, $angolszo[$i]))) {
                $szdb++;
            } else
            if (is_int(mb_strpos(IJ, $angolszo[$i]))) {
                $ijdb++;
            } else
            if (is_int(mb_strpos(VB, $angolszo[$i]))) {
                $vbdb++;
            }
        }
        return $nbdb > $minnbdb || $szdb > $minszdb || $ijdb > $minijdb || $vbdb > $minvbdb;
   }
   
   function keresoSzoEll($szo, $minszdb, $minijdb) {
        $szdb = 0;
        $ijdb = 0;
        for ($i = 0; $i < mb_strlen($szo); $i++) {
            if (is_int(mb_strpos(SZ, $szo[$i]))) {
                $szdb++;
            } else
            if (is_int(mb_strpos(IJ, $szo[$i]))) {
                $ijdb++;
            }
        }
        return $szdb > $minszdb || $ijdb > $minijdb;
    }
   
?>


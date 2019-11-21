<?php 
    include "head.php";
    include "func_and_IFs.php";
    $file_fop="fop_data.dat";
    $file_fpc="fpc_data.dat";

        if(isset($_GET['button1'])) { 
            fileCheck($file_fpc);
            
        } 

        if(isset($_GET['button2'])) { 
            fileCheck($file_fop);
            
        } 

        if(isset($_GET['button3'])) { 
            fileDel($file_fpc);
            
        } 

        if(isset($_GET['button4'])) { 
            fileDel($file_fop);
            
        } 

        if(isset($_GET['button5'])) { 
            fpcAlgorithm("", "", $file_fpc);
            echo($file_fpc." has been cleaned");
            
        } 

        if(isset($_GET['button6'])) { 
            fopAlgorithm("", "", $file_fop);
            echo($file_fpc." has been cleaned");
            
        } 
                

    include "footer.php";
?>
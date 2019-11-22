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
            if (file_exists($file_fpc) == TRUE){
                fpcAlgorithm("", "", $file_fpc);
                echo($file_fpc." has been cleaned");
            } else {
                echo ($file_fpc." cannot be cleaned becouse it does not exist");
            }
        } 

        if(isset($_GET['button6'])) { 
            if (file_exists($file_fop) == TRUE){
                fpcAlgorithm("", "", $file_fop);
                echo($file_fop." has been cleaned");
            } else {
                echo ($file_fop." cannot be cleaned becouse it does not exist");
            }
        } 

        if(isset($_GET['button7'])) { 
            if (file_exists($file_fpc) == TRUE){
                if (filesize($file_fpc) === 0) {
                    echo ($file_fpc." is empty");
                } else {
                    header("Location: /fpc_reader.php");
                    die ();
                }   
            } else {
                echo ($file_fpc." cannot be readed becouse it does not exist");
            }
        } 

        if(isset($_GET['button8'])) { 
            if (file_exists($file_fop) == TRUE){
                if (filesize($file_fop) === 0) {
                    echo ($file_fop." is empty");
                } else {
                    header("Location: /fop_reader.php");
                    die();
                }   
            } else {
                echo ($file_fop." cannot be readed becouse it does not exist");
            }
        }
                

    include "footer.php";
?>
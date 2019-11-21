<?php
    include "head.php";
    $file_fop = "fop_data.dat";
    $words_devider="**|||";

    $fop = fopen($file_fop, "r");
    $string = fread($fop, filesize("fop_data.dat"));
    fclose($fop);
    $string = explode($words_devider, $string);
    
    $form = [
            "title" => "Title",
            "sdesc" => "Short Description",
            "desc" => "Description",
            "minprice" => "Min. price",
            "minstay" => "Min. stay",
            "maxstay" => "Max. stay",
            "cancelpolicy" => "Cancelation policy",
            "network" => "Network",
            "password" => "Password",
            "mail" => "Email",
            "phone" => "Phone",
    ];
?>



<div class="container col-7">
    <div>
        <h1>
            FOP Reader
        </h1>
    </div>
    <table class="table table-striped">
        <tbody>
            <?php
                $i = 0;
                foreach ($form as $key) {
            ?>
                <tr>
                <th class="w-50 text-left" scope="row"><?=$key;?></th>
                <td><?=$string[$i]; $i += 1;?></td>
                </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
    <div class = "d-flex justify-center">
        <!--<a href="http://pt-7.khomyart.com/" >
            <button type="button" class="btn btn-primary">Back to form</button>
        </a>
        -->
        <a href="http://pt-7.khomyart.com/fpc_reader.php" >
            <button type="button" class="btn btn-primary">Go to "fpc_reader.php"</button>
        </a>
    </div>
</div>



<?php
    include "footer.php";
?>


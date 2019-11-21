<?php
    include "head.php";
    $words_devider="**|||";
    $string = file_get_contents("fpc_data.dat");
    $string = explode ($words_devider, $string);
    
    //$headers = ["Description", "Restrictions", "Wi-fi", "Owner data"];

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

    if ($string[6] === "1") {$string[6]="Full refund 1 day prior to arrival, except fees";}
    if ($string[6] === "3") {$string[6]="Full refund 5 days prior to arrival, except fees";}
    if ($string[6] === "11") {$string[6]="Strict Non Refundable";}
    if ($string[6] === "21") {$string[6]="Partially Refundable";}
    if ($string[6] === "22") {$string[6]="Partially Refundable 14 Days prior";}
?>

<div class="container col-6">
    <div>
        <h1>
            FPC Reader
        </h1>
    </div>
    <table class="table table-striped">
        <tbody>
            <?php
                $i = 0;
                foreach ($form as $key) {
            ?>
                <tr>
                <th class="w-25 text-left" scope="row"><?=$key;?></th>
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
        <a href="http://pt-7.khomyart.com/fop_reader.php" >
            <button type="button" class="btn btn-primary">Go to "fop_reader.php"</button>
        </a>
    </div>
</div>




<?php
    include "footer.php";
?>


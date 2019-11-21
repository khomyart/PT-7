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
?>

<div class="container col-7">
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
                <th sclass="w-50 text-left" scope="row"><?=$key;?></th>
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


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

<div class="container col-5">
    <table class="table table-striped">
        <tbody>
            <?php
                $i = 0;
                foreach ($form as $key) {
            ?>
                <tr>
                <th class="w-40 text-left" scope="row"><?=$key;?></th>
                <td><?=$string[$i]; $i += 1;?></td>
                </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
</div>

<?php
    include "footer.php";
?>


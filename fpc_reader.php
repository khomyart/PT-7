<?php
    include "header.php";

    $words_devider="**|||";
    $string = file_get_contents("fpc_data.dat");
    $string = explode ($words_devider, $string);

    var_dump($string);

    include "footer.php";
    
    $headers = ["Description", "Restrictions", "Wi-fi", "Owner data"];

    $description = [
        "title" => "Title",
        "sdesc" => "Short Description",
        "desc" => "Description"
    ];

    $restrictions = [
        "minprice" => "Min. price",
        "minstay" => "Min. stay",
        "maxstay" => "Max. stay",
        "cancelpolicy" => "Cancelation policy"
    ];

    $wifi = [
        "network" => "Network",
        "password" => "Password"
    ];

    $ownerdata = [
        "mail" => "Email",
        "phone" => "Phone"
    ]
    
?>
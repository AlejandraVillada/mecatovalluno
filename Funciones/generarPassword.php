<?php
    $opciones = [
        'cost' => 12,
    ];
    $pass = $_GET["pass"];
    // echo "<p>".$_GET["pass"]."</p>";
    $passwordHashed = password_hash($pass, PASSWORD_BCRYPT, $opciones);

    echo json_encode($passwordHashed);
    // echo "<p>".$passwordHashed."</p>";
    
?>

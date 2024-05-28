<?php
/*
    $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS);
    $pass = filter_input(INPUT_POST,"pass",FILTER_SANITIZE_SPECIAL_CHARS);
    $senha = 'abc';
    $options = [
        'cost' => 12,
    ];
    $finalpass = password_hash($pass, PASSWORD_DEFAULT,$options);
    $finalsenha = password_hash($senha, PASSWORD_DEFAULT,$options);
    echo $finalpass;
    echo ' ';
    echo $finalsenha;
    echo ' ';
    if(password_verify($finalpass,$senha)){
        echo 'iguais';
    }else{
        echo 'diferentes';
    }
*/
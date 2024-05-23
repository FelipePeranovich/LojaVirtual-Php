<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function conectar(){
    $user ='root';
    $pass ="";
    $dns="mysql:host=localhost;dbname=atletashop";
    $connection = new PDO($dns,$user,$pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $connection;
}

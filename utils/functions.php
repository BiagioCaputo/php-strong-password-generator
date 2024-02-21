<?php 

//funzione che genera una password casuale di caratteri, numeri e simboli con length pari a quella data come parametro
function getRandomPassword($length) 
{
    $password = '';
    $prints = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!?~@#-_+<>[]{}';
    for ($i = 0; $i < $length; $i++) {
        $randomPrintIndex = rand(0, strlen($prints) - 1);
        $password .= $prints[$randomPrintIndex];
    }
    return $password;
}
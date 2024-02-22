<?php 

//funzione che genera una password casuale di caratteri, numeri e simboli con length pari a quella data come parametro
function getRandomPassword($length, $duplicates_allowed, $allowed_characters) 
{
    $letters = 'abcdefghijklmnopqrstuvwxyz';
    $numbers = '0123456789';
    $symbols = '!?~@#-_+<>[]{}';

    $characters = '';
    if(in_array('L', $allowed_characters)) $characters .= $letters .strtoupper($letters);
    if(in_array('N', $allowed_characters)) $characters .= $numbers;
    if(in_array('S', $allowed_characters)) $characters .= $symbols;

    
    $total_characters = mb_strlen($characters);

    $min_length = 5;

    $password = '';

    if(empty($allowed_characters)) return 'Almeno un set di caratteri deve essere autorizzato';

    if(empty($length)) return 'Non è stata inserita alcuna lunghezza';
    if(!is_numeric($length) || $length < 0 ) return 'la lunghezza inserita non è valida';
    if($length < $min_length) return 'la lunghezza non può essere inferiore a' . $min_length;

    if($duplicates_allowed === false && $length > $total_characters){
        return 'la lunghezza massima della password senza duplicati è ' . $total_characters;
    }
    
   
    while(mb_strlen($password) < $length){
        $random_index = rand(0, $total_characters - 1);
    
        $random_character = $characters [$random_index];
        if($duplicates_allowed || !str_contains($password, $random_character)){
            $password .= $random_character;
        }
    }
    
    session_start();
    $_SESSION['password'] = $password; 

    return false;
}
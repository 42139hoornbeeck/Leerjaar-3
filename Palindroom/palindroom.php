<?php

// $word = Readline("Vul een woord in: ");

// $wordfixed = strrev($word);

// if($word == $wordfixed){
//     print('goed');
// } else {
//     print('fout');
// }


function Palindrome($string){ 
    if (strrev($string) == $string){ 
        return true; 
    }
    else{
        return false;
    }
} 
 
$array = array('zes', 'trein', 'auto', 'droomoord', 'twee', 'kajak', 'lepel', 'huis', 'school', 'madam', 'php', 'schoof', 'raket', 'meetsysteem', 'twaalf', 'zeven', 'negen', 'fiets', 'kar', 'nemen', 'nichten', 'neven', 'oom', 'tante', 'neef', 'racecar', 'radar', 'actie', 'redder', 'plan', 'rotor', 'taak');
foreach($array as $p) {
    if(Palindrome($p)){ 
        echo "$p is een palindrome <br>"; 
    }
}
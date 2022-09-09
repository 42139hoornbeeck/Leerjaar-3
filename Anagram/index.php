<?php
print("Keuze 1: Check of 2 woorden een anagram zijn \n");
print("Keuze 2: Bekijk alle anagrammen van een woord \n");

$keuze = readline('Welke keuze maak je: ');

switch ($keuze) {
  case "1":
    
    $word1 = readline('Vul woord één in: ');
    $word2 = readline('Vul woord twee in: ');

    print_r(twoWords($word1, $word2)."\n");

    break;
  case "2":

    textFile();

    break;
  default:
    echo "Maak een geldige keuze";
}


function twoWords($a, $b)
 {
       if (count_chars($a, 1) == count_chars($b, 1))
    {
        return "De woorden zijn een anagram";
    }
    else
    {
        return "De woorden zijn geen anagram";
    }
 }

function textFile(){

    $word = readline('Kies een woord: ');

    $anograms = [];
    $words = preg_split('/\r\n|\r|\n/', file_get_contents("woorden.txt"));

    foreach ($words as $num => $line) {
        if(count_chars($word, 1) == count_chars($line, 1)){
            array_push($anograms,$line);
        }
    }
    print("Alle anagrammen voor:" .  $word) . "\n\n";
    print_r($anograms);
    }   
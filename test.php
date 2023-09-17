<?php
// $users1 = ["John" => "qwerty", "Nicole" => "asdf", "Mark" => "ww"];
// $users2 = ["Joan" => "1234", "Mark" => "poiu", "Nicole" => "ggg"];

// // $users = $users1 + $users2;

// $users = array_merge_recursive($users1, $users2);
// $keys = array_intersect_key($users1, $users2);
// $repeatUsers = array_intersect_key($users, $keys);
// $no_repeatUsers1 = array_diff_key($users1, $users2);
// $no_repeatUsers2 = array_diff_key($users2, $users1);
// $no_repeatUsersFull = array_merge($no_repeatUsers1, $no_repeatUsers2);

// print_r($repeatUsers);
// print_r($no_repeatUsersFull);

// $array1  = ["color"  =>  "red" ,  2 ,  4 ];  
// $array2  = ["a" ,  "b" ,  "color"  =>  "green" ,  "shape"  =>  "trapezoid" ,  4 ];  
// $result  =  array_merge ( $array1 ,  $array2 ); 
// print_r ( $result );

// $array1 = array( "a" => "green" , "red" , "blue" ); 
// $array2 = array( "b" => "green" , "yellow" , "red" ); 
// $result = array_intersect ( $array1 , $array2 ); 
// print_r ( $result );

// $reversed = array_reverse($result);
// print_r ( $reversed );

$persons = ["Иванов", "Петров", "Сидорова","Васильев", "Михайлов", "Джоан Роулінг", "Агата Крісті"];
$triples = array_chunk($persons, 2); // делим массив на подмассивы по три элемента
print_r($triples);
foreach ($triples as $k => $table) { // выводит полученные тройки
  echo "В группе $k : \n";
  foreach ($table as $pers) 
    echo " \n$pers";
   echo "\n";
 }
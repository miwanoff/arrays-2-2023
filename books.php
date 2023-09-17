<?php

$books = ["Володар кілець" => ["Толкіен", 1954],
    "Гаррі Поттер та таємна кімната" => ["Джоан Роулінг", 1998],
    "Пригоди Шерлока Холмса" => ["Конан Дойл", 1892],
    "Зло під сонцем" => ["Агата Крісті", 1941],
];

ksort($books);
print_r($books);

function cmp($a, $b)
{ // callback-функція, яка визначає спосіб сортування (по рокам)
    if ($a[1] > $b[1]) {
        return -1;
    } elseif ($a[1] == $b[1]) {
        return 0;
    } else {
        return 1;
    }
    // return ($a[1] <=> $b[1]);
}

uasort($books, "cmp"); // сортуємо масив за допомогою функції cmp
foreach ($books as $key => $book) { // виводимо масив
    echo "$book[0]: \"$key\", $book[1]\n";
}

function try_walk($val, $key, $data)
{  
  echo "<p>$data \"$key\" , автор $val[0] рік $val[1]</p>\n"; 
  //print_r();
}

array_walk($books, "try_walk", "Книга");
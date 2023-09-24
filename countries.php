<?php

$countries = [["name" => "France",
    "capital" => "Paris",
    "area" => 640679,
    "population" => [
        "2000" => 59278000,
        "2010" => 59278000,
    ],
],
    [
        "name" => "England",
        "capital" => "London",
        "area" => 130395,
        "population" => [
            "2000" => 58800000,
            "2010" => 63200000,
        ],
    ],
    [
        "name" => "Deutschland",
        "capital" => "Berlin",
        "area" => 357021,
        "population" => [
            "2000" => 82260000,
            "2010" => 81752000,
        ],
    ],
];

echo "{$countries[0]['name']} : {$countries[0]['population']['2010']}\n";

foreach ($countries as $country) {
    foreach ($country as $key => $value) {
        if (!is_array($value)) {
            echo "$key: $value; ";
        } else {
            echo "$key: ";
            foreach ($value as $k => $v) {
                echo "[$k - $v]";
            }

        }
    }
    echo ";\n";
}

function cmp_capital($a, $b)
{ // функция, определяющая способ сортировки (по названию столицы)
    if ($a["capital"] < $b["capital"]) {
        return -1;
    } elseif ($a["capital"] == $b["capital"]) {
        return 0;
    } else {
        return 1;
    }

}

function cmp_name($a, $b)
{ // функция, определяющая способ сортировки (по названию столицы)
    if ($a["name"] < $b["name"]) {
        return -1;
    } elseif ($a["name"] == $b["name"]) {
        return 0;
    } else {
        return 1;
    }

}

function cmp_population_2000($a, $b)
{ // функция, определяющая способ сортировки (по населению)
    if ($a["population"]["2000"] < $b["population"]["2000"]) {
        return -1;
    } elseif ($a["population"]["2000"] == $b["population"]["2000"]) {
        return 0;
    } else {
        return 1;
    }

}

function cmp_population($a, $b)
{ // функция, определяющая способ сортировки (по сумме населения за 2000 и за 2010 годы)
    if ($a["population"]["2000"] + $a["population"]["2010"] < $b["population"]["2000"] + $b["population"]["2010"]) {
        return -1;
    } elseif ($a["population"]["2000"] + $a["population"]["2010"] == $b["population"]["2000"] + $b["population"]["2010"]) {
        return 0;
    } else {
        return 1;
    }

}

// uasort($countries,"cmp_capital");

// print_r($countries);

uasort($countries, "cmp_population");

//print_r($countries);

function try_walk($country, $key_country, $data)
{
    static $i = 1; // статическая глобальная переменная-счетчик
    echo $data . $i . " ";
    foreach ($country as $key => $value) {
        if (!is_array($value)) {
            echo "$key:$value\t";
        } else {
            echo "$key: ";
            foreach ($value as $k => $v) {
                echo "[{$k} год. - $v] ";
            }

        }
    }
    echo "\n";
    $i++;
}

echo "№  Назва\tСтолиця\t\tПлоща\t\tНаселення\n";
array_walk($countries, "try_walk", "№");


function search($countries, $data) {
    $result = [];
    foreach ($countries as $country_number => $country) {
        foreach ($country as $key => $value) {
            if (!is_array($value)) {
                if (stristr($value, $data)) {
                    $result[] = $country_number;
                }
            } else {
                foreach ($value as $k => $v) {
                    if (stristr($v, $data) || strstr($k, $data)) {
                        $result[] = $country_number;
                    }
                }
            }
        }
    }
    return array_unique($result);
}

print_r(search($countries, "land"));

$seach_result = array_flip(search($countries, "8000"));
print_r($seach_result);

$countries_seach_result = array_intersect_key($countries, $seach_result);

print_r($countries_seach_result);

array_walk($countries_seach_result, "try_walk", "№");
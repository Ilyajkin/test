<?php

for ($i = 1; $i <= 100; $i++) {
    $array[$i] = rand(0, 50);
}

$counter = 0;
print_r($array);
for ($i = 1; $i < 100; $i++) {
    if ($array[$i] == $array[$i + 1]) {
        $counter++;
    }
}
echo $counter;


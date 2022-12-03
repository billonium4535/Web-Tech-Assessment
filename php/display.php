<?php


$file = fopen("../csv/publications.csv", "r");

if (!$file) {
    return null;
}

//while (($data = fgetcsv($file)) !== FALSE) {
//    if $data
//    echo "<tr>";
//    echo "<td>" . $data[0] . "</td>";
//    echo "<td>" . $data[1] . "</td>";
//    echo "<td>" . $data[2] . "</td>";
//    echo "<td>" . $data[3] . "</td>";
//    echo "<td>" . $data[4] . "</td>";
//    echo "<td>" . $data[5] . "</td>";
//    echo "</tr>";
//}

fclose($file);

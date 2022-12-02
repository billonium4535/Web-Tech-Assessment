<?php

$file = fopen("../csv/publications.csv", "r");

if (!$file) {
    return null;
}

echo "<table>";

while (($data = fgetcsv($file)) !== FALSE) {
    echo "<tr>";
    echo "<td>" . $data[0] . "</td>";
    echo "<td>" . $data[1] . "</td>";
    echo "<td>" . $data[2] . "</td>";
    echo "<td>" . $data[3] . "</td>";
    echo "<td>" . $data[4] . "</td>";
    echo "<td>" . $data[5] . "</td>";
    echo "</tr>";
}

echo "</table>";

fclose($file);

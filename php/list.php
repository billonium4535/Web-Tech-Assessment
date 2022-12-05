<?php

$file = fopen("../csv/publications.csv", "r");

if (!$file) {
    return null;
}

echo "<table>";

$data = fgetcsv($file);
echo "<tr>";
echo "<td>" . $data[1] . "</td>";
echo "<td>" . $data[2] . "</td>";
echo "<td>" . $data[3] . "</td>";
echo "<td>" . $data[4] . "</td>";
echo "<td>" . $data[5] . "</td>";
echo "<td>" . $data[6] . "</td>";
echo "<td>" . "<a style='color: aliceblue'>View Record</a>" . "</td>";
echo "</tr>";

while (($data = fgetcsv($file)) !== FALSE) {
    echo "<tr>";
    echo "<td>" . $data[1] . "</td>";
    echo "<td>" . $data[2] . "</td>";
    echo "<td>" . $data[3] . "</td>";
    echo "<td>" . $data[4] . "</td>";
    echo "<td>" . $data[5] . "</td>";
    echo "<td>" . $data[6] . "</td>";
    echo "<td>" . "<a href='../html/display.html?data=$data[0]' style='color: aliceblue'>View Record $data[0]</a>" . "</td>";
    echo "</tr>";
}

echo "</table>";

fclose($file);

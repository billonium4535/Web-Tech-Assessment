<?php

$selectFile = fopen("../csv/publications.csv", "r");

echo '<form id="Record" method="post">';
echo '<select name="selectRecord">';

$data = fgetcsv($selectFile);
while (($data = fgetcsv($selectFile)) !== FALSE) {
    echo '<option value=' . $data[0] . '>' . $data[0] . '</option>';
}
echo '</select>';
echo '<input type="submit" name="Submit" value="Submit">';
echo '</form>';
echo "<br><br>";

if(isset($_POST['selectRecord'])) {
    $result = $_POST['selectRecord'];
}


$file = file("../csv/publications.csv");


if (empty($_GET)) {
    $result = $_POST['selectRecord'];
} else {
    $result = $_GET['data'];


    $getTable = (string)($file[0]);
    $listTable = explode(",", $getTable);

    echo "<tr>";
    echo "<td>" . $listTable[0] . "</td>";
    echo "<td>" . $listTable[1] . "</td>";
    echo "<td>" . $listTable[2] . "</td>";
    echo "<td>" . $listTable[3] . "</td>";
    echo "<td>" . $listTable[4] . "</td>";
    echo "<td>" . $listTable[5] . "</td>";
    echo "<td>" . $listTable[6] . "</td>";
    echo "</tr>";
}

$rawFileData = (string)($file[$result + 1]);
$data = explode(",", $rawFileData);

echo "<tr>";
echo "<td>" . $data[0] . "</td>";
echo "<td>" . $data[1] . "</td>";
echo "<td>" . $data[2] . "</td>";
echo "<td>" . $data[3] . "</td>";
echo "<td>" . $data[4] . "</td>";
echo "<td>" . $data[5] . "</td>";
echo "<td>" . $data[6] . "</td>";
echo "</tr>";


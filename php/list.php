<!-- list.php is a file to list all of the publications to the user -->

<?php

// Opens the csv file and stores it in a variable
$file = fopen("../csv/publications.csv", "r");

if (!$file) {
    return null;
}

echo "<table>";

// Displays the headings for the columns
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

// Reads and displays all of the publications
while (($data = fgetcsv($file)) !== FALSE) {
    echo "<tr>";
    echo "<td>" . $data[1] . "</td>";
    echo "<td>" . $data[2] . "</td>";
    echo "<td>" . $data[3] . "</td>";
    echo "<td>" . $data[4] . "</td>";
    echo "<td>" . $data[5] . "</td>";
    echo "<td>" . $data[6] . "</td>";
    // Sets a link to the display file and adds a data attribute to display the correct publication
    echo "<td>" . "<a href='../html/display.html?data=$data[0]' style='color: aliceblue'>View Record $data[0]</a>" . "</td>";
    echo "</tr>";
}

echo "</table>";

fclose($file);

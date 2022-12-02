<?php

$nameErr = $authorsErr = $yearErr = $journalErr = $doiErr = $schoolNameErr = "";
$name = $authors = $year = $journal = $doi = $schoolName = "";
$userOutput = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [];

    if (empty($_POST["name"])) {
        $nameErr = "Field is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Invalid name";
        } else {
            $data[0] = $name;
        }
    }

    if (empty($_POST["authors"])) {
        $authorsErr = "Field is required";
    } else {
        $authors = test_input($_POST["authors"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$authors)) {
            $authorsErr = "Invalid name";
        } else {
            $data[1] = $authors;
        }
    }

    if (empty($_POST["year"])) {
        $yearErr = "Field is required";
    } else {
        $year = test_input($_POST["year"]);
        if (!filter_var($year, FILTER_VALIDATE_INT, array("options" => array("min_range"=>1000, "max_range"=>date("Y"))))) {
            $yearErr = "Invalid year";
        } else {
            $data[2] = $year;
        }
    }

    if (empty($_POST["journal"])) {
        $journalErr = "Field is required";
    } else {
        $journal = test_input($_POST["journal"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$journal)) {
            $journalErr = "Invalid name";
        } else {
            $data[3] = $journal;
        }
    }

    if (empty($_POST["doi"])) {
        $doiErr = "Field is required";
    } else {
        $doi = test_input($_POST["doi"]);
        $data[4] = $doi;
    }

    if (empty($_POST["schoolName"])) {
        $schoolNameErr = "Field is required";
    } else {
        $schoolName = test_input($_POST["schoolName"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$schoolName)) {
            $schoolNameErr = "Invalid name";
        } else {
            $data[5] = $schoolName;
        }
    }

    if (count($data) == 6) {
        $f= fopen("../csv/publications.csv", "a");
        if ($f === false) {
            die("Error opening file");
        }
        fputcsv($f, $data);
        fclose($f);
        $nameErr = $authorsErr = $yearErr = $journalErr = $doiErr = $schoolNameErr = "";
        $name = $authors = $year = $journal = $doi = $schoolName = "";
        $userOutput = "Your data has been submitted";
    } else {
        $userOutput = "Some of your values were invalid";
    }
}

function test_input($data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

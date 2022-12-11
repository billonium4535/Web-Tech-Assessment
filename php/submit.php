<!-- submit.php is a file to submit new publications -->

<?php

// Sets local variables to ""
$nameErr = $authorsErr = $yearErr = $journalErr = $doiErr = $schoolNameErr = "";
$name = $authors = $year = $journal = $doi = $schoolName = "";
$userOutput = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Initialize arrays
    $data = [];
    $lastIDArray = [];

    // Reads in the publications data
    $file = file("../csv/publications.csv");
    $rawFileData = (string) ($file[count($file)-1]);
    $lastIDArray = explode(",", $rawFileData);

    // Gets the last ID
    $data[0] = ((int) $lastIDArray[0]) + 1;

    // Checks if the user has entered a valid name and if not displays an error message
    // If they have it adds the name to the data to be submitted
    if (empty($_POST["name"])) {
        $nameErr = "Field is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Invalid name";
        } else {
            $data[1] = $name;
        }
    }

    // Checks if the user has entered a valid author and if not displays an error message
    // If they have it adds the author to the data to be submitted
    if (empty($_POST["authors"])) {
        $authorsErr = "Field is required";
    } else {
        $authors = test_input($_POST["authors"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$authors)) {
            $authorsErr = "Invalid name";
        } else {
            $data[2] = $authors;
        }
    }

    // Checks if the user has entered a valid year and if not displays an error message
    // If they have it adds the year to the data to be submitted
    if (empty($_POST["year"])) {
        $yearErr = "Field is required";
    } else {
        $year = test_input($_POST["year"]);
        if (!filter_var($year, FILTER_VALIDATE_INT, array("options" => array("min_range"=>1000, "max_range"=>date("Y"))))) {
            $yearErr = "Invalid year";
        } else {
            $data[3] = $year;
        }
    }

    // Checks if the user has entered a valid journal and if not displays an error message
    // If they have it adds the journal to the data to be submitted
    if (empty($_POST["journal"])) {
        $journalErr = "Field is required";
    } else {
        $journal = test_input($_POST["journal"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$journal)) {
            $journalErr = "Invalid name";
        } else {
            $data[4] = $journal;
        }
    }

    // Checks if the user has entered a valid doi and if not displays an error message
    // If they have it adds the doi to the data to be submitted
    if (empty($_POST["doi"])) {
        $doiErr = "Field is required";
    } else {
        $doi = test_input($_POST["doi"]);
        $data[5] = $doi;
    }

    // Checks if the user has entered a valid school name and if not displays an error message
    // If they have it adds the school name to the data to be submitted
    if (empty($_POST["schoolName"])) {
        $schoolNameErr = "Field is required";
    } else {
        $schoolName = test_input($_POST["schoolName"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$schoolName)) {
            $schoolNameErr = "Invalid name";
        } else {
            $data[6] = $schoolName;
        }
    }

    // If all the information was valid, it adds it to the csv file
    if (count($data) == 7) {
        $f= fopen("../csv/publications.csv", "a");
        if ($f === false) {
            die("Error opening file");
        }
        fputcsv($f, $data);
        fclose($f);
        $nameErr = $authorsErr = $yearErr = $journalErr = $doiErr = $schoolNameErr = "";
        $name = $authors = $year = $journal = $doi = $schoolName = "";
        $data = [];
        $userOutput = "Your data has been submitted";
    } else {
        $userOutput = "Some of your values were invalid";
    }
}

// Removes spaces from the beginning and end of the data
// Removes backslashes from the data
function test_input($data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

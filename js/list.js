// list.js is used to update the list of publications

// A function to update the table with new publications
function updateTable() {

    // Sets the last time the table was updated
    document.getElementById('lastUpdated').innerHTML=Date()

    // Uses xhttp to update the list of publications without refreshing the page
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("publicationGraph").innerHTML = this.responseText;
        }
    };

    // Sends the update
    xhttp.open("GET", '<?php include("../php/list.php");?>', true);
    xhttp.send();
}

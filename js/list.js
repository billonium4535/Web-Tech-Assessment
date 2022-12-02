function updateTable() {
    document.getElementById('lastUpdated').innerHTML=Date()
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("publicationGraph").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", '<?php include("../php/list.php");?>', true);
    xhttp.send();
}

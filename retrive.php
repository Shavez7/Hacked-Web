<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable Website Demonstration</title>
    <link rel="stylesheet" href="Style/home.css">
</head>
<body>
<header>
    <h1>Student Management System</h1>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="#">Student info</a></li>
            <li><a href="#">Courses</a></li>
            <li><a href="#">Announcement</a></li>
            <li><a href="#">About Us</a></li>
        </ul>
    </nav>
</header>

<div class="container">
    <h2>Retrive Student</h2>
    <p>Showing details of all student: </p>
    <div id="table-container"></div>
</div>
<footer>
    <p>&copy; Student Management System</p>
</footer>
</body>
</html>

<script>
        // Create a function to fetch the data from the PHP server
    function fetchData() {
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Set the request method and URL
        xhr.open("GET", "data.php", true);

        // Set the request headers
        xhr.setRequestHeader("Content-Type", "application/json");

        // Send the request
        xhr.send();

        // Handle the response
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Parse the JSON data
                var data = JSON.parse(xhr.responseText);

                // Create a table element
                var table = document.createElement("table");
                table.border = "1";

                // Create a table header row
                var headerRow = document.createElement("tr");
                headerRow.innerHTML = "<th>username</th><th>roll no</th><th>email id</th><th>phone no</th>";
                table.appendChild(headerRow);

                // Create table rows and cells
                for (var i = 0; i < data.length; i++) {
                    var row = document.createElement("tr");
                    row.innerHTML = "<td>" + data[i].username + "</td><td>" + data[i].rollno + "</td><td>" + data[i].emailid + "</td><td>" + data[i].phoneno + "</td><td>" + data[i].column5 + "</td>";
                    table.appendChild(row);
                }

                // Add the table to the HTML page
                document.getElementById("table-container").appendChild(table);
            } else {
                console.error("Error fetching data:", xhr.statusText);
            }
        };
    }

    // Call the function to fetch the data
    fetchData();
</script>

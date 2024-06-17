

<?php
    require_once("connection/connect.php");
    $sql = "SELECT * FROM user1";
    $result = mysqli_query($conn, $sql);
    
    // Fetch data as associative array
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    // Return data as JSON
    echo json_encode($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX Example</title>
</head>
<body>
    <button onclick="getData()">Get Data</button>
    <div id="dataContainer"></div>

    <script>
        function getData() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'getData.php', true);

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    var data = JSON.parse(xhr.responseText);
                    displayData(data);
                } else {
                    console.error('Request failed with status:', xhr.status);
                }
            };

            xhr.send();
        }

        function displayData(data) {
            var container = document.getElementById('dataContainer');
            container.innerHTML = ''; // Clear previous data

            data.forEach(function(row) {
                var div = document.createElement('div');
                div.textContent = row.name + ' - ' + row.email;
                container.appendChild(div);
            });
        }
    </script>
</body>
</html>

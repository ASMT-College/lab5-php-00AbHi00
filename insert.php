<?php
include("connection/connect.php");

$user_name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["Password"];

echo("<br/>Name => ".$user_name);
echo("<br/>Email => ".$email);
echo("<br/>Password => ".$password);

$sql = "INSERT INTO user1(name, pw, email) VALUES ('$user_name','$password','$email')";

if (mysqli_query($conn, $sql)) {
    echo "<br/> Record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


$selectresult = mysqli_query($conn, $sql);

if ($selectresult) {
    $row = mysqli_fetch_assoc($selectresult);
    $count = $row['count'];
    if ($count > 0) {
        echo "Email already exists in the database.";
    } else {
        echo "Email does not exist in the database.";
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);

?>

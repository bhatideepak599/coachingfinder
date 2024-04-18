<?php
include 'connection.php';

echo $_POST['selectedValues'];

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $coaching_location = $_POST['selectedValues'];
    echo "Coaching Location: " . $coaching_location . "<br>";
    $sql = "SELECT * FROM my_table1 WHERE city = '$coaching_location'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      
        while ($row = mysqli_fetch_assoc($result)) {
           
            echo "ID: " . $row["id"] . "<br>";
            echo "Name: " . $row["course"] . "<br>";
            echo "City: " . $row["city"] . "<br>";
            echo "<hr>"; 
        }
    } else {
        echo "0 results";
    }
}
?>

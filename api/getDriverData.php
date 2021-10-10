<?php

$response = array();

require __DIR__ . '/config.php';

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

if (isset($_GET["lisense_no"])){
    $lisense_no = $_GET["lisense_no"];
    $result = mysqli_query($db, "SELECT first_name, middle_name, last_name, email, licence_no FROM drivers_drivers WHERE driver_status = 'current' and licence_no = $lisense_no");
    if(!empty($result)){
        while($row = mysqli_fetch_array($result)){
            $driver = array();

            $driver["first_name"] = $row["first_name"];
            $driver["middle_name"] = $row["middle_name"];
            $driver["last_name"] = $row["last_name"];
            $driver["email"] = $row["email"];
            $driver["licence_no"] = $row["licence_no"];

            $response["success"] = 1;

            $response["driver"] = array();

            array_push($response["driver"], $driver);

            echo json_encode($response);
        }
    } else {
        $response["success"] = 0;
        $response["message"] = "Invalid Lisense Number";

        echo json_encode($response);
    }
} else {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    echo json_encode($response);
}

?>

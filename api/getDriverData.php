<?php

$response = array();

require_once __DIR__ . '/connect.php';

$db = new DB_CONNECT();

if (isset($_GET["lisense_no"])){
    $lisense_no = $_GET["lisense_no"];

    $result = $db->query("SELECT first_name, middle_name, last_name, email, lisense_no FROM drivers_drivers WHERE driver_status = 'current' and lisense_no = $lisense_no");

    if(!empty($result)){
        while($row = $result->fetch_assoc()){
            $driver = array();

            $driver["first_name"] = $row["first_name"];
            $driver["middle_name"] = $row["middle_name"];
            $driver["last_name"] = $row["last_name"];
            $driver["email"] = $row["email"];
            $driver["lisense_no"] = $row["lisense_no"];

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
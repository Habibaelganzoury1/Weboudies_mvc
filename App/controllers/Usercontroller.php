<?php
include_once "../db/dbh.inc.php";

function insertUser()
{
    global $connection;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user_type = 1;
        $name = htmlspecialchars($_POST["Full_Name"]);
        $email = htmlspecialchars($_POST["mail"]);
        $address = htmlspecialchars($_POST["Address"]);
        $password = htmlspecialchars($_POST["Password"]);
        $phone = htmlspecialchars($_POST["Phone"]);

        $sqlCheck = "SELECT * FROM user WHERE mail='$email'";
        $result = $connection->query($sqlCheck);

        if ($result->num_rows > 0) {
            echo "User Already Exists";
        } else {
            $sql = "INSERT INTO user (user_type, name, mail, address, password, Phone) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("isssss", $user_type, $name, $email, $address, $password, $phone);

            if ($stmt->execute()) {
                header("Location:../view/index.php");
            } else {
                echo "Error: " . $connection->error;
            }
            $stmt->close();
        }
    }
}

function findUser()
{
    global $connection;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();
        $email = htmlspecialchars($_POST["mail"]);
        $password = $_POST["password"];

        $sql = "SELECT * FROM user WHERE mail=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            if ($password == $row['Password']) {
                $_SESSION["ID"] = $row["ID"];
                $_SESSION["Name"] = $row["Name"];
                $_SESSION["Address"] = $row["address"];
                $_SESSION["Password"] = $row["Password"];
                $_SESSION["Phone"] = $row["Phone"];
                $_SESSION["mail"] = $row["mail"];
                var_dump($_SESSION);
                header("Location:../view/profile.php");
            } else {
                echo "Incorrect Password";
            }
        } else {
            echo "User not Found";
        }
        $stmt->close();
    }
}

function updateUser()
{
    global $connection;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();
        $userID = $_SESSION["ID"];

        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["mail"]);
        $address = htmlspecialchars($_POST["address"]);
        $password = htmlspecialchars($_POST["password"]);

        $sql = "UPDATE user SET name=?, mail=?, address=?, password=? WHERE ID=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssssi", $name, $email, $address, $password, $userID);

        if ($stmt->execute()) {
            $_SESSION["Name"] = $name;
            $_SESSION["Address"] = $address;
            $_SESSION["Password"] = $password;
            $_SESSION["mail"] = $email;
            header("Location:../view/profile.php");
        } else {
            echo "Error updating record: " . $connection->error;
        }
        $stmt->close();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["action"])) {
        $action = $_POST["action"];
        if ($action === "InsertUser") {
            insertUser();
        } elseif ($action === "FindUser") {
            findUser();
        } elseif ($action === "UpdateUser") {
            updateUser();
        } else {
            echo "Invalid action";
        }
    }
}
?>
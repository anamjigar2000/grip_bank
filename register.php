<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grip_bank";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables to store user input and error messages
$name = $email = $age = $password = "";
$nameErr = $emailErr = $ageErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $age = test_input($_POST["age"]);
    $password = test_input($_POST["password"]);

    // Check if name is empty
    if (empty($name)) {
        $nameErr = "Name is required";
    }

    // Check if email is empty and valid
    if (empty($email)) {
        $emailErr = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }

    // Check if age is empty and numeric
    if (empty($age)) {
        $ageErr = "Age is required";
    } elseif (!is_numeric($age)) {
        $ageErr = "Age must be a number";
    }

    // Check if password is empty
    if (empty($password)) {
        $passwordErr = "Password is required";
    }

    // If no errors, insert user data into database
    if (empty($nameErr) && empty($emailErr) && empty($ageErr) && empty($passwordErr)) {
        $sql = "INSERT INTO users (name, email, age, password) VALUES ('$name', '$email', '$age', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css.css">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Name: <input type="text" name="name" value="<?php echo $name;?>">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>
        Email: <input type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
        Age: <input type="text" name="age" value="<?php echo $age;?>">
        <span class="error">* <?php echo $ageErr;?></span>
        <br><br>
        Password: <input type="password" name="password" value="<?php echo $password;?>">
        <span class="error">* <?php echo $passwordErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>

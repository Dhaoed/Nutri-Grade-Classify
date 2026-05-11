<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 2</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }

        #result {
            margin-top: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Form Login</h1>

    <?php
    $username = $password = "";
    $usernameErr = $passwordErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validasi username
        if (empty($_POST["username"])) {
            $usernameErr = "<br><br>Username harus diisi";
        } else {
            $username = test_input($_POST["username"]);
            if (strlen($username) > 7) {
                $usernameErr = "<br><br>Username tidak boleh lebih dari tujuh karakter";
            }
        }

        // Validasi password
        if (empty($_POST["password"])) {
            $passwordErr = "Password harus diisi";
        } else {
            $password = test_input($_POST["password"]);
            if (strlen($password) < 10) {
                $passwordErr = "<br><br>Password tidak boleh kurang dari sepuluh karakter";
            } elseif (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[^A-Za-z0-9]/', $password)) {
                $passwordErr = "<br><br>Password harus terdiri dari huruf kapital, huruf kecil, angka, dan karakter khusus";
            }
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="input-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $username; ?>">
            <span class="error"><?php echo $usernameErr; ?></span>
        </div>

        <div class="input-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <span class="error"><?php echo $passwordErr; ?></span>
        </div>

        <input type="submit" name="submit" value="Login">
    </form>

    <?php
    if ($usernameErr == "" && $passwordErr == "" && isset($_POST["submit"])) {
        echo "<h2>Hasil:</h2>";
        echo "<p>Username: $username</p>";
        echo "<p>Password: $password</p>";
    }
    ?>
</body>
</html>

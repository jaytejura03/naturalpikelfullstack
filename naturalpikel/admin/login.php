<?php

session_start();

if (isset($_SESSION["admin_id"])) {
    header("Location: dashboard.php");
    exit;
}



require_once "../config/database.php";
require_once "../includes/functions.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($email === "" || $password === "") {
        $error = "Please enter email and password.";
    } else {

        $stmt = $pdo->prepare("SELECT * FROM admins WHERE email = ? LIMIT 1");

        $stmt->execute([$email]);

        $admin = $stmt->fetch();
        
        if ($admin && password_verify($password, $admin["password"])) {

        $_SESSION["admin_id"] = $admin["id"];
        $_SESSION["admin_name"] = $admin["name"];

        header("Location: dashboard.php");
        exit;

        } else {
            $error = "Invalid email or password.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login | Natural Pickle</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>
<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <h2 class="mb-4 text-center">
                Natural Pickle Admin
            </h2>

            <?php if ($error): ?>

                <div class="alert alert-danger">
                    <?= htmlspecialchars($error) ?>
                </div>

            <?php endif; ?>

            <form method="POST" action="login.php">

                <div class="mb-3">
                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        required
                    >
                </div>

                <button
                    type="submit"
                    class="btn btn-success w-100"
                >
                    Login
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>
<?php
require_once "../includes/auth.php";

require_once "../config/database.php";
require_once "../includes/functions.php";

$message = "";
$error = "";

// Update settings
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $site_name = trim($_POST["site_name"] ?? "");
    $whatsapp = trim($_POST["whatsapp"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $address = trim($_POST["address"] ?? "");

    try {

        $settings = [
            "site_name" => $site_name,
            "whatsapp" => $whatsapp,
            "email" => $email,
            "address" => $address
        ];

        foreach ($settings as $key => $value) {

            $stmt = $pdo->prepare("
                UPDATE settings
                SET setting_value = ?
                WHERE setting_key = ?
            ");

            $stmt->execute([$value, $key]);
        }

        $message = "Settings updated successfully.";

    } catch (PDOException $e) {

        $error = "Unable to update settings.";
    }
}


// Get current settings
$site_name = getSetting("site_name");
$whatsapp = getSetting("whatsapp");
$email = getSetting("email");
$address = getSetting("address");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Settings | Natural Pickle</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Website Settings</h2>

        <a href="dashboard.php" class="btn btn-secondary">
            Dashboard
        </a>

    </div>


    <?php if ($message): ?>

        <div class="alert alert-success">
            <?= htmlspecialchars($message) ?>
        </div>

    <?php endif; ?>


    <?php if ($error): ?>

        <div class="alert alert-danger">
            <?= htmlspecialchars($error) ?>
        </div>

    <?php endif; ?>


    <div class="card shadow-sm">

        <div class="card-body p-4">

            <form method="POST">

                <!-- Site Name -->

                <div class="mb-3">

                    <label class="form-label">
                        Site Name
                    </label>

                    <input
                        type="text"
                        name="site_name"
                        class="form-control"
                        value="<?= htmlspecialchars($site_name) ?>"
                        required
                    >

                </div>


                <!-- WhatsApp -->

                <div class="mb-3">

                    <label class="form-label">
                        WhatsApp Number
                    </label>

                    <input
                        type="text"
                        name="whatsapp"
                        class="form-control"
                        value="<?= htmlspecialchars($whatsapp) ?>"
                    >

                </div>


                <!-- Email -->

                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="<?= htmlspecialchars($email) ?>"
                    >

                </div>


                <!-- Address -->

                <div class="mb-4">

                    <label class="form-label">
                        Address
                    </label>

                    <textarea
                        name="address"
                        class="form-control"
                        rows="3"
                    ><?= htmlspecialchars($address) ?></textarea>

                </div>


                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Save Settings
                </button>

            </form>

        </div>

    </div>

</div>

</body>

</html>
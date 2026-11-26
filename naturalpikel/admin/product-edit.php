<?php
require_once "../includes/auth.php";

require_once "../config/database.php";
require_once "../includes/functions.php";

$id = (int) ($_GET["id"] ?? 0);

if ($id <= 0) {
    header("Location: products.php");
    exit;
}

// Get product
$stmt = $pdo->prepare("
    SELECT *
    FROM products
    WHERE id = ?
    LIMIT 1
");
$stmt->execute([$id]);

$product = $stmt->fetch();

if (!$product) {
    header("Location: products.php");
    exit;
}

$error = "";

// Update product
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"] ?? "");
    $slug = trim($_POST["slug"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $badge = trim($_POST["badge"] ?? "");
    $status = isset($_POST["status"]) ? 1 : 0;

    if ($name === "" || $slug === "") {

        $error = "Product name and slug are required.";

    } else {

        try {

            $stmt = $pdo->prepare("
                UPDATE products
                SET
                    name = ?,
                    slug = ?,
                    description = ?,
                    badge = ?,
                    status = ?
                WHERE id = ?
            ");

            $stmt->execute([
                $name,
                $slug,
                $description,
                $badge,
                $status,
                $id
            ]);

            header("Location: products.php");
            exit;

        } catch (PDOException $e) {

            $error = "Unable to update product. Slug may already exist.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Product | Natural Pickle</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Edit Product</h2>

        <a href="products.php" class="btn btn-secondary">
            Back to Products
        </a>

    </div>

    <?php if ($error): ?>

        <div class="alert alert-danger">
            <?= htmlspecialchars($error) ?>
        </div>

    <?php endif; ?>


    <div class="card shadow-sm">

        <div class="card-body p-4">

            <form method="POST">

                <!-- Product Name -->

                <div class="mb-3">

                    <label class="form-label">
                        Product Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="<?= htmlspecialchars($product['name']) ?>"
                        required
                    >

                </div>


                <!-- Slug -->

                <div class="mb-3">

                    <label class="form-label">
                        Slug
                    </label>

                    <input
                        type="text"
                        name="slug"
                        class="form-control"
                        value="<?= htmlspecialchars($product['slug']) ?>"
                        required
                    >

                </div>


                <!-- Description -->

                <div class="mb-3">

                    <label class="form-label">
                        Description
                    </label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="4"
                    ><?= htmlspecialchars($product['description']) ?></textarea>

                </div>


                <!-- Badge -->

                <div class="mb-3">

                    <label class="form-label">
                        Badge
                    </label>

                    <input
                        type="text"
                        name="badge"
                        class="form-control"
                        value="<?= htmlspecialchars($product['badge']) ?>"
                        placeholder="Popular / Bestseller / Special"
                    >

                </div>


                <!-- Status -->

                <div class="form-check mb-4">

                    <input
                        type="checkbox"
                        name="status"
                        class="form-check-input"
                        id="status"
                        <?= $product['status'] ? 'checked' : '' ?>
                    >

                    <label
                        class="form-check-label"
                        for="status"
                    >
                        Active Product
                    </label>

                </div>


                <!-- Buttons -->

                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Update Product
                </button>

                <a
                    href="products.php"
                    class="btn btn-secondary"
                >
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>
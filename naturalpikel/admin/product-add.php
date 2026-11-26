<?php

require_once "../includes/auth.php";

require_once "../config/database.php";
require_once "../includes/functions.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"] ?? "");
    $slug = trim($_POST["slug"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $badge = trim($_POST["badge"] ?? "");
    $sort_order = (int) ($_POST["sort_order"] ?? 0);

    if ($name === "" || $slug === "") {

        $error = "Product name and slug are required.";

    } else {
        $sort_order = $pdo->query("
        SELECT COALESCE(MAX(sort_order), 0) + 1
        FROM products
        ")->fetchColumn();
        try {

            $stmt = $pdo->prepare("
                INSERT INTO products
                (name, slug, description, badge, status, sort_order)
                VALUES (?, ?, ?, ?, 1, ?)
            ");

            $stmt->execute([
                $name,
                $slug,
                $description,
                $badge,
                $sort_order
            ]);

            header("Location: products.php");
            exit;

        } catch (PDOException $e) {

            $error = "Could not add product. Slug may already exist.";

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Add Product | Natural Pickle</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1>Add Product</h1>

            <p class="text-muted mb-0">
                Add a new pickle product
            </p>
        </div>

        <a
            href="products.php"
            class="btn btn-outline-secondary"
        >
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

                <div class="mb-3">

                    <label class="form-label">
                        Product Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="Example: Mango Pickle"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Slug
                    </label>

                    <input
                        type="text"
                        name="slug"
                        class="form-control"
                        placeholder="Example: mango-pickle"
                        required
                    >

                    <small class="text-muted">
                        Use lowercase letters and hyphens.
                    </small>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Description
                    </label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="4"
                        placeholder="Describe the pickle..."
                    ></textarea>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Badge
                    </label>

                    <input
                        type="text"
                        name="badge"
                        class="form-control"
                        placeholder="Example: Bestseller"
                    >

                </div>


                


                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Add Product
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
<!-- app/Views/admin/contract_template.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Contract</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .contract-header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        .contract-section {
            margin: 20px 0;
        }
        .contract-section label {
            font-weight: bold;
        }
        .contract-section p {
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <div class="contract-header">
        <h1>Supplier Contract</h1>
        <p>Agreement between the company and <?= $supplier['nom'] ?></p>
    </div>

    <div class="contract-section">
        <label>Supplier Name:</label>
        <p><?= $supplier['nom'] ?></p>
    </div>

    <div class="contract-section">
        <label>Supplier Address:</label>
        <p><?= $supplier['email'] ?></p>
    </div>

    <div class="contract-section">
        <label>Contract Details:</label>
        <p>Detailed contract information goes here...</p>
    </div>
</body>
</html>

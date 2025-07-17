<?php
require_once './sdk/TCloudAutoLoader.php';

use TencentCloud\Cam\V20190116\CamClient;
use TencentCloud\Common\Credential;
use TencentCloud\Cam\V20190116\Models\AddUserRequest;

// SecretId:
IKIDsdAXigRzLTP9i5FE0aw64pOksoYLvHRP
// 
SecretKey:
oNiqwpUyGLCj4B5nIbhZDrKaeWKvxnRs
$successMessage = $errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    try {
        $cred = new Credential("IKIDsdAXigRzLTP9i5FE0aw64pOksoYLvHRP", "oNiqwpUyGLCj4B5nIbhZDrKaeWKvxnRs");

        $client = new CamClient($cred, "ap-guangzhou");

        $req = new AddUserRequest();
        $params = [
            "Name" => $username,
            "PhoneNum" => $phone,
            "Email" => $email,
            "CountryCode" => "260", // Change if not in China
        ];
        $req->fromJsonString(json_encode($params));

        $resp = $client->AddUser($req);
        $successMessage = "User successfully added with UIN: " . $resp->Uin;

    } catch (Exception $e) {
        $errorMessage = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Tencent Cloud Sub-User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Add Sub-User</h2>

                        <?php if ($successMessage): ?>
                            <div class="alert alert-success"><?= htmlspecialchars($successMessage) ?></div>
                        <?php endif; ?>
                        <?php if ($errorMessage): ?>
                            <div class="alert alert-danger"><?= htmlspecialchars($errorMessage) ?></div>
                        <?php endif; ?>

                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control" placeholder="e.g., 13700000000" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Create Sub-User</button>
                        </form>
                    </div>
                </div>
                <p class="text-center mt-3 text-muted">Powered by Tencent Cloud</p>
            </div>
        </div>
    </div>
</body>
</html>

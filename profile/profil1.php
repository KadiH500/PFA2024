<?php
session_start();
include "connexion.php";

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    // Fetch user data from the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bindParam(1, $userId);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt2 = $conn->prepare("SELECT * FROM signup WHERE id = ?");
    $stmt2->bindParam(1, $userId);
    $stmt2->execute();
    $userData2 = $stmt2->fetch(PDO::FETCH_ASSOC);


    if ($userData && $userData2) {
        $username = $userData2['username'];
        $name = $userData['name'];
        $email = $userData2['email'];
        $ville = $userData['ville'];
        $adresse = $userData['adresse'];
        $codepostal = $userData['codepostal'];
        $phone = $userData['phone'];
    } else {
        // Handle case where user data is not found
        // Redirect or display an error message
    }
} else {
    header("Location: ../login signup/losi.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">Account settings</h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-user">User</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-commandes">Commandes</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-user">
                            <div class="card-body media align-items-center">
                                <p class="p-border"><strong>Username: </strong><?php echo $username; ?></p>
                                <p><strong>Name: </strong><?php echo $name; ?></p>
                                <p><strong>Email: </strong><?php echo $email; ?></p>
                                <p><strong>Ville: </strong><?php echo $ville; ?></p>
                                <p><strong>Adresse: </strong><?php echo $adresse; ?></p>
                                <p><strong>Code Postal: </strong><?php echo $codepostal; ?></p>
                                <p><strong>Phone: </strong><?php echo $phone; ?></p>
                            </div>
                            
                        </div>
                        <div class="tab-pane fade" id="account-general">
                            <div class="card-body">
                                <form action="profile.php" method="post">
                                    <div class="form-group">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control mb-1" value="" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" value="" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">E-mail</label>
                                        <input type="text" class="form-control mb-1" value="nmaxwell@mail.com" name="email">
                                        <div class="alert alert-warning mt-3">
                                            Your email is not confirmed. Please check your inbox.<br>
                                            <a href="javascript:void(0)">Resend confirmation</a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Ville</label>
                                        <select class="custom-select" name="ville">
                                            <option>Tunis</option>
                                            <option selected>Bizerte</option>
                                            <option>Safax</option>
                                            <option>Sousse</option>
                                            <option>Gabes</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Adresse</label>
                                        <input type="text" class="form-control" value="" name="adresse">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Code Postal</label>
                                        <input type="text" class="form-control" value="" name="codepostal">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">numero de telephone</label>
                                        <input type="text" class="form-control" value="" name="phone">
                                    </div>

                                    <hr class="border-light m-0">
                                    <div class="text-right mt-3">
                                        <input type="submit" value="Submit" class="btn btn-primary" name="submitbtn">&nbsp;
                                        <input type="reset" value="Cancel" class="btn btn-default">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <input type="hidden" name="editpassword">
                                    <label class="form-label">Current password</label>
                                    <input type="password" class="form-control" name="ogpassword">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" class="form-control" name="password1">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control" name="password2">
                                </div>
                                <div class="text-right mt-3">
                                    <input type="submit" value="submit" class="btn btn-primary" name="pwbtn">&nbsp;
                                    <input type="reset" value="Cancel" class="btn btn-default">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-commandes">
                            <!-- Your Commandes form or content goes here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

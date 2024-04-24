<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require('connexion.php');

    $username = $_POST['username'] ?? '';
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $bio = $_POST['bio'] ?? '';
    $ville = $_POST['ville'] ?? '';
    $adresse = $_POST['adresse'] ?? '';
    $codepostal = $_POST['codepostal'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $oldpass=$_POST['ogpassword'] ?? '';
    $newpass1=$_POST['password1'] ?? '';
    $newpass2=$_POST['password2'] ?? '';
    if (isset($_POST['edituser'])) {


    }
    else if (isset($_POST['editpassword'])) {



    }
    else if (isset($_POST['editinfo'])) {
        
        
        
        
    }$sql = "INSERT INTO users (username, name, email, bio, ville, adresse, codepostal, phone)
    VALUES ('$username', '$name', '$email', '$bio', '$ville', '$adresse', '$codepostal', '$phone')";


}

session_start();
include "connexion.php";

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];

    // Fetch user data from the database
    $stmt = $conn->prepare("SELECT * FROM signup WHERE id = ?");
    $stmt->bindParam(1, $userId);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($userData) {
        $username = $userData['username'];
        $name = $userData['name'];
        $email = $userData['email'];
        $ville = $userData['ville'];
        $adresse = $userData['adresse'];
        $codepostal = $userData['codepostal'];
        $phone = $userData['phone'];
    } else {
        // Handle case where user data is not found
        // Redirect or display an error message
    }
?>

<!-- Rest of your HTML code with PHP variables for input values -->

<input type="text" class="form-control mb-1" value="<?php echo $username; ?>" name="username">
<input type="text" class="form-control" value="<?php echo $name; ?>" name="name">
<input type="text" class="form-control mb-1" value="<?php echo $email; ?>" name="email">
<select class="custom-select" name="ville">
    <option <?php if ($ville == 'Tunis') echo 'selected'; ?>>Tunis</option>
    <option <?php if ($ville == 'Bizerte') echo 'selected'; ?>>Bizerte</option>
    <!-- Other options -->
</select>
<input type="text" class="form-control" value="<?php echo $adresse; ?>" name="adresse">
<input type="text" class="form-control" value="<?php echo $codepostal; ?>" name="codepostal">
<input type="text" class="form-control" value="<?php echo $phone; ?>" name="phone">

<!-- Submit and reset buttons -->

<?php
} else {
    header("Location: ../login signup/losi.php");
    exit();
}
?>


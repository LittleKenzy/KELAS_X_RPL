<h1>Login</h1>
<form action="" method="post">
    <label for="">Email: </label>
    <br>
    <input type="email" name="email" placeholder="email" required>
    <br>
    <label for="">Password: </label>
    <br>
    <input type="password" name="password" placeholder="password" required>
    <br>
    <br>
    <input type="submit" value="login" name="login">
</form>

<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == "littlekenzy@gmail.com" && $password = "123") {
        $_SESSION['email'] = $email;
        header("location: index.php?menu=user");
    } else {
        echo "Login Gagal";
    }
}
?>
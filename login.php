<?php
include 'connection.php';
$login_ok = false;
$msg = "";
$tmp_id = "";
$tmp_pw = "";
if (
    isset($_POST['login']) && !empty($_POST['username'])
    && !empty($_POST['password'])
) {
    $id = $_POST['username'];
    $passwd = $_POST['password'];
    $sql = "SELECT user_id, passwd FROM account WHERE user_id = '$id' AND passwd = '$passwd'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tmp_id = $row["user_id"];
            $tmp_pw = $row["passwd"];
        }
    }
    if ($id == $tmp_id) {
        if ($passwd == $tmp_pw) {
            $login_ok = true;
        } else {
            $msg = "You have entered wrong Password";
        }
    } else {
        $msg = "You have entered wrong user name";
    }
}
if ($login_ok) {
    session_start();
    $_SESSION['logged_in'] = true;
    header('Refresh: 0.5; URL = index.php');
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginstyle.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <h2>Enter Username and Password</h2>
        <h4 style="color:red;"><?php echo $msg; ?></h4>
        <br /><br />
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="name">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <section style="margin-left:2rem;">
                <button type="submit" name="login">Login</button>
            </section>
        </form>
    </div>
    </div>
</body>

</html>
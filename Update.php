<?php
require_once('init.php');
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $guest_id = $_GET['id'];
    $statement = mysqli_prepare($conn, 'SELECT * FROM guests WHERE id = ?');
    mysqli_stmt_bind_param($statement, 'i', $guest_id);
    if(mysqli_stmt_execute($statement)) {
        $result = mysqli_stmt_get_result($statement);
        $guest = mysqli_fetch_assoc($result);
    }
} else {
    $guest_id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $statement = mysqli_prepare($conn, 'UPDATE guests SET first_name = ?, last_name = ? WHERE id = ?');
    mysqli_stmt_bind_param($statement, 'ssi', $first_name, $last_name, $guest_id);
    if(mysqli_stmt_execute($statement)) {
        header('Location: guest-list.php');
    } else {
        $error_message = "Guest update failed. Try again!";
    }
}
?>
<form action="guest-update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $guest['id']; ?>">
    First name:<input type="text" name="first_name" value="<?php echo $guest['first_name']; ?>">
    Last name:<input type="text" name="last_name" value="<?php echo $guest['last_name']; ?>">
    <input type="submit" value="update guest">
</form>
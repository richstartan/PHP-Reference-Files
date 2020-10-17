<html>
    <head>
        <title>Advance Web Programming HW#4</title>
        <style>
            form{
                margin-left:10px;
                margin-right:10px;
                padding:3rem;
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <form action="guest-login.php" method="POST">
            <!-- Name -->
        <label for="FirstName">First Name</label>
                <br>
            <input type="text" name="FirstName">
                <br>
                <br>
                <!-- Email -->
            <label for="LastName" >Last Name</label>
                <br>
            <input type="text" name="LastName" >
                <br>
                <br>
                <!-- SUBMIT -->
            <button type="submit" value="submit">Login Guest</button>
        </form>

        <?php
            require_once('init.php');
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $first_name = $_POST['FirstName'];
                $last_name = $_POST['LastName'];
                $statement = mysqli_prepare($conn, 'INSERT INTO guests (first_name, last_name) VALUES (?, ?)');
                mysqli_stmt_bind_param($statement, 'ss', $first_name, $last_name);
                if(mysqli_stmt_execute($statement)) {
                    header('Location: guest-list.php');
                } else {
                    $error_message = "Guest login failed. Try again.";
                }
            }
        ?>
    </body>
</html>
<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
	body {
		background-image: linear-gradient(to right, red, black);
		color: white;
		font-family: 'Proxima Nova Alt';
		font-size: 30px;
		text-align: center;
	}

	a {
		color: yellow;
		font-family: 'Proxima Nova Alt';
		font-size: 30px;
		text-align: center;
	}

	.error {color: yellow;}
	</style>
	<title>Redirect Form</title>
</head>
<body>

	<?php
// define variables and set to empty values

$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "* Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "* Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "* Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "* Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "No URL";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "* Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "No Comment";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "* Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
echo "<h2>You have successfully answered the form! Here is your input:</h2>";
echo $name;
echo $nameErr;
echo "<br>";
echo $email;
echo $emailErr;
echo "<br>";
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo "<br>";
echo $gender;
echo $genderErr;
?>
<br>
<br>
<a href="TAN - PHPForm.php"><u>Return to Form</u></a>

</body>
</html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="phpStyle.css" rel="stylesheet" type="text/css">
  </head>
  <body class="structure">
    <h1> Reset your password</h1>
    <p>An e-mail will be sent to you with instructions on how to reset your password</p>
    <form action="includes/reset-request.inc.php" method="post">
        <input type="text" name="email" placeholder="Enter your E-mail address...">
        <button type="submit" name="reset-request-submit"> Submit Request</button>
        <br>
        <br>
        <a href="index2.php">Return to login.</a>
    </form>
  </body>
</html>
<?php
if (isset($_GET['reset'])) {
    if ($_GET['reset'] =="success") {
        echo '<p class="signupsuccess"> Check your E-mail! </p>';
    }
}

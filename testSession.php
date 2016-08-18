<?php
    // Start the session
    session_start();
?>

<!DOCTYPE html>
<html>
<body>

<?php
    // Set session variables
    $_SESSION["user"] = "tester";
    $_SESSION["deck"] = "output.xml";
    echo "Session variables are set.";
?>

</body>
</html> 
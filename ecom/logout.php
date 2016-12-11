<?php

session_start();
session_destroy();
echo '<p>You have been logged out. <a href="index.php">Go back</a></p>';
echo '<p>You will be redirect in 5 seconds to homepage. Thanks for your browsing.</p>';
header( "refresh:5;url=index.php" );

?>
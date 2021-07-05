<?php
/**
 * File: index.php
 * Description:
 * -------------
 *
 * This is an entry file for this Dataface Application.  To use your application
 * simply point your web browser to this file.
 */

// Use the timer to time how long it takes to generate a page
// $time = microtime(true);

// Include the Xataface API
require_once 'xataface/dataface-public-api.php';

// Initialize Xataface framework
df_init(__FILE__, 'xataface')->display();

// Display the time taken
// $time = microtime(true) - $time;
// echo "<p>Execution Time: $time</p>";
?>

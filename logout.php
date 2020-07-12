<?php
/**
 * Created by PhpStorm.
 * User: mad1
 * Date: 5/12/14
 * Time: 11:59 AM
 */
require("functions/config.php");

// check the logout value being sent with the POST (or GET) request
if (isset($_GET['log_out']))
{
    // if true, run function logout
    logout();
}
// wait 1 second before going to next line of code
sleep(1);
// after 1 second go to logout form
render("login_form.php", ["name"=>""]);
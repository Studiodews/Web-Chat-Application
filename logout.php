<?php
/**
 * Created by PhpStorm.
 * User: mad1
 * Date: 5/12/14
 * Time: 11:59 AM
 */
require("functions/config.php");


if (isset($_GET['log_out']))
{
    logout();
}
sleep(4);
render("login_form.php", ["name"=>""]);
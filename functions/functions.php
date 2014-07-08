<?php
/**
 * Created by PhpStorm.
 * User: mad1
 * Date: 5/4/14
 * Time: 8:11 AM
 */
function login()
{
    $fp = fopen("log.html", 'a');
    fwrite($fp, "<div class='msgln'><i><span class='green'> ". $_SESSION['name'] ." </span>has entered the chat room.</i><br></div>");
    fclose($fp);
}

function logout()
{
    $fp = fopen("log.html", 'a');
    fwrite($fp, "<div class='msgln'><i><span class='red'> ". $_SESSION['name'] ."</span> has left the chat room.</i><br></div>");
    fclose($fp);


    // unset any session variables
    $_SESSION = [];

    // destroy session
    session_destroy();

    //$fh = fopen( "log.html", 'w' );
    //fclose($fh);

    //header("Location: webchat/index.php"); //Redirect the user
    //render("login_form.php", ["name"=>""]); //Redirect the userc

}

function render($template, $values = [])
{
    // extract variables into local scope
    extract($values);

    // if template exists, render it
    if (file_exists("templates/$template"))
    {
        // render header
        require("templates/header.php");

        // render template
        require("templates/$template");

        // render footer
        require("templates/footer.php");
    }

    //
    else
    {
        echo 'invalid template';
    }
}

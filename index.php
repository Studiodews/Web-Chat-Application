<?php
/*require("templates/index.html");*/
require("functions/config.php");//new



if ($_SERVER["REQUEST_METHOD"]=="POST")
{
//        $defaultname="Enter Username";

        if (isset($_POST["name"]))
        {
            $_SESSION["name"] = stripslashes(htmlspecialchars($_POST["name"]));

            render("chat_form.php", ["name"=>$_SESSION["name"]]); //Redirect the user
            login();
        }
        else
        {
            echo '<span class="error">Please type in a name</span>';
        }
}
else
    {
        render("login_form.php", ["name"=>""]); //Redirect the user
    }
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
    //clear chat
//    $( "#clear" ).click(function() {
//
//
//        $('#chatbox div').empty();
//
//
//    });
    $("#usermsg").attr("autocomplete", "off");
    //If user wants to end session
    $("#exit").click(function(){
        var exit = confirm("Are you sure you want to end the session?");
        if(exit==true)
        {
            window.location.href = 'logout.php';
            $.ajax({
                type: "POST",
                url: 'logout.php?log_out=true'
            });
        }

    });

    //If user submits the form
    $("#submitmsg").click(function(){
         var clientmsg = $("#usermsg").val();
        //TODO encryption here
        $.post("post.php", {text: clientmsg});
        $("#usermsg").attr("value", "");
        return false;
    });

    //Load the file containing the chat log
    function loadLog(){
        var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
        $.ajax({
            url: "log.html",
            cache: false,
            success: function(html){
                $("#chatbox").html(html); //Insert chat log into the #chatbox div

                //Auto-scroll
                var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
                if(newscrollHeight > oldscrollHeight){
                    $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                }
            }
        });
    }
    setInterval (loadLog, 1000);	//Reload file every second

</script>
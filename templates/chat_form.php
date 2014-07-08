<div id="chat">
    <div id="menu">
        <span class="green left margin_left_5">Hello</span>

        <span class="right" id="right_menu">
            <span class="left"><?= $name; ?></span>
            <!--<span class="left"><a id="clear" href="#">Clear Chat</a></span>-->

            <a href="#" ><button id="exit" class="right"> Close Chat</button></a>

        </span>

    </div>

    <div id="chatbox"></div>

    <form name="message" action="">
        <input name="usermsg" type="text" id="usermsg" size="333" />
        <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
    </form>
</div>
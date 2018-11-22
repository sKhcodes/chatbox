<?php
include "db.php";
?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chat Box</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
   <script type="text/javascript">
       function ajax() {
           var req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if(req.readyState == 4 && req.status == 200){
                    document.getElementById("chat").innerHTML = req.responseText;
                }
            }
            req.open("GET", "chat.php", true);
            req.send();
       }
       setInterval(function(){ajax()},1000);
    </script>
</head>
<body onload="ajax();">
    <div id="container">
        <div id ="chat_box">
            <div id="chat"></div>
         </div>
         <form action="index.php" method="post">
            <input type="text" name="name" placeholder="enter name"/>
            <textarea name="message" placeholder="enter message"></textarea>
            <input type="submit" name = "submit" value="Send"/>
         </form>
         <?php
         if(isset($_POST["submit"])){

            $name = $_POST["name"];
            $message = $_POST["message"];
            
            $query = "INSERT INTO chat (name, message) values ('$name','$message')";
            $run = $con->query($query);

            if($run){
                echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true'/>";
            }
         }
         ?>
    </div>
</body>
</html>
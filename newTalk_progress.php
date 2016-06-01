<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Porta.ly</title>
        <meta name="Public anonym talks" content="">
        <meta name="Osadchy Yuri" content="">

        <link type="text/css" rel="stylesheet" href="css/newTalk.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    </head>
    <body>
    
    <!-- Header -->

    <div id="wrapper">

            <div id="header">
                <div id="header-right"></div>
                <div id="header-center"><h1>
                <div id="logo"><img src="logo.png" alt="porta.ly" height="30" width="32"></div>
                                                                 Public Anonym Talks</h1></div>
                <div id="header-left"></div>
            </div>

    <!-- Title -->        

            <div id="header-title">
                <div id="header-right-title"></div>
                <div id="header-center-title"><h2>Create new talk feed</h2></div>
                <div id="header-left-title"></div>  

            </div>

        </div>

<?php 
$titleTalk = $_POST["titleTalk"];
$desc = $_POST["desc"];
?>

            <form method="post" action="<?php echo $PHP_SELF;?>">
        Title talk<input type="text" size="12" maxlength="12" name="titleTalk"><br/>
        <textarea rows="5" cols="20" name="desc" wrap="physical">Description</textarea><br/>
        <input type="submit" value="submit" name="submit"><br />

<?
if (!isset($_POST['submit'])) {
} else {
echo " ".$titleTalk." ".$desc.".<br />";
}   // REDIRECT TO NEW PAGE WITH CREATED NEW ROOM AND ALL DATA IN MYSQL
?>

    



    </div>

    <!-- Footer -->
        
    <h5>© 2014 Porta.ly | βeta | <a href="mailto:oyurtrez@gmail.com">Feedback</a></h5>


</body>
</html>
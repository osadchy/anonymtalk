<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>anonymTalk.com</title>
        <meta name="Public anonym talks" content="">
        <meta name="Osadchy Yuri" content="">
        <link type="text/css" rel="stylesheet" href="css/talkFeed.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    </head>
    <body>

 <!-- Header -->

    <div id="wrapper">

            <div id="header">
                <div id="header-right"></div>
                <div id="header-center"><h1>
                <a href="index.html"><div id="logo"><img src="logo.png" alt="porta.ly" height="30" width="30"></a></div>
                                                                                         Public Anonym Talks</h1></div>                                          
                <div id="header-left"></div>
            </div>

    <!-- Title -->        

            <div id="header-title">
                <div id="header-right-title"></div>
                <div id="header-center-title"><h2>Feed | Sport</h2></div>
                <div id="header-left-title"></div>  

            </div>

    <!-- New talk btn --> 

        <!--
            <div class="new-talk-cnt">
                <div class="inner">
                    <div class="btn-talk">New talk</div>
                </div>
            </div>
                    -->
   </div>

<?php 
// Connect to the database
include('config.php'); 
$id_post = "0"; //the post or the page id
?>

<!-- Comment container -->        

<div class="cmt-container" >
    <?php 

    // retrive data from MySQL

    $sql = mysql_query("SELECT * FROM sport WHERE id_post = '$id_post'") or die(mysql_error());;
    while($affcom = mysql_fetch_assoc($sql)){ 
        $name = $affcom['name'];
        $email = $affcom['email'];
        $comment = $affcom['comment'];
        $date = $affcom['date'];

        // Get gravatar Image 
        // https://fr.gravatar.com/site/implement/images/php/

        $default = "mm";
        $size = 35;
        $grav_url = "http://www.gravatar.com/avatar/".md5(strtolower(trim($email)))."?d=".$default."&s=".$size;

    ?>

    <div class="cmt-cnt">
        <img src="<?php echo $grav_url; ?>" />

        <!-- Comment text -->        

        <div class="thecom">

            <!-- output | name | comment | date -->        

            <h5><?php echo $name; ?></h5><span data-utime="1371248446" class="com-dt"><?php echo $date; ?></span>
            <br/>
            <p>
                <?php echo $comment; ?>
            </p>
        </div>
    </div><!-- end "cmt-cnt" -->
    <?php } ?>


    <div class="new-com-bt">
        <span>What do you think?</span>
    </div>
    <div class="new-com-cnt">
        <input type="text" id="name-com" name="name-com" value="Anonym" placeholder="Nickname" /> 
        <!-- <input type="text" id="mail-com" name="mail-com" value="" placeholder="Your e-mail adress" /> -->
        <textarea class="the-new-com"></textarea>
        <div class="bt-add-com">Talk</div>
        <div class="bt-cancel-com">Never mind</div>
    </div>
    <div class="clear"></div>
</div><!-- end of comments container "cmt-container" -->

    <!-- Footer -->
        
    <h5>© 2014 anonymtalk.com | βeta | <a href="mailto:oyurtrez@gmail.com">Feedback</a></h5>


<script type="text/javascript">
   $(function(){ 
        //alert(event.timeStamp);
        $('.new-com-bt').click(function(event){    
            $(this).hide();
            $('.new-com-cnt').show();
            $('#name-com').focus();
        });

        /* when start writing the comment activate the "add" button */
        $('.the-new-com').bind('input propertychange', function() {
           $(".bt-add-com").css({opacity:0.6});
           var checklength = $(this).val().length;
           if(checklength){ $(".bt-add-com").css({opacity:1}); }
        });

        /* on clic  on the cancel button */
        $('.bt-cancel-com').click(function(){
            $('.the-new-com').val('');
            $('.new-com-cnt').fadeOut('fast', function(){
                $('.new-com-bt').fadeIn('fast');
            });
        });

        // on post comment click 
        $('.bt-add-com').click(function(){
            var theCom = $('.the-new-com');
            var theName = $('#name-com');
            var theMail = $('#mail-com');

            if( !theCom.val()){ 
                alert('Do You wanna talk?!'); 
            }else{ 
                $.ajax({
                    type: "POST",
                    url: "ajax/add-comment_sport.php",
                    data: 'act=add-com&id_post='+<?php echo $id_post; ?>+'&name='+theName.val()+'&email='+theMail.val()+'&comment='+theCom.val(),
                    success: function(html){
                        theCom.val('');
                        theMail.val('');
                        theName.val('');
                        $('.new-com-cnt').hide('fast', function(){
                            $('.new-com-bt').show('fast');
                            $('.new-com-bt').before(html);  
                        })
                    }  
                });
            }
        });

    });
</script>

</body>
</html>
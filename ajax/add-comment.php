<?php
extract($_POST);
if($_POST['act'] == 'add-com'):
	$name = htmlentities($name);
    //$email = htmlentities($email);
    $comment = htmlentities($comment);

    // Connect to the database
	include('../config.php'); 
	
	// Get gravatar Image 
	// https://fr.gravatar.com/site/implement/images/php/

	$default = "mm";
	$size = 35;
	$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . $default . "&s=" . $size;

	if(strlen($name) <= '1'){ $name = 'Anonym';}

    //insert the comment in the database

    mysql_query("INSERT INTO comments (name, email, comment, id_post)VALUES( '$name', '$email', '$comment', '$id_post')");
    if(!mysql_errno()){

?>

    <div class="cmt-cnt">

    <!-- output gravatar -->

    	<img src="<?php echo $grav_url; ?>" alt="" />

    	<!-- comment class -->

		<div class="thecom">

				<!-- output user name -->

		        <h5><?php echo $name; ?>

		        	<!-- output date -->

		        </h5><span class="com-dt"><?php echo date('d-m-Y H:i'); ?></span>
		        <br/>

						<!-- output comment -->

	       					<p><?php echo $comment; ?></p>
	    </div>

	</div>	<!-- end "cmt-cnt" -->

	<?php } ?>
<?php endif; ?>
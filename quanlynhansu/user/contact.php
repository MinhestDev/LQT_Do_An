<?php include('userheader.php'); ?>
<?php
	include_once('../controller/connect.php');
	  
	$dbs = new database();
	$db=$dbs->connection();

	if(isset($_POST['submit']))
	{
		require_once('mail/class.phpmailer.php');
		$name = $_POST['fname'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		$date = date('Y-m-d');
		$empid = $_SESSION['User']['EmployeeId'];
		
		//$message = stripslashes($comment);
		mysqli_query($db,"insert into inquiry values(null,'$date','$empid','$email','$message')");

		
		$mail = new PHPMailer(); // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465; // or 587
		$mail->IsHTML(true);
		$mail->Username = "admin@gmail.com";
		$mail->Password = "chhabhaiya";
		$mail->SetFrom($email);
		$mail->Subject = $subject;
		$mail->Body ="Chào bạn,<br><br>".$message."<br><br>Cảm ơn!<br>".$name;
		$mail->AddAddress("admin@gmail.com");

		if(!$mail->Send()) {
		    //echo "Mailer Error: " . $mail->ErrorInfo;
		    //header("location:contact.php?msg=Error");
		    echo "<script>window.location='contact.php?msg=Error;</script>";
		} else {
			//echo "Message has been sent";
			//header("location:contact.php?msg=Success");
			echo "<script>window.location='contact.php?msg=Success;</script>";
		}
		//$mail->SMTPSecure = 'tls';
	 }
?>
				<form action="" method="post">
               <div class="s-12 l-10">
               <h1 style="width: 85%;">Liên hệ chúng tôi</h1><hr><input type="text" readonly="" style="width: 15%;float: right;margin-top: 0px; border: 0px;" value="<?php echo date('d/m/Y');?>">
               </div>
               <div class="clearfix"></div>
               
               <div class="s-12 l-6">
                 	
					    <label for="fname">Tên</label>
					    <input type="text" id="fname" title="Tên" name="fname" placeholder="Tên " required="">
					    <label for="lname">Email</label>
					    <input type="email" title="Email" id="email" name="email" placeholder="Email " required="">
					    <label for="fname">Tiêu đề</label>
					    <input type="text"  title="Subject" name="subject" placeholder="Tiêu đề " required="">
					    <label for="message">Tin nhắn</label>
					    <textarea id="editor1" name="message" title="Tin nhắn" required=""></textarea>
					    <input type="submit" title="Gửi" name="submit" value="Gửi">
				  	
               </div>
               </form>
<?php include('userfooter.php'); ?>

<!-- editer textarea-->
	<script src="js/ckeditor.js"></script>
	<script src="js/sample.js"></script>
<script>
	initSample();
</script>







			
			





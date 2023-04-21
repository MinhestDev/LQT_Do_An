<?php include('userheader.php'); ?>
<?php
	$result="";
	if(isset($_GET['msg']))
	{
		$result=$_GET['msg'];
	}
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];	
	}
?>
    <div class="s-12 l-10">
    <h1>Đổi mật khẩu</h1><hr>
    <div class="clearfix"></div>
    </div>
    <div class="s-12 l-6">
      	<form action="../controller/login.php" method="post">
		    <label for="fname">Cũ</label>
		    <input type="Password" id="fname" title="Mật khẩu cũ" name="oldpass" placeholder="Nhập mật khẩu cũ" >
		    <label for="lname">Mới</label>
		    <input type="Password" title="Mật khẩu mới" id="email" name="npassword" placeholder="Nhập mật khẩu mới" >
		    <label for="message">Nhập lại mật khẩu mới</label>
		    <input type="Password" id="message" name="cpassword" title="Nhập lại mật khẩu" placeholder="Nhập lại mật khẩu">
		    <?php if($result) { ?>
		    <h5 style="color: #E73D3D;"><?php echo (isset($result))?$result:""; } else { ?></h5>
		    <h5 style="color: #127409;"><?php echo (isset($id))?$id:""; } ?></h5>

		    <input type="submit" title="Gửi" name="usave" value="Gửi">
	  	</form>
               </div>
<?php include('userfooter.php'); ?>
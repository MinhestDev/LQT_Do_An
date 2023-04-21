<?php include('header.php');?>
<?php
	$result ="";
	if(isset($_GET['msg']))
	{
		$result=$_GET['msg'];
	}
?>

<ol class="breadcrumb" style="margin: 10px 0px ! important;">
    <li class="breadcrumb-item"><a href="Home.php">Trang chủ</a><i class="fa fa-angle-right"></i>Đổi mật khẩu</li>
</ol>
<form method="POST" action="controller/login.php">
<div class="container-fluid" style="margin-bottom: 30px;margin-top: 10px; background: white;">
    <div class="row">
    <h2 style="color: #1abc9c;">Đổi mật khẩu</h2><hr>
        <div class="col-md-5 control-label">
              <label class="control-label">Mật khẩu cũ</label>
              <div class="input-group">
                  <span class="input-group-addon">
              <i class="fa fa-pencil" aria-hidden="true"></i>
              </span>
              <input type="password" name="oldpass" title="Mật khẩu cũ" placeholder="Mật khẩu cũ" class="form-control">
              </div>
            </div>
        <div class="clearfix"> </div>
    </div>
    <div class="row">
        <div class="col-md-5 control-label">
              <label class="control-label">Mật khẩu mới</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-pencil" aria-hidden="true"></i>
              </span>
              <input type="password" title="Mật khẩu mới" name="npassword" placeholder="Mật khẩu mới" class="form-control">
              </div>
            </div>
        <div class="clearfix"> </div>
    </div>

    <div class="row">
        <div class="col-md-5 control-label">
            <label class="control-label">Xác nhận mật khẩu</label>
            <div class="input-group">             
                <span class="input-group-addon">
        	    	<i class="fa fa-pencil" aria-hidden="true"></i>
            	</span>
              	<input type="password" name="cpassword" title="Xác nhận mật khẩu" placeholder="Xác nhận mật khẩu" class="form-control" >
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <h4 style="color: #F1C40F;"><?php echo $result ?></h4>
    <div class="row">
    	<div class="col-md-3 form-group">
        	<button type="submit" name="save" title="Save" class="btn btn-primary">Lưu</button>
            <button type="reset" class="btn btn-default" title="Reset">Làm mới</button>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

</form>

<?php include('footer.php'); ?>

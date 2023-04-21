<?php include('header.php');?>
<?php
  include_once('controller/connect.php');
  
  $dbs = new database();
  $db=$dbs->connection();

  $sql = mysqli_query($db,"select * from leavedays");
  $rom  = mysqli_fetch_assoc($sql);
  $dayid = $rom['LeaveDayId'];

  if(isset($_POST['submit']))
  {
    $day = $_POST['leaveday'];
    mysqli_query($db,"update leavedays set LeaveDay='$day' where LeaveDayId='$dayid'");
    echo "<script>window.location.reload()</script>";
  }
?>
<ol class="breadcrumb" style="margin: 10px 0px ! important;">
    <li class="breadcrumb-item"><a href="Home.php">Trang chủ</a><i class="fa fa-angle-right"></i>Đơn nghỉ<i class="fa fa-angle-right"></i>Thêm đơn nghỉ</li>
</ol>
<form method="POST">
<div class="container-fluid" style="margin-bottom: 30px;margin-top: 10px; background: white; ">
	<div class="row">
		<h2 style="color: #1abc9c;">Thêm đơn nghỉ</h2><hr>
		<div class="col-md-3 control-label">
           	<label class="control-label">Nghỉ phép (Ngày trong năm)</label>
           	<div class="input-group">             
               	<span class="input-group-addon">
           			<i class="fa fa-sun-o" aria-hidden="true"></i>
           		</span>
            	<input type="text" name="leaveday" title="Ngày phép hàng năm" autocomplete="off" maxlength="3" placeholder="Enter Day" value="" required="" class="form-control" style="width: 250px; height: 36px;" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">

           	</div>
            <label style="color: #008000;">Số Ngày Nghỉ Phép Hàng Năm bây giờ là <?php echo(isset($rom['LeaveDay']))?$rom['LeaveDay']:'0'; ?>.</label>
        </div>
        <div class="col-md-4">
          
        </div>
        <div class="clearfix"> </div>
  </div>
  <div class="row">
        <div class="col-md-3 form-group">
        	<button type="submit" name="submit" class="btn btn-primary" title="Add">Thêm</button>
            <button type="reset" class="btn btn-default" title="Reset">Làm mới </button>
        </div>
        <div class="clearfix"> </div>
	</div>	
</div>

<div class="container-fluid" style="margin-bottom: 30px;margin-top: 10px; background: white; ">
  <div class="row">
    <h2 style="color: #1abc9c;">Thêm đơn nghỉ</h2><hr>
    <div class="col-md-3 control-label">
            <label class="control-label">Nghỉ phép (Ngày trong năm)</label>
            <div class="input-group">             
                <span class="input-group-addon">
                <i class="fa fa-sun-o" aria-hidden="true"></i>
              </span>
              <input type="text" name="leaveday" title="Ngày phép hàng năm" autocomplete="off" maxlength="3" placeholder="Enter Day" value="" required="" class="form-control" style="width: 250px; height: 36px;" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">

            </div>
            <label style="color: #008000;">Số Ngày Nghỉ Phép Hàng Năm bây giờ là <?php echo(isset($rom['LeaveDay']))?$rom['LeaveDay']:'0'; ?>.</label>
        </div>
        <div class="col-md-4">
          
        </div>
        <div class="clearfix"> </div>
  </div>
  <div class="row">
        <div class="col-md-3 form-group">
          <button type="submit" name="submit" class="btn btn-primary" title="Add">Thêm</button>
            <button type="reset" class="btn btn-default" title="Reset">Làm mới </button>
        </div>
        <div class="clearfix"> </div>
  </div>  
</div>
</form>
<?php include('footer.php'); ?>
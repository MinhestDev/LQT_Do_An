<?php include('header.php');?>
<?php

  include_once('controller/connect.php');
  
  $dbs = new database();
  $db=$dbs->connection();

  if(isset($_POST['submit']))
  {
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    mysqli_query($db,"insert into values(null,'$year','$month','$day')");
    echo "<script>window.location='workingdayadd.php';</script>";
  }
  
?>
<ol class="breadcrumb" style="margin: 10px 0px ! important;">
    <li class="breadcrumb-item"><a href="Home.php">Trang chủ</a><i class="fa fa-angle-right"></i>Đơn nghỉ<i class="fa fa-angle-right"></i>Add Working Day</li>
</ol>
<form method="POST">
<div class="container-fluid" style="margin-bottom: 30px;margin-top: 10px; background: white; ">
	<div class="row">
		<h2 style="color: #1abc9c;">Thêm ngày làm việc</h2><hr>
		<div class="col-md-3 control-label">
           	<label class="control-label">Năm làm việc</label>
           	<div class="input-group">             
               	<span class="input-group-addon">
           			<i class="fa fa-sun-o" aria-hidden="true"></i>
           		</span>
            	<input type="text" name="year" title="Năm" autocomplete="off" maxlength="4" placeholder="Nhập năm" value="" required="" class="form-control" style="width: 250px; height: 36px;" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
           	</div>
    </div>
  </div>
  <div class="clearfix"> </div>
  <div class="row">
    <div class="col-md-3 control-label">
            <label class="control-label">Tháng làm việc</label>
            <div class="input-group">             
                <span class="input-group-addon">
                <i class="fa fa-sun-o" aria-hidden="true"></i>
              </span>
              <input type="text" name="month" title="Tháng" autocomplete="off" maxlength="2" placeholder="Nhập tháng" value="" required="" class="form-control" style="width: 250px; height: 36px;" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">

            </div>
    </div>
  </div>
  <div class="clearfix"> </div>
  <div class="row">
        <div class="col-md-3 control-label">
            <label class="control-label">Ngày làm việc hàng tháng</label>
            <div class="input-group">             
                <span class="input-group-addon">
                <i class="fa fa-sun-o" aria-hidden="true"></i>
              </span>
              <input type="text" name="day" title="Ngày" autocomplete="off" maxlength="2" placeholder="Nhập ngày" value="" required="" class="form-control" style="width: 250px; height: 35px;" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">

            </div>
        </div>
  </div>
        <div class="clearfix"> </div>
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


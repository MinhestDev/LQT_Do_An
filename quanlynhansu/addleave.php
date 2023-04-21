<?php include('header.php');?>
<?php
  include_once('controller/connect.php');
  
  $dbs = new database();
  $db=$dbs->connection();

  $empid = $_SESSION['User']['EmployeeId'];
  $sql = mysqli_query($db,"select * from type_of_leave ");
  $leavedetails = mysqli_query($db,"select * from leavedetails where EmpId='$empid' ");

  if(isset($_POST['Apply']))
  {
    $leave = $_POST['leavestatus'];
    $reason = $_POST['reason'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $leavestatus = "Pending";
    /*date formate*/
    $date = str_replace('/', '-', $startdate);
    $startd = date('Y-m-d', strtotime($date));
    $datee = str_replace('/', '-', $enddate);
    $endd = date('Y-m-d', strtotime($datee));
    /*end date formate*/

    mysqli_query($db,"insert into leavedetails values(null,'$empid','$leave','$reason','$startd','$endd','$leavestatus')");
    echo "<script>window.location='addleave.php';</script>";
  }

?>
<ol class="breadcrumb" style="margin: 10px 0px ! important;">
    <li class="breadcrumb-item"><a href="Home.php">Trang chủ</a><i class="fa fa-angle-right"></i>Nghỉ<i class="fa fa-angle-right"></i>Add Leave</li>
</ol>
<form method="POST">
<div class="container-fluid" style="margin-bottom: 30px;margin-top: 10px; background: white;">
	<div class="row">
		<h2 style="color: #1abc9c;">Áp dụng nghỉ phép</h2><hr>
		<div class="col-md-5 control-label">
        <label class="control-label">Loại nghỉ phép</label>
        <div class="input-group">             
            <span class="input-group-addon">
            <i class="fa fa-sun-o" aria-hidden="true"></i>
            </span>
           	<select name="leavestatus" title="Select Leave" style="text-transform: capitalize; " required>
           	<option value="">-- Chọn nghỉ phép --</option>
            <?php while($row = mysqli_fetch_assoc($sql)) { ?>
            <option value="<?php echo $row['LeaveId']; ?>"><?php echo $row['Type_of_Name'];?></option>
            <?php } ?>
            </select>
        </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="row">
        <div class="col-md-5 control-label">
              <label class="control-label">Lý do</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-pencil" aria-hidden="true"></i>
              </span>
              <input type="text" name="reason" class="form-control" required="">
              </div>
            </div>
        <div class="clearfix"> </div>
    </div>
    <div class="row">
        <div class="col-md-5 control-label">
              <label class="control-label">Ngày bắt đầu</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-calendar" aria-hidden="true"></i>
              </span>
              <input type="text" id="StartDate" title="Select First Date" name="startdate" class="form-control" required="" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
              </div>
            </div>
        <div class="clearfix"> </div>
    </div>

    <div class="row">
        <div class="col-md-5 control-label">
            <label class="control-label">Ngày kết thúc</label>
            <div class="input-group">             
                <span class="input-group-addon">
        	    	<i class="fa fa-calendar" aria-hidden="true"></i>
            	</span>
              	<input type="text" id="EndDate" name="enddate" title="Select End Date" class="form-control" required="" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>

    <div class="row">
    	<div class="col-md-3 form-group">
        	<button type="submit" name="Apply" title="Apply" class="btn btn-primary">Áp dụng</button>
            <button type="reset" class="btn btn-default" title="Reset">Làm mới</button>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>



<div class="validation-form" style="margin-bottom: 30px;margin-top: -10px; background: white; ">
	<h2>Xem nghỉ phép</h2>
	<div class="row" style="color: white; margin-right: 0; margin-left: 0;">
		<div style="background: red;" class="col-md-1 control-label">
           	<h5>ID</h5>
        </div>
		<div style="background: red;" class="col-md-2 control-label">
           	<h5>Trạng thái Nghỉ phép</h5>
        </div>
        <div style="background: red; " class="col-md-2 control-label">
           	<h5>Lý do</h5>
        </div>
        <div style="background: red;" class="col-md-2 control-label">
           	<h5>Ngày bắt đầu</h5>
        </div>
        <div style="background: red;" class="col-md-2 control-label">
           	<h5>Ngày kết thúc</h5>
        </div>
        <div style="background: red;" class="col-md-1 control-label">
           	<h5>Trạng thái</h5>
        </div>
        <div style="background: red; text-align: center;" class="col-md-2 control-label">
           	<h5>Hành động</h5>
        </div>
    </div>
    <?php $i=1; while($rom = mysqli_fetch_assoc($leavedetails)) {
      $typeid = $rom['TypesLeaveId'];
      $typename = mysqli_query($db,"select * from type_of_leave where LeaveId='$typeid' ");
      $typen = mysqli_fetch_assoc($typename); ?> 
    <div class="row" style="margin-right: 0; margin-top: 10px; margin-left: 0;">
    
    	<div class="col-md-1" ><?php $i=$i; echo $i; $i++;?></div>
    	<div class="col-md-2"><?php echo ucfirst((isset($typen['Type_of_Name']))?$typen['Type_of_Name']:""); ?></div>
    	<div class="col-md-2" ><?php echo(isset($rom['Reason']))?$rom['Reason']:""; ?></div>
    	<div class="col-md-2"><?php echo(isset($rom['StateDate']))?$rom['StateDate']:""; ?></div>
    	<div class="col-md-2"><?php echo(isset($rom['EndDate']))?$rom['EndDate']:""; ?></div>
    	<div class="col-md-1"><?php echo(isset($rom['LeaveStatus']))?$rom['LeaveStatus']:""; ?></div>

      <?php if($rom['LeaveStatus'] == "Pending") {?>
    	<div class="col-md-2" style="text-align: center;"><a onclick="history.go(0)" title="Refresh"><i class="la fa fa-refresh" style="color: #050100;" aria-hidden="true"></i></a></div>
      <?php } else if($rom['LeaveStatus'] == "Accept"){ ?>
       <div class="col-md-2" style="text-align: center;"><a title="Đồng ý"><i class="fa fa-check" aria-hidden="true"> </i></a></div>
       <?php } else {?>
       <div class="col-md-2" style="text-align: center;"><a title="Từ chối"><i class="fa fa-times" style="color:#E83114;" aria-hidden="true"> </i></a></div>
       <?php } ?> 
    </div><hr>
     <?php }?>
</div>

</form>
<!--Font Awesome spin icon it code-->
        <script>
          $(".la").mouseover(function (e) 
          {
            $(this).removeClass('fa fa-refresh')
            $(this).addClass('fa fa-refresh fa-spin')
          }).mouseout(function (e)
          {
            $(this).removeClass('fa fa-refresh fa-spin')
            $(this).addClass('fa fa-refresh')
          })
        </script>
        <!--Font Awesome code End-->
<?php include('footer.php'); ?>


<script type="text/javascript">
  
$('#EndDate').datetimepicker({
  yearOffset:0,
  lang:'ch',
  timepicker:false,
  format:'d/m/Y',
  formatDate:'Y/m/d',
  minDate:'2015/01/01', // yesterday is minimum date
  maxDate:'2030/01/01' // and tommorow is maximum date calendar
});

$('#StartDate').datetimepicker({
  yearOffset:0,
  lang:'ch',
  timepicker:false,
  format:'d/m/Y',
  formatDate:'Y/m/d',
  minDate:'2015/01/01', // yesterday is minimum date
  maxDate:'2030/01/01' // and tommorow is maximum date calendar
});

</script>
<?php
session_start();
require("config.php");
////code
 
if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}

//// code insert
//// add code
$error="";
$msg="";
if(isset($_POST['add']))
{
	$eid=$_REQUEST['id'];
	
	$title=$_POST['title'];
	$econtent=$_POST['econtent'];
	$type=$_POST['type'];
	$vip=$_POST['vip'];
	$spons=$_POST['spons'];
	$sponscon=$_POST['sponscon'];
	$stype=$_POST['stype'];
	$estaer=$_POST['estart'];
	$eend=$_POST['eend'];
	$price=$_POST['price'];
	$city=$_POST['city'];
	$tickava=$_POST['tickava'];
	$loc=$_POST['loc'];
	$state=$_POST['state'];
	$status=$_POST['status'];
	$uid=$_POST['uid'];
	$feature=$_POST['feature'];
	
	
	$eimage=$_FILES['eimage']['name'];
	$eimage1=$_FILES['eimage1']['name'];
	$eimage2=$_FILES['eimage2']['name'];
	$eimage3=$_FILES['eimage3']['name'];
	$eimage4=$_FILES['eimage4']['name'];
	
	
	$temp_name  =$_FILES['eimage']['tmp_name'];
	$temp_name1 =$_FILES['eimage1']['tmp_name'];
	$temp_name2 =$_FILES['eimage2']['tmp_name'];
	$temp_name3 =$_FILES['eimage3']['tmp_name'];
	$temp_name4 =$_FILES['eimage4']['tmp_name'];
	
	
	move_uploaded_file($temp_name,"event/$eimage");
	move_uploaded_file($temp_name1,"event/$eimage1");
	move_uploaded_file($temp_name2,"event/$eimage2");
	move_uploaded_file($temp_name3,"event/$eimage3");
	move_uploaded_file($temp_name4,"event/$eimage4");
	
	
	
	
	$sql = "UPDATE event SET title= '{$title}', econtent= '{$econtent}', type='{$type}', stype='{$stype}',
	vip='{$vip}', estart='{$estart}', spons='{$spons}', eend='{$eend}', sponscon='{$sponscon}', 
	tickava='{$tickava}', price='{$price}', location='{$loc}', city='{$city}', state='{$state}', feature='{$feature}',
	eimage='{$eimage}', eimage1='{$eimage1}', eimage2='{$eimage2}', eimage3='{$eimage3}', eimage4='{$eimage4}',
	uid='{$uid}', status='{$status}' WHERE eid = {$eid}";
	
	$result=mysqli_query($con,$sql);
	if($result == true)
	{
		$msg="<p class='alert alert-success'>Event Updated</p>";
		header("Location:eventview.php?msg=$msg");
	}
	else{
		$msg="<p class='alert alert-warning'>Event Not Updated</p>";
		header("Location:eventview.php?msg=$msg");
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title> EventWin</title>
		
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
    </head>
    <body>

		
			<!-- Header -->
			<?php include("header.php"); ?>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Events</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Event</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Update Event Details</h4>
									<?php echo $error; ?>
									<?php echo $msg; ?>
								</div>
								<form method="post" enctype="multipart/form-data">
								
								<?php
									
									$eid=$_REQUEST['id'];
									$query=mysqli_query($con,"select * from event where eid='$eid'");
									while($row=mysqli_fetch_row($query))
									{
								?>
												
								<div class="card-body">
									<h5 class="card-title">Event Detail</h5>
										<div class="row">
											<div class="col-xl-12">
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Title</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="title" required value="<?php echo $row['1']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Content</label>
													<div class="col-lg-9">
														<textarea class="tinymce form-control" name="econtent" rows="10" cols="30"><?php echo $row['2']; ?></textarea>
													</div>
												</div>
												
											</div>
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Event Type</label>
													<div class="col-lg-9">
														<select class="form-control" required name="type">
															<option value="">Select Event Type</option>
															<option value="technology">Technology Event</option>
															<option value="sporting">Sporting Event</option>
															<option value="scientific">Scientific Event</option>
															<option value="medical">Medical Event</option>
															<option value="cultyral">Cultural Event</option>
															<option value="religious">Religious Event</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Event Category</label>
													<div class="col-lg-9">
														<select class="form-control" required name="stype">
															<option value="">Select Category</option>
															<option value="free">Free</option>
															<option value="ticket">Ticket</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Start Date</label>
													<div class="col-lg-9">
														<input type="date" class="form-control" name="estart" required value="<?php echo $row['6']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">End Date</label>
													<div class="col-lg-9">
														<input type="date" class="form-control" name="eend" required value="<?php echo $row['8']; ?>">
													</div>
												</div>
												
											</div>   
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">VIP Seats</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="vip" required value="<?php echo $row['5']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Event Sponsor</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="spons" required value="<?php echo $row['7']; ?>">
													</div>
												</div>
												<div class="form-group row">
												<label class="col-lg-3 col-form-label">Sponsor Contact Details</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="sponscon" required value="<?php echo $row['9']; ?>">
													</div>
												</div>
												
											</div>
										</div>
										<h4 class="card-title">Price & Location</h4>
										<div class="row">
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Price</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="price" required value="<?php echo $row['11']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">City</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="city" required value="<?php echo $row['13']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">State</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="state" required value="<?php echo $row['14']; ?>">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												<div class="form-group row">
												
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Tickets Availabl</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="tickava" required value="<?php echo $row['10']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Address</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="loc" required value="<?php echo $row['12']; ?>">
													</div>
												</div>
												
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-lg-2 col-form-label">Feature</label>
											<div class="col-lg-9">
											<p class="alert alert-danger">* Important Please Do Not Remove Below Content Only Change <b>Yes</b> Or <b>No</b> or Details and Do Not Add More Details</p>
											
											<textarea class="tinymce form-control" name="feature" rows="10" cols="30">
												
													<?php echo $row['15']; ?>
												
											</textarea>
											</div>
										</div>
												
										<h4 class="card-title">Image & Status</h4>
										<div class="row">
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="eimage" type="file" required="">
														<img src="event/<?php echo $row['16'];?>" alt="eimage" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 2</label>
													<div class="col-lg-9">
														<input class="form-control" name="eimage2" type="file" required="">
														<img src="event/<?php echo $row['18'];?>" alt="eimage" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 4</label>
													<div class="col-lg-9">
														<input class="form-control" name="eimage4" type="file" required="">
														<img src="event/<?php echo $row['20'];?>" alt="eimage" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Status</label>
													<div class="col-lg-9">
														<select class="form-control"  required name="status">
															<option value="">Select Status</option>
															<option value="available">Available</option>
															<option value="finish">Finish</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 1</label>
													<div class="col-lg-9">
														<input class="form-control" name="eimage1" type="file" required="">
														<img src="event/<?php echo $row['17'];?>" alt="eimage" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">image 3</label>
													<div class="col-lg-9">
														<input class="form-control" name="eimage3" type="file" required="">
														<img src="event/<?php echo $row['19'];?>" alt="eimage" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Uid</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="uid" required value="<?php echo $row['21']; ?>">
													</div>
												</div>
											</div>
										</div>

										
											<input type="submit" value="Submit" class="btn btn-primary"name="add" style="margin-left:200px;">
										
									</div>
								</form>
								
								<?php
									} 
								?>
												
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Main Wrapper -->

		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		<script src="assets/plugins/tinymce/tinymce.min.js"></script>
		<script src="assets/plugins/tinymce/init-tinymce.min.js"></script>
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
    </body>

</html>
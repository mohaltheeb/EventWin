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
	
	$title=$_POST['title'];
	$econtent=$_POST['econtent'];
	$type=$_POST['type'];
	$vip=$_POST['vip'];
	$spons=$_POST['spons'];
	$sponscon=$_POST['sponscon'];
	$stype=$_POST['stype'];
	$estart=$_POST['estart'];
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
	
	
	$sql="insert into event (title,econtent,type,stype,vip,estart,spons,eend,sponscon,tickava,price,location,city,state,feature,eimage,eimage1,eimage2,eimage3,eimage4,uid,status)
	values('$title','$econtent','$type','$stype','$vip','$estart','$spons','$eend','$sponscon','$tickava','$price',
	'$loc','$city','$state','$feature','$eimage','$eimage1','$eimage2','$eimage3','$eimage4','$uid','$status')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Event Inserted Successfully</p>";
					
		}
		else
		{
			$error="<p class='alert alert-warning'>Event Not Inserted Some Error</p>";
		}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>EventWin</title>
		
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
									<li class="breadcrumb-item active">Events</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Add Event Details</h4>
								</div>
								<form method="post" enctype="multipart/form-data">
								<div class="card-body">
									<h5 class="card-title">Event Detail</h5>
									<?php echo $error; ?>
									<?php echo $msg; ?>
									
										<div class="row">
											<div class="col-xl-12">
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Title</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="title" required placeholder="Enter Title">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Content</label>
													<div class="col-lg-9">
														<textarea class="tinymce form-control" name="econtent" rows="10" cols="30"></textarea>
													</div>
												</div></br></br>
												
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
														<input type="date" class="form-control" name="estart" required placeholder="Enter the start date">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">End Date</label>
													<div class="col-lg-9">
														<input type="date" class="form-control" name="eend" required placeholder="Enter the end date">
													</div>
												</div>
												
											</div>   
											<div class="col-xl-6">
												
											<div class="form-group row">
													<label class="col-lg-3 col-form-label">VIP Seats</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="vip" required placeholder="Enter VIP Seats  (only by number)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Event Sponsor</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="spons" required placeholder="Enter Event Sponsor">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Sponsor Contact Details</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="sponscon" required placeholder="Enter Sponsor Contact Details">
													</div>
												</div>
												
											</div>
										</div>
										</br></br><h4 class="card-title">Price & Location</h4></br></br>
										<div class="row">
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Ticket Price</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="price" required placeholder="Enter Price">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">City</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="city" required placeholder="Enter City">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">State</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="state" required placeholder="Enter State">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Tickets Available</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="tickava" required placeholder="Enter Number of Tickets Available">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Address</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="loc" required placeholder="Enter Address">
													</div>
												</div>
												
											</div>
										</div>
										
										</br></br><div class="form-group row">
											<label class="col-lg-2 col-form-label">Feature</label>
											<div class="col-lg-9">
											<p class="alert alert-danger">* Important Please Do Not Remove Below Content Only Change <b>Yes</b> Or <b>No</b> or Details and Do Not Add More Details</p>
											
											<textarea class="tinymce form-control" name="feature" rows="10" cols="30">
												<!---feature area start--->
												<div class="col-md-4">
														<ul>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Bathroom : </span>10 </li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Suitable for Children : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Parking : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">GYM : </span>Yes</li>
														</ul>
													</div>
													<div class="col-md-4">
														<ul>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Type : </span>Onsite</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Security : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Resturant : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Place to Pray  : </span>Yes</li>
														
														</ul>
													</div>
													
												<!---feature area end---->
											</textarea>
											</div>
										</div>
												
										<h5 class="text-secondary">Image & Status</h5><hr>
										<div class="row">
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="eimage" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 2</label>
													<div class="col-lg-9">
														<input class="form-control" name="eimage2" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 4</label>
													<div class="col-lg-9">
														<input class="form-control" name="eimage4" type="file" required="">
													</div>
												</div>
												
											</div>
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 1</label>
													<div class="col-lg-9">
														<input class="form-control" name="eimage1" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">image 3</label>
													<div class="col-lg-9">
														<input class="form-control" name="eimage3" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Status</label>
													<div class="col-lg-9">
														<select class="form-control"  required name="status">
															<option value="">Select Status</option>
															<option value="available">Available</option>
															<option value="finish"> Finish</option>
														</select>
													</div>
												</div>
												
												</div>
											</div>
										</div>
										
											<input type="submit" value="Submit" class="btn btn-primary"name="add" style="margin-left:200px;">
										
								</div>
								</form>
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
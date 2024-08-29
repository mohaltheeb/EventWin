<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}


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
	$estart=$_POST['ertart'];
	$eend=$_POST['eend'];
	$price=$_POST['price'];
	$city=$_POST['city'];
	$tickava=$_POST['tickava'];
	$loc=$_POST['loc'];
	$state=$_POST['state'];
	$status=$_POST['status'];
	$uid=$_SESSION['uid'];
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
	
	
	move_uploaded_file($temp_name,"admin/event/$eimage");
	move_uploaded_file($temp_name1,"admin/event/$eimage1");
	move_uploaded_file($temp_name2,"admin/event/$eimage2");
	move_uploaded_file($temp_name3,"admin/event/$eimage3");
	move_uploaded_file($temp_name4,"admin/event/$eimage4");
	
	
	
	$sql = "UPDATE event SET title= '{$title}', econtent= '{$econtent}', type='{$type}', stype='{$stype}',
	vip='{$vip}', estart='{$estart}', spons='{$spons}', eend='{$eend}', sponscon='{$sponscon}', 
	tickava='{$tickava}', price='{$price}', location='{$loc}', city='{$city}', state='{$state}', feature='{$feature}',
	eimage='{$eimage}', eimage1='{$eimage1}', eimage2='{$eimage2}', eimage3='{$eimage3}', eimage4='{$eimage4}',
	uid='{$uid}', status='{$status}' WHERE eid = {$eid}";
	
	$result=mysqli_query($con,$sql);
	if($result == true)
	{
		$msg="<p class='alert alert-success'>Event Updated</p>";
		header("Location:feature.php?msg=$msg");
	}
	else{
		$msg="<p class='alert alert-warning'>Event Not Updated</p>";
		header("Location:feature.php?msg=$msg");
	}
}						
?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!--	Fonts
	========================================================-->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!--	Css Link
	========================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/login.css">

<!--	Title
	=========================================================-->
<title>EventWin</title>
</head>
<body>


<div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
	<div class="d-flex justify-content-center y-middle position-relative">
	  <div class="spinner-border" role="status">
		<span class="sr-only">Loading...</span>
	  </div>
	</div>
</div>
 


<div id="page-wrapper">
    <div class="row"> 
        <!--	Header start  -->
		<?php include("include/header.php");?>
        <!--	Header end  -->
        
        <!--	Banner   --->
        <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Submit Event</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Submit Event</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
         <!--	Banner   --->
		 
		 
		<!--	Submit Event   -->
        <div class="full-row">
            <div class="container">
                    <div class="row">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Submit Event</h2>
                        </div>
					</div>
                    <div class="row p-5 bg-white">
                        <form method="post" enctype="multipart/form-data">
								
								<?php
									
									$pid=$_REQUEST['id'];
									$query=mysqli_query($con,"select * from event where eid='$eid'");
									while($row=mysqli_fetch_row($query))
									{
								?>
												
								<div class="description">
									<h5 class="text-secondary">Basic Information</h5><hr>
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
													<label class="col-lg-3 col-form-label">Event Start Date</label>
													<div class="col-lg-9">
														<input type="date" class="form-control" name="estart" required placeholder="Enter Event Start Date">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Event End Date</label>
													<div class="col-lg-9">
														<input type="date" class="form-control" name="eend" required placeholder="Enter Event End Date">
													</div>
												</div>
												
											</div>   
											<div class="col-xl-6">
												<div class="form-group row mb-3">
													
												</div>
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
										<h5 class="text-secondary">Price & Location</h5><hr>
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
										
										<div class="form-group row">
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
								
							<?php
								} 
							?>
                    </div>            
            </div>
        </div>
	<!--	Submit event   -->
        
        
        <!--	Footer   start-->
		<?php include("include/footer.php");?>
		<!--	Footer   start-->
        
        <!-- Scroll to top --> 
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        <!-- End Scroll To top --> 
    </div>
</div>
<!-- Wrapper End --> 

<!--	Js Link
============================================================--> 
<script src="js/jquery.min.js"></script> 
<script src="js/tinymce/tinymce.min.js"></script>
<script src="js/tinymce/init-tinymce.min.js"></script>
<!--jQuery Layer Slider --> 
<script src="js/greensock.js"></script> 
<script src="js/layerslider.transitions.js"></script> 
<script src="js/layerslider.kreaturamedia.jquery.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/tmpl.js"></script> 
<script src="js/jquery.dependClass-0.1.js"></script> 
<script src="js/draggable-0.1.js"></script> 
<script src="js/jquery.slider.js"></script> 
<script src="js/wow.js"></script> 
<script src="js/custom.js"></script>
</body>
</html>
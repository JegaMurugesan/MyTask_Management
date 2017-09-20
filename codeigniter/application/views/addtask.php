<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<script type='text/javascript' src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
	<script type='text/javascript' src="<?php echo base_url('assets/js/jquery-3.1.0.js');?>"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">
	
	
</head>
<body>

<nav class="navbar navbar-inverse" >
  
    <div class="navbar-header">
      
      <a class="navbar-brand" href="#">Task Management</a>
    </div>
<?php if(!empty($this->session->userdata('id'))){ ?>
<div class="container-fluid" style="float-right">
   <!-- <a class="navbar-brand" href="<?php// echo base_url('welcome/logout');?>">Logout</a>-->
	<ul class="nav navbar-nav navbar-right">
					
						
						<li class="dropdown">
							<a href="<?php echo base_url('index.php/welcome/logout');?>" class="dropdown-toggle" data-toggle="dropdown" style="padding: 15px 15px 15px 15px;color:#ffffff;" aria-expanded="false"><span>Logout   </span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="changepassword.php"><i class="glyphicon glyphicon-edit"></i> <span>Change Password</span></a></li>
							    <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>
							</ul>
						</li>
						
					</ul>
	</div>
	<?php }?>
    
  </div>
</nav>
<div class='container'>
<form class="form-horizontal" method='POST' action="<?php echo base_url('index.php/Welcome/save');?>">
  <fieldset>
    <legend>Task Creation</legend>
	
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">User Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="uname" name='uname' placeholder="User Name">
      </div>
    </div>
   <!-- <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" id="Password" placeholder="Password">
       
      </div>
    </div>-->
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Description</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="desc" name='desc'></textarea>
        <span class="help-block"></span>
      </div>
    </div>
    
    
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
	  <?php echo anchor('welcome/redirect','Cancel',['class'=>'btn btn-default']);?>
        <!--<button type="reset" class="btn btn-default">Cancel</button>-->
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
</div>
<nav class="navbar navbar-inverse" >
 <div class="container-fluid">
    <div class="navbar-header">
      
      <a class="navbar-brand" href="#"></a>
    </div>
	</div>
</nav>

</body>
</html>
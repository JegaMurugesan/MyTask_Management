<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>
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
</nav>
<ul class="nav navbar-nav navbar-right">
					
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding: 15px 15px 15px 15px;color:#ffffff;" aria-expanded="false"><span>jega   </span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="changepassword.php"><i class="glyphicon glyphicon-edit"></i> <span>Change Password</span></a></li>
							    <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>
							</ul>
						</li>
						
					</ul>
<div class='container'>

<?php //if(isset($this->session->userdata('success'))){ ?>
<!--<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
</div>--><?php// }?>
<h3>View All Posts</h3>
<?php echo anchor('welcome/create','Add Posts',['class'=>'btn btn-primary']);?>
<div class="table-responsive">
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Description</th>
      <th>Creation Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  <?PHP foreach($value as $row)
    {
        $id                     =   $row->id;
        $name            	    =   $row->name;       
        $description            =   $row->description;       
	    $create_date            =   $row->date_created;     
	?>
    <tr>
      <td><?php echo $id;?></td>
      <td><?php echo $name;?></td>
      <td><?php echo $description;?></td>
      <td><?php echo $create_date;?></td>
      <td><?php echo anchor('welcome/view/'.$id,'View',['class'=>'label label-default']);?>
	  <?php echo anchor('welcome/edit/'.$id,'Edit',['class'=>'label label-success']);?>
	  <?php echo anchor('welcome/delete/'.$id,'Delete',['class'=>'label label-danger']);?>
	  </td>
    </tr>
   <?PHP }?>
  </tbody>
</table> 

</div>
<ul class="pagination">
  <li class="disabled"><a href="#">&laquo;</a></li>
  <li class="active"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  
  <li><a href="#">&raquo;</a></li>
</ul>
</div>
<!--<nav class="navbar navbar-inverse" >
 <div class="container-fluid">
    <div class="navbar-header">
      
      <a class="navbar-brand" href="#"></a>
    </div>
    </div>
</nav>-->

</body>
</html>
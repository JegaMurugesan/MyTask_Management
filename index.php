<!DOCTYPE html>
<html>
<head>
<title>Submit PHP Form without Page Refresh using jQuery, Ajax</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <div class="row">
  <div class="col-md-offset-3 col-md-6">
     <div class="panel panel-primary">
    <div class="panel-heading">Submit PHP Form without Page Refresh using jQuery, Ajax</div>
      <div class="panel-body">   
        <div id="form-container">
            <form method="post" id="signup-form" autocomplete="off">
                        
                <div class="form-group">
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required />
                </div>
                            
                <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Mail" required />
                </div>
                            
                <div class="form-group">
                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Contact No" required />
                </div>
                            
                <hr />
                            
                <div class="form-group">
                <button class="btn btn-primary">Submit</button>
                </div>
                        
            </form>   
         </div>  
        </div>
      </div>
    </div>
</div>
</body>
</html>
<script>
$('#signup-form').submit(function(e){
    e.preventDefault(); // Prevent Default Submission
    $.ajax({
    url: 'ajaxsubmit.php',
    type: 'POST',
    data: $(this).serialize(), // it will serialize the form data
        dataType: 'html'
    })
    .done(function(data){
        $('#form-container').fadeOut('slow', function(){
             $('#form-container').fadeIn('slow').html(data);
        });
    })
    .fail(function(){
        alert('Ajax Submit Failed ...');    
    });
});
</script>
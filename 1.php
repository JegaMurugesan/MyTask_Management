 <html>
 <style>
#imagePreview {
    width: 180px;
    height: 180px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>
 <script type="text/javascript" src="jquery-1.3.2.js"> </script>
<script type="text/javascript">
$(function() {
    $("#uploadFile").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>
 <script type="text/javascript">

 $(document).ready(function() {

 // function read(e){
	// $("#imagePre").html(e); 
 // };
 $("#uploadFile").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
 
    $("#display").click(function() {                

      $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "2.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#responsecontainer").html(response); 
            //alert(response);
        }

    });
});
});

</script>

<body>
<h3 align="center">Manage Student Details</h3>
<table border="1" align="center">
 <tr>
       <td> Name:<input type="text" id="name" value="" /> </td>
   </tr>
    <tr>
       <td> Email:<input type="text" id="email" value="" /> </td>
   </tr>
    <tr>
       <td> Phone:<input type="text" id="phone" value="" /> </td>
   </tr>
    <tr>
	<div id="imagePreview"></div>
	<input id="uploadFile" type="file" name="image" class="img" />
       <td> Image:<input type="file" id="image" onchange='read(this);' /> </td>
       <td>  <img src="" id="imagePre" style='height:40px,width:40px' /> </td>
   </tr>
   <tr>
       <td> <input type="button" id="display" value="Display All Data" /> </td>
   </tr>
</table>
<div id="responsecontainer" align="center">

</div>
</body>
</html>
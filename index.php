  
// <?php // include"connection.php";
 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme Company Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
 
.form-control{
  display: block;
  width:50%;



}


.content {
    max-width: 300px;
    margin: auto;
    background: white;
    padding: 10px;
}



#myModal input, #myModal input{

margin-top: 10px;
}
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">


<?php  include'header.php';   ?>


<div class="jumbotron text-center">
  <h1>Company</h1> 
  <p>We specialize in blablabla</p> 
  <form>
    <div class="input-group">
      <input type="email" class="form-control" size="50" placeholder="Email Address" required>
      <div class="input-group-btn">
        <button type="button" class="btn btn-danger">Subscribe</button>
      </div>
    </div>
  </form>
</div><br><br>
<br>
<br>
<br>
<br>






//

<div class="container" >
  <h2>Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">


          <p>Some text in the modal.</p>






  
  <h2>login </h2>

 <form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" > 
 
  

    <div class="form-group">
      <label for="name">Email:</label>
      <input type="text" class="form-control " name="email"  placeholder="Enter  email....">

    </div>

   <div class="form-group form">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="show" name="password" placeholder="Enter password">
    

    </div>

   
     <button type="submit" class="btnlogin" name="login">Login</button>
      </form>
  

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>










<div class="container">
<form class="navbar-form navbar-left">
      <div class="form-group">
        <input type="text " name="search_box" id="search_box" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>



  <h2>Table</h2>
  <p>The .table-responsive class creates a responsive table which will scroll horizontally on small devices (under 768px). When viewing on anything larger than 768px wide, there is no difference:</p>                                                                                      
  <div class="table-responsive" id="dynmic_content">          
  
  </div>
</div>



<script type="text/javascript">
  









 $(document).ready(function(){


function load_data(page, query=''){


$.ajax({


url:"fetch.php",
method:"POST",
data:{
"page":page,
"query":query

},



success:function(data){

  
$("#dynmic_content").html(data);
}



});



}


load_data(1);


/*
loadata();

//pagination code 


$(document).on("click", ".pagination_link", function(e)  {

e.preventDefault();

var page = $(this).attr("id");

loadData(page);
 });

*/




$('#search_box').keyup(function(){


var query=$('#search_box').val();

load_data(1, query);



});




$(document).on('click', '.page-link', function(){


var page =$(this).data('page_number');
var  query = $('#search_box').val();

load_data(page, query);


});





});






</script>







<?php include'footer.php'  ?>  

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>

<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_theme_company_complete_animation by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Apr 2017 16:54:31 GMT -->
</html>

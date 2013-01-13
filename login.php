<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IEEP | Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>

<body class="preview" data-spy="scroll" data-target=".subnav" data-offset="80">


 <div class="navbar navbar-fixed-top">
   <div class="navbar-inner">
     <div class="container">
       
       <a class="brand" href="index.html">IEEP</a>
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a><div class="nav-collapse" id="main-menu">
        <ul class="nav pull-right" id="main-menu-right">
          <li><a onclick="window.open ('login.html','_self',false)">Login</a></li>
          <li><a onclick="window.open ('signup.html','_self',false)">Signup</a></li>
          </ul>
        
       </div>
     </div>
   </div>
 </div>

    <div class="container">    


<section id="typography">
  <div class="page-header">
<br /><br /><br />   
 <h3>Interactive Environmental Education Portal</h3>
  </div>



  <div class="row">

    
    <div style="text-align:center" class="span12">
      
  <div class="row">
    <div class="span6 offset3">
         <?php
              if(isset($_REQUEST['failed']))
              {
                echo "<div class='alert alert-error'> Username Or Password is Wrong </div>";
              }
              elseif(isset($_REQUEST['retry']))
              {
                echo"<div class='alert alert-success'> Email sent successfully, Please Login again with the new Password </div> ";
              }
              elseif(isset($_REQUEST['xyz']))
              {
                echo "<div class='alert alerrt-success'> Email ID not found, Please <a href='signup.html'>Sign up</a> </div>";
              }
         ?>
        <form class="well form-search" method="post" action="form_action.php" name="login">
          <legend>Login</legend>
          <input type="text" class="input-small" placeholder="Username" name="username">&nbsp;&nbsp;
          <input type="password" class="input-small" placeholder="Password" name="password">&nbsp;&nbsp;
          <input name="action" id="action" value="login" type="hidden">
          <button type="submit" class="btn">Go</button>
        </form>
    <a href="reset_password.php">Forgot Password?</a>

      </div>
  </div>
  
    </div>

    

  </div>
  
  
</section>



<div class="navbar navbar-fixed-bottom">
   <div class="navbar-inner" style="text-align:center">
     <div class="container">
     <div class="nav-collapse" id="main-menu">
        <div class="btn-group">
  <button class="btn" onclick="window.open ('about.html','_self',false)">About</button>
  <button class="btn" onclick="window.open ('approach.html','_self',false)">Approach</button>
  <button class="btn" onclick="window.open ('research.html','_self',false)">Research</button>
  <button class="btn" onclick="window.open ('team.html','_self',false)">Team</button>
  <button class="btn" onclick="window.open ('contact.html','_self',false)">Contact Us</button>
  <button class="btn" onclick="window.open ('faq.html','_self',false)">FAQs</button>


</div>
        
       </div>
     
     </div></div></div>

  
       <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
   
<br><br><br><br>


    </div><!-- /container -->



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    


  

</body>
</html>

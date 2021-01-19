<!doctype html>
<html lang="en">

<head>
  <title>R&E</title>
  <link rel="icon" href="images/RElogo.png" type="image/gif" sizes="16x16">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Crimson+Text|Work+Sans:400,700" rel="stylesheet">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="buttons.css">
  <link rel="stylesheet" href="animatedbuttons.css">
  <link rel="stylesheet" href="animatedfonts.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
body {
  overflow-y: hidden; /* Hide vertical scrollbar */
  overflow-x: hidden; /* Hide horizontal scrollbar */
}
  h1 {
    color: #2eaf7d;
    font-family: "Montserrat", sans-serif;
    text-transform: uppercase;
    font-size: 70px;
    font-weight: bold;
    letter-spacing: -1px;
    line-height: 1;
    text-align: center;
    text-shadow: 2px 2px 8px #000000;
  }

  h2 {
    color: #2eaf7d;
    font-family: "Montserrat", sans-serif;
    text-transform: uppercase;
    font-size: 30px;
    font-weight: 300;
    line-height: 32px;
    text-align: center;
    text-shadow: 1px 1px 3px #000000;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed;
    height: 100%;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
  }


  input[type=text],
  input[type=password] {
    padding: 10px;
    margin: 10px 0;
    box-sizing: border-box;
    background: transparent;
    display: block;
    height: 45px;
    color: #555555;
    padding: 0 2px;
    width: 95%;
    border: none;
    border-bottom: 1px solid #2EAF7D;
  }
</style>

<body>

  <table>
    <tr>
      <td width="75%" style="">
        <div>
          <!-- Content Starts Here -->

          <div class="container">
            <h1 class="text1">CVSU CCAT</h1>
            <h2 class="text2">Research and Extension</h2>
          </div>
          <br>
          <div align="center">
            <button class="shrink-border" onclick="window.location.href='signin.php'">ADMIN</button>
            <button class="material-bubble" onclick="window.location.href='publicsearch.php'">RESEARCHER</button>
          </div>

          <!-- Content End Here -->
        </div>
      </td>
      <td width="25%" style="background-color: #fafafa">
        <div style="padding-left: 20px;">
          <!-- Content Starts Here -->
          <form method="POST" action="userInfo.php" id = "myForm" enctype="multipart/form-data">
            <h3>Create New Account</a></h3>
            <input type="text" pattern="[a-zA-Z]+*.{3,}" title="Please enter on alphabets only" name = "firstname" placeholder="First name" autocomplete="off" required><br>
            <input type="text" pattern="^[a-zA-Z]+*" title="Please enter on alphabets only" name = "lastname" placeholder="Last name" autocomplete="off" required><br>
            <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title = "Invalid Email Address" name = "contact" placeholder="Email Address" autocomplete="off" required><br>
            <input type="text" name = "username" placeholder="Username" autocomplete="off" required><br>
            <input type="password" pattern=".{5,}" title="Eight or more characters" name = "password" placeholder="New Password" autocomplete="off" required><br>
            <input type="password" name = "confirmpassword" placeholder="Confirm New Password" autocomplete="off" required><br>
            
            <input type="submit" id = "sub" class="btn btn-primary" value="Signup">
          </form>
          <span id = "result"></span>
          <!-- Content End Here -->
        </div>
      </td>
    </tr>
  </table>
  <script>
$("#sub").click( function() {
 $.post( $("#myForm").attr("action"), 
         $("#myForm :input").serializeArray(), 
         function(info){ $("#result").html(info); 
   });
});
 
$("#myForm").submit( function() {
  return false;	
});
 
function clearInput() {
	$("#myForm :input").each( function() {
	   $(this).val('');
	});
}
    </script>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

</body>

</html>
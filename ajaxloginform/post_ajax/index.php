<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Ajax</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class = "bg-dark">

<!-- my ajax 1 start
        <input type="text" id = "get-data">
        <p class = "text-white" id = "result">1</p>


    <script>
$(document).ready(function(){
  $("#get-data").keyup(function(){
    var txt = $("#get-data").val();
    $.post("query.php", {suggest: txt}, function(data){
      $("#result").html(data);
    });
  });
});
</script>
my ajax 1 end -->
   <!-- ----------------------------------------------------------------------- -->

   <h1>Processing an AJAX Form</h1>

<!-- OUR FORM -->
<form action="process.php" method="POST">

    <!-- NAME -->
    <div id="name-group" class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Henry Pym">
        <!-- errors will go here -->
    </div>

    <!-- EMAIL -->
    <div id="email-group" class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" placeholder="rudd@avengers.com">
        <!-- errors will go here -->
    </div>

    <!-- SUPERHERO ALIAS -->
    <div id="superhero-group" class="form-group">
        <label for="superheroAlias">Superhero Alias</label>
        <input type="text" class="form-control" name="superheroAlias" placeholder="Ant Man">
        <!-- errors will go here -->
    </div>

    <button type="submit" class="btn btn-success">Submit <span class="fa fa-arrow-right"></span></button>

</form>

  
 <h1>jQuery Ajax Post Form Result</h1>
  
 <span id="output"></span>

   <script>
   
   $(document).ready(function() {

// process the form
$('form').submit(function(event) {

    // get the form data
    // there are many ways to get this data using jQuery (you can use the class or id also)
    var formData = {
        'name'              : $('input[name=name]').val(),
        'email'             : $('input[name=email]').val(),
        'superheroAlias'    : $('input[name=superheroAlias]').val()
    };

    // process the form
    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'query.php', // the url where we want to POST
        data        : formData, // our data object
        dataType    : 'json', // what type of data do we expect back from the server
        encode      : true
    })
        // using the done promise callback
        .done(function(data) {

            // log data to the console so we can see
            $("#output").html(data);

            // here we will handle errors and validation messages
        });

    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
});

});
   </script>
</body>
</html>
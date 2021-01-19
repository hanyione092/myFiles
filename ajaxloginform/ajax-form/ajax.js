$(document).ready(function(e){
    // Submit form data via Ajax
    $("#fupForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'process.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm').css("opacity",".5");
            },
            success: function(response){ //console.log(response);
                $('.statusMsg').html('');
                if(response.status == 1){
                    $('#fupForm')[0].reset();
                    $('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>');
                }else{
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#fupForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
});

// $('#form-submit').on('click', function() {
//     var form_name = $("#name").val(); 
//     var file_data = $('#file').prop('files')[0];   
//     var form_data = new FormData();   
    
//     form_data.append('file', file_data);
//     alert(form_data);           

//     $.ajax({
//         url: 'process.php', // point to server-side PHP script 
//         dataType: 'text',  // what to expect back from the PHP script, if anything
//         cache: false,
//         contentType: false,
//         processData: false,
//         data: form_data,                         
//         type: 'POST',
//         success: function(php_script_response){
//             alert(php_script_response); // display response from the PHP script, if any
//         }
//      });
// });

// $(document).ready(function(){
//     $("form").submit(function(event){
//         event.preventDefault();
//         var title = $("#title").val();
//         var fileToUpload = $('#file').prop('files')[0];
//         $("#form-message").load("process.php", {
//             title: title,
//             file: fileToUpload
//         });
//     });
// });
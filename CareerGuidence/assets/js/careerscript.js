 var baseurl = "http://localhost/CareerGuidence/";


/**Bridex Registration form submission**/
$('#contactforms').submit(function(e){
e.preventDefault(); 
	var name = $("#name").val();
	var email = $("#email").val();
	var phone = $("#phone").val();
	var subject = $("#subject").val();
	var msg = $("#msg").val();

          					$.ajax({
              				type: "POST",
              				data:new FormData(this),
              				url:  baseurl + 'PublicModule/contactform',
              				dataType: 'json',
             				processData:false,
             				contentType:false,
             				cache:false,
             				async:true,
             				  success: function(result){
       					 if (result == 1) 
        					{   

    						toastr.success('Registered succesfully..!');
    						 window.location.href=baseurl + 'PublicModule/contact'; 
    						
       						}
       					}
         				});
});

$('#registerform').submit(function(e){
e.preventDefault(); 

	 var name = $("#name").val();
	 var email = $("#email").val();
	 var pwd = $("#pwd").val();
	 var cpwd = $("#cpwd").val();
	 var dob = $("#dob").val();

	 var gender = $("#gender").val();
	 var phone = $("#phone").val();
	 var address = $("#address").val();
	 var image = $("#image").val();

	var validExtensions = ['jpg','png','jpeg']; 
	var fileNameExt = image.substr(image.lastIndexOf('.') + 1);
				$.ajax({
              		type: "POST",
              		data:new FormData(this),
              		url:  baseurl + 'PublicModule/registerform',
              		dataType: 'json',
             		processData:false,
             		contentType:false,
             		cache:false,
             		async:true,
             		success: function(result)
             		{
       					if (result == 1) 
        				{   

    						toastr.success('Registered succesfully..!');
    						window.location.href=baseurl + 'PublicModule/login'; 
       					}
					}
         		});
          	
});

$('#updateform').submit(function(e){
e.preventDefault(); 

   var name = $("#name").val();
   var email = $("#email").val();
   var dob = $("#dob").val();

   var gender = $("#gender").val();
   var phone = $("#phone").val();
   var address = $("#address").val();
   var image = $("#image").val();

  var validExtensions = ['jpg','png','jpeg']; 
  var fileNameExt = image.substr(image.lastIndexOf('.') + 1);
        $.ajax({
                  type: "POST",
                  data:new FormData(this),
                  url:  baseurl + 'UserModule/updateform',
                  dataType: 'json',
                processData:false,
                contentType:false,
                cache:false,
                async:true,
                success: function(result)
                {
                if (result == true) 
                {   
                   alert(result);

                // toastr.success('Updated succesfully..!');
                // window.location.href=baseurl + 'UserModule/user_index'; 
                }
                else
                {
                  alert('false');
                }
          }
            });
            
});







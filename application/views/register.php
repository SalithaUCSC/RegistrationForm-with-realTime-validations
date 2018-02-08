<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registration Form</title>
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css">
    <!-- dropify CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dropify/css/dropify.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css">
    <!-- set color for jQuery error messages -->
	<style type="text/css">
        /*CSS for validation plugin error*/
		.error {
			color: #C6070A;
		}
        /*CSS for password strength checker messages*/
        .short{
            color:#FF0000;
        }
        .weak{
            color:orange;
        }
        .good{
            color:blue;
        }
        .strong{
            color: green;
        }
	</style>

</head>
<body>
   <div class="col-lg-12">
    <h3 style="margin-top: 30px;text-align: center;">Registration Form with Real Time Validations using <span class="text-primary">jQuery validation plugin</span>, <span class="text-success">Dropify plugin</span>, <span class="text-warning">CI</span> and <span class="text-danger">Ajax</span></h3>
   	<div class="row">
        <div class="col-lg-4">
            <div class="card" style="margin-top: 25px;">
                    <br>
                <div class="card-body">
                    <p style="text-align: justify;">I have designed this registration form including the below functionalities. All are done real time...</p>
                    <ul class="list-group">
                      <li class="list-group-item"><span class="col-lg-1"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span> Check username availability</li>
                      <li class="list-group-item"><span class="col-lg-1"><i class="fa fa-user-circle" aria-hidden="true"></i></span> Check username length</li>
                      <li class="list-group-item"><span class="col-lg-1"><i class="fa fa-envelope-open" aria-hidden="true"></i></span> Check email type</li>
                      <li class="list-group-item"><span class="col-lg-1"><i class="fa fa-phone" aria-hidden="true"></i></span> Check phone number length</li>
                      <li class="list-group-item"><span class="col-lg-1"><i class="fa fa-file-text-o" aria-hidden="true"></i></span> Check image format</li>
                      <li class="list-group-item"><span class="col-lg-1"><i class="fa fa-eye" aria-hidden="true"></i></span> Image upload and preview</li>
                      <li class="list-group-item"><span class="col-lg-1"><i class="fa fa-minus-circle" aria-hidden="true"></i></span> Image remove</li>
                      <li class="list-group-item"><span class="col-lg-1"><i class="fa fa-key" aria-hidden="true"></i></span> Check password length</li>
                      <li class="list-group-item"><span class="col-lg-1"><i class="fa fa-check-circle-o" aria-hidden="true"></i></span> Check password strength</li>
                      <li class="list-group-item"><span class="col-lg-1"><i class="fa fa-key" aria-hidden="true"></i></span> Check confirm password matching</li>
                    </ul>
                </div>
            </div>           
        </div>
        <div class="col-lg-8">
            <br>              
            <div class="card" style="margin-bottom: 50px;">
                    <br>
                <div class="card-body">
                    <!-- success message to be displayed after adding a user to the database successfully -->
                    <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                                <?php echo $this->session->flashdata('success');?>
                        </div>
                    <?php endif; ?>
                    <!-- Form -->
                    <?php echo form_open_multipart('Register/signUp', array('id' => 'register-form','method' => 'POST'));?>
                        <div class="form-row">
                        	<div class="col">
                            	<label>Username</label>  
                            	<br>                        
                                <input type="text" id="username" name="username" class="form-control" placeholder="Enter a Username">
                                <div id="username_result"></div>
                               
                            </div> 
                        	<div class="col">
                            <label>Full Name</label>
                            <br>
                                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Enter Your Full Name">
                            <br>
                        	</div>                            	                                           
                        </div>                          
                        <div class="form-row">
                        	<div class="col">
                            <label>Email</label>
                            <br>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter Your Email">
                            <br>
                        	</div>
                        	<div class="col">
                            <label>Phone Number</label>
                            <br>
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter Mobile number">
                            <br>
                        	</div>
                        </div>                                            
                        <div class="form-row">
                            <div class="col">
                            <label>Password</label>
                            <br>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Type a Password">
                                <div id="result"></div>
                            <br>
                            </div>
                        	<div class="col">
                            <label>Confirm Password</label>
                            <br>
                                <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Retype Your Password">
                            <br>  
                            </div>
                        </div>  
                        <div class="form-row">
							<div class="col">
                            <label>Profile Picture</label>
                            <br>
                                <!-- include class dropify and check extension -->
                                <input type="file" id="userfile" name="userfile" class="dropify" data-allowed-file-extensions="jpg png gif jpeg">
                                
                            <br>
                            </div>
                            <div class="col"></div>                         	
                        </div>                                                                          
                        <input type="submit" class="btn btn-primary" value="Register">
                        <br><br>                                     
                    <?php echo form_close();?>              
                </div>
            </div>

        </div> 
        <!-- <div class="col-lg-2"></div> -->
        </div>    
    </div>
    <!-- jQuery JS -->
    <script src="<?php echo base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
    <!-- dropify JS -->
    <script src="<?php echo base_url() ?>assets/dropify/js/dropify.js"></script>
    <!-- jQuery validation plugin JS -->
	<script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
    <!-- Bootstrap JS -->
	<script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
    <!-- validation plugin configuration -->
    <script type="text/javascript">
        // wait untill the page is loaded completely
        $(document).ready(function(){
            // include the dropify function comes with dropify JS
        	$('.dropify').dropify();
            // check the username availability real time
            $('#username').change(function(){
                var username = $('#username').val();
                if(username != ''){
                    $.ajax({
                        url: "<?php echo base_url(); ?>Register/checkUsername",
                        method: "POST",
                        data: {username:username},
                        success: function(data){
                            $('#username_result').html(data);
                        }
                    });
                }
            });
            // include the validation plugin for the form
            $('#register-form').validate({
            // set validation rules for input fields
                rules: {
                    username: {
                        required : true
                    },
                    fullname: {
                        required : true
                    },                   
                    email: {
                        required : true,
                        email: true
                    },
                    phone: {
                        required : true,
                        minlength: 10
                    },                    
                    password: {
                        required : true                        
                    },
                    cpassword: {
                        required : true,
                        equalTo: "#password"
                    }
                },
            // set validation messages for the rules are set previously
                messages: {
                    username: {
                        required : "Username is required"
                        
                    },
                    fullname: {
                        required : "Full Name is required"
                    },                    
                    email: {
                        required : "Email is required",
                        email: "Enter a valid email. Ex: example@gmail.com"
                    },
                    phone: {
                        required : "Phone Number is required",
                        minlength: "Password must contain 10 numbers"
                    },                   
                    password: {
                        required : "Password is required"
                    },
                    cpassword: {
                        required : "Confirm Password is required",
                        equalTo: "Confirm Password must be matched with Password"
                    }                   
                }
            });
            $('#password').keyup(function() {
                $('#result').html(checkStrength($('#password').val()))
                })
                function checkStrength(password) {
                var strength = 0
                if (password.length < 6) {
                    $('#result').removeClass()
                    $('#result').addClass('short')
                    return '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Too short'
                }
                if (password.length > 7) strength += 1
                // If password contains both lower and uppercase characters, increase strength value.
                if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
                // If it has numbers and characters, increase strength value.
                if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
                // If it has one special character, increase strength value.
                if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
                // If it has two special characters, increase strength value.
                if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
                // Calculated strength value, we can return messages
                // If value is less than 2
                if (strength < 2) {
                    $('#result').removeClass()
                    $('#result').addClass('weak')
                    return '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Weak'
                } else if (strength == 2) {
                    $('#result').removeClass()
                    $('#result').addClass('good')
                    return '<i class="fa fa-check" aria-hidden="true"></i> Good'
                } else {
                    $('#result').removeClass()
                    $('#result').addClass('strong')
                    return '<i class="fa fa-thumbs-up" aria-hidden="true"></i> Strong'
                }
            }
        });
    </script>	
</body>
</html>
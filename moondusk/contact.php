<!doctype html>

<?php
require_once 'includes/init.php';


$finalmessage = '';
$listslidshow = array();
$listproduct = array();
if(Input::exists('post'))
{
	
	$db = new DB();
	
	if(Validation::vlidate(Input::getPost('name'), array(
    	'required' => true,
    	'min'      => 2,
    	'max'      => 30
    	), 'Name')) {
		if(Validation::vlidate(Input::getPost('email'), array(
			'required' => true,
			'email' => true
			), 'Email')) {
			if(Validation::vlidate(Input::getPost('subject'), array(
				
				'min'      => 2,
				'max'      => 30
				), 'Subject')) {
				if(Validation::vlidate(Input::getPost('message'), array(
					'required' => true,
					'min'      => 2,
					'max'      => 100
					), 'Message')) {
								
								
				
											$name = Input::getPost('name');
											$email = Input::getPost('email');
											$subject = Input::getPost('subject');
											$message = Input::getPost('message');
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											$inquiry = new InquiryModel($name, $email, $subject, $message);
											$isInquiryAdd = $db->addInquiry($inquiry);
											
											if($isInquiryAdd->dbstatus == 'sucess') {
											
												
												
												
												$finalmessage = 'Thank You! We will be in touch';
												
												
											
											} else if($isInquiryAdd->dbstatus == 'fail') {
												
												
												
												$finalmessage = 'Sorry there was an error sending your message. Please try again later';
												
											}
											
											
											$to = "parthkalaria13@gmail.com";
											
											
											
													
											
											
											$headers = "MIME-Version: 1.0" . "\r\n";
											$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
											$headers .= "From: " . $name . " <" . $email . ">" . "\r\n" .
													"Reply-To: " . $email . "\r\n" .
													"X-Mailer: PHP/" . phpversion();
											
											
											
											$ismessagesend = mail($to,$subject,$message, $headers);
										
										
							
				} else {
					
					
					$finalmessage = 'Please enter your message';
					
				}
			} else {
				
				
				$finalmessage = 'Please enter your subject';
				
			}
		} else {
			
			
			$finalmessage = 'Please enter a valid email address';
			
		}
	} else {
		
		
		$finalmessage = 'Please enter your name';
		
	}
	
	
}




	


?>


<html>
    <head>
        <meta charset="utf-8">
        <title>MoonDusk</title>
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        
        <link href="css/style.css" rel="stylesheet">
    </head>
    
    <body>
    	<header id="header">
            <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php"><img src="images/logo_name.png" alt="logo"></a>
                    </div>
                    
                    <div class="collapse navbar-collapse navbar-right">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php#home" class="homenav">Home</a></li>
                            <li><a href="index.php#about" class="homenav">About</a></li>
							<li><a href="index.php#work-process" class="homenav">Services</a></li>
                            <li><a href="portfolio.php">Portfolio</a></li>
                            
                            <li><a href="contact.php" class="active">Contact</a></li>                           
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
		
		<section id="contact">
        	<div class="container">
            	<div class="row">
                	<div class="col-sm-12">
                        <h2>Contact Us</h2>                
                		
                        
                        
                    </div>
                    
                    
                </div>
                <div class="row">
                	<div class="col-lg-8 col-md-7 col-sm-6 col-xs-12">
                    
                    	<div>
                            <div class="row">
                                
                                    <img class="img-responsive" src="images/icons/home.png" alt="">
                                
                                    <h4>Address</h4>
                                
                            </div>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">
                                    <blockquote><p>19, Balaji Complex, 1st Floor, Near Hanuman Madhi, Raiya Road Rajkot - 360007</p></blockquote>
                                    
                                    
                                    <blockquote><p>Reg. Office : MoonDusk Enterprise, 2 - Bhaktinagar Station Road, Rajkot - 360002</p></blockquote>
                        		</div>
                        	</div>
                        </div>
                        
                        <div>
                            <div class="row">
                                
                                    <img class="img-responsive" src="images/icons/phone.png" alt="">
                                
                                    <h4>Phones</h4>
                                
                            </div>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">
                                	<blockquote><p>+91 99043 23121 <br/>+91 74055 23121</p></blockquote>
                                </div>
                        	</div>
                            
                            
                            
                        </div>
                        
                        
                        
                        <div>
                            <div class="row">
                                
                                    <img class="img-responsive" src="images/icons/email.png" alt="">
                                
                                    <h4>Email</h4>
                                
                            </div>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">
                            		<blockquote><p>info@moonduskpro.com</p></blockquote>
                            	</div>
                        	</div>
                            
                            
                            
                        </div>
                        
                    	
                        
                        
                    </div>
                    
                    <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                    	<div class="contact-form">
                        <h3>Send us Inquiry</h3>
                            <form id="mycontactform" name="contact-form" method="post" action="contact.php#mycontactform">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-control" rows="8" placeholder="Message" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-warning">Send Message</button>
                                
                                <?php 
									if($finalmessage == '') {?>
										<label id="mycontactformmessage" style="display: none;">My Message</label>
									<?php } else {?>
										<label id="mycontactformmessage" style="display: block;"><?php echo $finalmessage; ?></label>
									<?php }
								?>
								
                                
                            </form>
                        </div>
                    </div>
                </div>
				
				
                
            </div>
			
			
        </section>
		
		<section id="map">
			<div class="container">
				<div class="row" id="mapback">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="gmap">
							<img src="images/map_address.png" alt="logo">
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<footer>
        <div class="container">
            
            <img src="images/logo.png" alt="logo">
            <div class="footerlinks"><!-- FOOTER LINKS START -->            
                <ul>
                    <li><a href="index.php#home" class="homenav">Home</a></li>
                            <li><a href="index.php#about" class="homenav">About</a></li>
							<li><a href="index.php#work-process" class="homenav">Services</a></li>
                            <li><a href="portfolio.php">Portfolio</a></li>
                            
                            <li><a href="contact.php" class="active">Contact</a></li>                 
                </ul>
            </div><!-- FOOTER LINKS END -->
             
            <div class="copyright"><!-- FOOTER COPYRIGHT START -->
                <p>&copy; 2016 <a target="_blank" href="http://it.moonduskpro.com/" title="MoonDusk Infotech">MoonDusk Ent.</a></p>
            </div><!-- FOOTER COPYRIGHT END -->
             
            
     </footer><!-- FOOTER END -->
    	
        <script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        
    </body>
</html>
<?php
    //INCLUDING REQUIRED PHPMailer FILES
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';

    //DEFINING NAME SPACES
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	$mail = new PHPMailer(); //CREATING INSTANCE OF PHPMailer

	$name = $_POST['name'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	$message = $_POST['message'];

	$mail->isSMTP(); // SETTING MAILER TO USE SMTP
	$mail->Host = "email-smtp.us-east-2.amazonaws.com"; //DEFINING SMTP HOST
	$mail->SMTPAuth = true; //ENABLING SMTP AUTHENTICATION
	$mail->SMTPSecure = "tls"; //SETTING THE SMTP ENCRYPTION TYPE (ssl/tls)
	$mail->Port = "587"; //SETTING THE PORT TO CONNECT TO

    //DEFINING THE SMTP USER'S EMAIL AND PASSWORD
	$mail->Username = "AKIA2X2D7FAAB2K54KV3"; 
	$mail->Password = "BGMMOQ+b5DAxiuEq4YQXaEVNYnhKLoUKLzHsnHGAsmXd"; 

	$mail->Subject = "Contact Request | Supreme Buildit"; //DEFINING THE EMAILS'S SUBJECT
	$mail->setFrom("activemediaemailer@gmail.com", "Supreme Build It Contact Request."); //DEFINING SENDER EMAIL
    $mail->addReplyTo($email, $name); //SETTING THE EMAIL THAT RECIEVER WILL BE ABLE TO REPLY TO
    // $mail->addCC('cc@example.com'); //DEFINING EMAILS OF PEOPLE THAT WILL BE COPIED ON THE EMAIL
	$mail->isHTML(true); //ENABLING HTML SO WE CAN STYLE EMAIL USING HTML AND CSS
	$mail->Body = "
	<div style='padding: 20px; font-family: Arial, Helvetica, sans-serif ; color:#333 ; background:#eee; border:1px #111; width: 650px; max-width: 700px; margin:auto'>
			<h3 style = 'border-radius: 5px ; background: #fff; padding: 20px;  border: 1px #ddd solid; text-align: center;'>Supreme Buildit | Contact Request</h3>

			<div style = 'background: #fff; padding: 20px;  border: 1px #ddd solid; margin-bottom:20px ;max-width:900px; margin:auto; margin-bottom: 30px;'>
				<div  style='display: flex; margin-bottom: 20px; align-items: baseline;'>
						<div style='font-weight: 700; background: #eee; padding: 10px; min-width: 80px; margin-right: 20px'>Name : </div>
						<div style=' background: rgba(0,0,0,.02); padding: 10px;' > ".$name." </div>
				</div>

				<div  style='display: flex; margin-bottom: 20px; align-items: baseline;'>
						<div style='font-weight: 700; background: #eee; padding: 10px; min-width: 80px; margin-right: 20px'>Email : </div>
						<div style=' background: rgba(0,0,0,.02); padding: 10px;' > ".$email." </div>
				</div>

				<div  style='display: flex; margin-bottom: 20px; align-items: baseline;'>
						<div style='font-weight: 700; background: #eee; padding: 10px; min-width: 80px; margin-right: 20px'>Number : </div>
						<div style=' background: rgba(0,0,0,.02); padding: 10px;' > ".$number." </div>
				</div>

				<div  style='display: flex; margin-bottom: 20px; align-items: baseline;'>
						<div style='font-weight: 700; background: #eee; padding: 10px; min-width: 80px; margin-right: 20px'>Message : </div>
						<div style=' background: rgba(0,0,0,.02); padding: 10px;' > ".$message." </div>
				</div>
			</div>
	
			<footer style='background: #333; padding: 20px;'>
				<div style ='display: flex; justify-content: center;'>

					<div style='flex: 1;display: flex; justify-content: center;'>
							<a href='http://www.activemi.co.za/'>
								<img src='http://www.activemi.co.za/img/logo.png'
									alt='active media logo'
									style='object-fit: contain; object-position: center; min-width: 70px; width: 100px'
									/>
							</a>
					</div> 

				</div> 
			</footer>        
					
		</div>";

	// $mail->addAddress('kay@theactivechurch.org'); //DEFINING THE RECIEVER OF THE EMAIL
	$mail->addAddress('info@supreme.co.za'); //DEFINING THE RECIEVER OF THE EMAIL

    //CODE THAT DOES ACTUALLY SENDS THE EMAIL
    //$mail->send() SENDS EMAIL AND RETURN 'true' IF SENDING WAS SUCCESSFUL
	if ( $mail->send() ) {
		header("Location: ../contact.html?res=1");
	}else{
		// echo $mail->ErrorInfo; //SENDING FAILED
		header("Location: ../contact.html?res=0");
	}
    


    //FINALLY CLOSING SMTP CONNECTION
	$mail->smtpClose();


?>
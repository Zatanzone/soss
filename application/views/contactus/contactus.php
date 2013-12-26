<!-- main Content -->
	
	<div class="row">
				<div class="large-8 columns">
				<h3>Contact</h3>
					<div class="panel">
		<?php
			if (isset($_REQUEST['email']))
			//if "email" is filled out, send email
			  {
			  //send email
			  $to = "soss.phuket@gmail.com";
			  $subject = $_REQUEST['subject'] ;
			  $email = $_REQUEST['email'] ;
			  $names = $_REQUEST['names'];
			  $message = $names."\r\n\r\n".$_REQUEST['message']."\r\n\r\n";
			  $headers = 'From: '.$email."\r\n".'Reply-To: '.$email."\r\n" .'X-Mailer: PHP/' . phpversion();
			  
			  mail($to, $subject, $message, $headers);
			  
			  echo "Thank you for contact";
			  }
			else
			//if "email" is not filled out, display the form
			  {
			  echo "<form method='post' action=''>
			  <h6>Subject</h6>
			  <input name='subject' type='text' >
			  <h6>Email</h6>		
			  <input name='email' type='text' >
			  <h6>Name</h6>		
			  <input name='names' type='text' >
			  <h6>Message</h6>
			  <textarea name='message' rows='15' cols='40'></textarea>
			  <input type='submit' class='button small'>
			  </form>";
			  }
		?>
	
					</div>
				</div>
			</div>
						
<!-- main Content -->
<!-- side location -->
		<iframe width="100%" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.th/maps?f=q&amp;source=s_q&amp;hl=th&amp;geocode=&amp;q=%E0%B8%A1%E0%B8%AB%E0%B8%B2%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2%E0%B8%B2%E0%B8%A5%E0%B8%B1%E0%B8%A2%E0%B8%AA%E0%B8%87%E0%B8%82%E0%B8%A5%E0%B8%B2%E0%B8%99%E0%B8%84%E0%B8%A3%E0%B8%B4%E0%B8%99%E0%B8%97%E0%B8%A3%E0%B9%8C+%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2%E0%B8%B2%E0%B9%80%E0%B8%82%E0%B8%95%E0%B8%A0%E0%B8%B9%E0%B9%80%E0%B8%81%E0%B9%87%E0%B8%95+%E0%B8%95%E0%B8%B3%E0%B8%9A%E0%B8%A5+%E0%B8%81%E0%B8%B0%E0%B8%97%E0%B8%B9%E0%B9%89+%E0%B8%88%E0%B8%B1%E0%B8%87%E0%B8%AB%E0%B8%A7%E0%B8%B1%E0%B8%94+%E0%B8%A0%E0%B8%B9%E0%B9%80%E0%B8%81%E0%B9%87%E0%B8%95&amp;aq=2&amp;oq=%E0%B8%A1%E0%B8%AB%E0%B8%B2%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2%E0%B8%B2%E0%B8%A5%E0%B8%B1%E0%B8%A2%E0%B8%AA%E0%B8%87%E0%B8%82%E0%B8%A5%E0%B8%B2%E0%B8%99%E0%B8%84%E0%B8%A3%E0%B8%B4%E0%B8%99%E0%B8%97%E0%B8%A3%E0%B9%8C&amp;sll=13.038936,101.490104&amp;sspn=26.489806,43.198242&amp;ie=UTF8&amp;hq=%E0%B8%A1%E0%B8%AB%E0%B8%B2%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2%E0%B8%B2%E0%B8%A5%E0%B8%B1%E0%B8%A2%E0%B8%AA%E0%B8%87%E0%B8%82%E0%B8%A5%E0%B8%B2%E0%B8%99%E0%B8%84%E0%B8%A3%E0%B8%B4%E0%B8%99%E0%B8%97%E0%B8%A3%E0%B9%8C+%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2%E0%B8%B2%E0%B9%80%E0%B8%82%E0%B8%95%E0%B8%A0%E0%B8%B9%E0%B9%80%E0%B8%81%E0%B9%87%E0%B8%95+%E0%B8%95%E0%B8%B3%E0%B8%9A%E0%B8%A5+%E0%B8%81%E0%B8%B0%E0%B8%97%E0%B8%B9%E0%B9%89+%E0%B8%88%E0%B8%B1%E0%B8%87%E0%B8%AB%E0%B8%A7%E0%B8%B1%E0%B8%94+%E0%B8%A0%E0%B8%B9%E0%B9%80%E0%B8%81%E0%B9%87%E0%B8%95&amp;ll=7.894861,98.352109&amp;spn=0.006631,0.010546&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=4894662303488376504&amp;output=embed"></iframe><br />
		<hr />
<!-- sidelocation -->
<!-- Profile US -->
	<section>
		<div class="row">
			<div class="large-4 columns">	
				<center>
				<img src="images/picture/ohm-profile.png" width="160" height="160" border="0" alt="">
				<div><h6>Sirakoop Chimme</h6></div>
				<span><img src="images/icon-social/facebook-c.png" width="24" height="24" border="0" alt=""></span>
				<span><img src="images/icon-social/skype-c.png" width="24" height="24" border="0" alt=""></span>
				<span><img src="images/icon-social/twitter-c.png" width="24" height="24" border="0" alt=""></span>
				<span><img src="images/icon-social/message-c.png" width="24" height="24" border="0" alt=""></span>
				<hr />
				</center>
			</div>
			<div class="large-4 columns">	
				<center>
				<img src="images/picture/eak-profile.png" width="160" height="160" border="0" alt="">
				<div><h6>Isarapong Bulun</h6></div>
				<span><img src="images/icon-social/facebook-c.png" width="24" height="24" border="0" alt=""></span>
				<span><img src="images/icon-social/skype-c.png" width="24" height="24" border="0" alt=""></span>
				<span><img src="images/icon-social/twitter-c.png" width="24" height="24" border="0" alt=""></span>
				<span><img src="images/icon-social/message-c.png" width="24" height="24" border="0" alt=""></span>
				<hr />
				</center>	
			</div>
			<div class="large-4 columns">	
				<center>
				<img src="images/picture/em-profile.png" width="160" height="160" border="0" alt="">
				<div><h6>Worawan kwundee</h6></div>
				<span><img src="images/icon-social/facebook-c.png" width="24" height="24" border="0" alt=""></span>
				<span><img src="images/icon-social/skype-c.png" width="24" height="24" border="0" alt=""></span>
				<span><img src="images/icon-social/twitter-c.png" width="24" height="24" border="0" alt=""></span>
				<span><img src="images/icon-social/message-c.png" width="24" height="24" border="0" alt=""></span>
				<hr />
				</center>
			</div>
		</div>
	</section>
	<hr />
<!-- Profile Us -->

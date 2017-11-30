<?php 
	include('header.php');

?>
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(isset($_POST['register'])) // user registering
	{
		include 'register.php';
	}
}

?>
<div id="form">	
	<div id="signup">
				<h1>Sign Up for Free</h1>
				<form action="register.php" method="POST" autocomplete="off">
					
					<div class="top-row">	
						<div class="field-wrap">
							<label>
								Username
							</label>
							<input type="text" required autocomplete="off" name='username'/>
						</div>

						<div class="field-wrap">
							<label>
								Name
							</label>
							<input type="text" required autocomplete="off" name='name'/>
						</div>
					</div>

					<div class="field-wrap">
						<label>
							Set A Password
						</label>
						<input type="password" required autocomplete="off" name='password'/>
					</div>

					<div class="field-wrap">
						<label>
							Address
						</label>
						<input type="text" required autocomplete="off" name='address'/>
					</div>

					<div class="field-wrap">
						<label>
							Credit Card Number
						</label>
						<input type="text" required autocomplete="off" name='ccNumber'/>
					</div>					

					 <button type="submit" class="button button-block" name="register">Register</button>
				</form>

			</div>
</div>
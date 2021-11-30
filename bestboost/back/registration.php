<?php 
$page_title = "Registration";
include 'header.php';


// Define the variables we will use and intialize them to empty strings
$username = $email = $first_name = $last_name = $country = $password = $confirm_password = $img = "";
$username_err = $email_err = $first_name_err = $last_name_err = $password_err = $confirm_password_err = ""; 
// $errors = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){

  // username validation
  if(empty(trim($_POST["username"]))){
    $username_err = "Enter username";
    array_push($errors, "Enter username");
  }
  else{
    $sql = "SELECT id FROM Users WHERE username = :username";

    if($stmt = $dbcon->prepare($sql)){
      $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
      $param_username = trim($_POST["username"]);

      if($stmt->execute()){
        if($stmt->rowCount() == 1){
          $username_err = "This username is already taken!";
          array_push($errors, "This username is already taken!");
        }
        else{
          $username = trim($_POST["username"]);
        }
      }
      else{
        echo "Something went wrong! Please try again later. user error";
      }
    }
    unset($stmt);
    }
    // first name
    if(empty(trim($_POST["first_name"]))){
        $first_name_err = "Enter first name";
        array_push($errors, "Enter first name");
    }
    else{
        $sql = "SELECT id from Users WHERE first_name = :first_name";

        if($stmt = $dbcon->prepare($sql)){
            $stmt->bindParam(":first_name", $param_first_name, PDO::PARAM_STR);
            $param_first_name = trim($_POST["first_name"]);

            if($stmt->execute()){
                $first_name = trim($_POST["first_name"]);
            }
            else{
                echo "Something went wrong! Please try again later. user error";
            }
        }
        unset($stmt);
    }

    // last name
    if(empty(trim($_POST["last_name"]))){
        $first_name_err = "Enter last name";
        array_push($errors, "Enter last name");
    }
    else{
        $sql = "SELECT id from Users WHERE last_name = :last_name";

        if($stmt = $dbcon->prepare($sql)){
            $stmt->bindParam(":last_name", $param_last_name, PDO::PARAM_STR);
            $param_last_name = trim($_POST["last_name"]);

            if($stmt->execute()){
                $last_name = trim($_POST["last_name"]);
            }
            else{
                echo "Something went wrong! Please try again later. user error";
            }
        }
        unset($stmt);
    }

  // email validation
  if(empty(trim($_POST["email"]))){
    $email_err = "Enter email";
    array_push($errors, "Enter email");
  }
  else{
    $sql = "SELECT id FROM Users WHERE email = :email";

    if($stmt = $dbcon->prepare($sql)){
      $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
      $param_email = trim($_POST["email"]);

      if($stmt->execute()){
        if($stmt->rowCount() == 1){
        $email_err = "This email is already taken!";
        array_push($errors, "This email is already taken!");
      }
      else{
        $email = trim($_POST["email"]);
      }
    }
    else{
      echo "Something went wrong! Please try again later. user error";
    }
  }
  	unset($stmt);
	}
	  // upload an image
  if( $_FILES['img']['name'] === '' || $_FILES['img']['name'] === null || $_FILES['img']['name'] === ' '){
  		$img='default.svg';
  	}else{
  		
  		$folder = "images/user_pics/";
  		$date = new DateTime();
  		$unique_hash = $date_hash = hash('ripemd160', $date->getTimestamp());
  		$img = $unique_hash.$_FILES['img']['name'];
  		
  		$path = $folder . $img ;
  		$target_file = $folder.$img;
		
  		$imgFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  		$allowed = array('jpeg','png','jpg','svg','JPEG','PNG','JPG', 'SVG');
  		$filename = $_FILES['img']['name'];
		
  		$ext=pathinfo($filename, PATHINFO_EXTENSION);
  		if(!in_array($ext,$allowed)){
  		  	echo "Please only select img file of type JPG, JPEG, PNG OR GIF";
  		}
  		else{
  		  	move_uploaded_file( $_FILES['img']['tmp_name'], $path);
  		}
  	}



  //password validation
  if(empty(trim($_POST["password"]))){
    $password_err = "Enter password";
    array_push($errors, "Enter password");
    // make sure password length is at least 6 characters
  } elseif(strlen(trim($_POST["password"])) < 6){
    $password_err = "Password should contain at least 6 characters";
    array_push($errors, "Password should contain at least 6 characters");
  }  
  else{
    $password = trim($_POST["password"]);
  }

  // validate match password
  if(empty(trim($_POST["confirm_password"]))){
    $confirm_password_err = "Confirm password";
    array_push($errors, "Confirm password");
  }
  else{
    $confirm_password = trim($_POST["confirm_password"]);
    if(empty($password_err) && ($password != $confirm_password))
    {
      $confirm_password_err = "Password does not match! Please try again!";
      array_push($errors, "Password does not match! Please try again!");
    }
  }
  
  // register user if there are no errors in the form
    if(empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err))
    {
    $sql = "INSERT INTO Users (username, password, email, first_name, last_name, country, rank, img, acc_type) VALUES (:username, :password, :email, :first_name, :last_name, :country, :rank, :img, :acc_type)";
    if($stmt = $dbcon->prepare($sql)){
        $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
        $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
        $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
        $stmt->bindParam(":first_name", $param_first_name, PDO::PARAM_STR);
        $stmt->bindParam(":last_name", $param_last_name, PDO::PARAM_STR);
        $stmt->bindParam(":country", $param_country, PDO::PARAM_STR);
        $stmt->bindParam(":rank", $param_rank, PDO::PARAM_STR);
        $stmt->bindParam(":img", $param_img, PDO::PARAM_STR);
        $stmt->bindParam(":acc_type", $param_acc_type, PDO::PARAM_STR);

        $param_username = $username;
        $param_email = $email;
        $param_first_name = $first_name;
        $param_last_name = $last_name;
        $param_country = $_POST['country'];
        $param_rank = $_POST['rank'];
        $param_img = $img;
        $param_acc_type = 'user';
        // This method is to create password hash to encrypt the password when saved in the database
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        if($stmt->execute()){
      ?>
        <!-- if all requirements are met for registeration, redirect to welcome page -->
        <script type="text/javascript">
          window.location.href = "index.php?message=Thanks for the registration! Now you can sign in using your credentials!";
        </script>
      <?php  
      }
      else{
        echo "Something went wrong. Please try again later.";
      }
    }
    // close statement
    unset($stmt);
  }
  // close connection
  unset($dbcon);
}
// this function to display erros in the register panel.

?>
			<div class="row headingZ">
				<div class="col-12 g-0">
					<div class="heading_title">
						<h1>Registration</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="sectionBg" data-speed-y="3" data-offset="0" style="background-image:url(./images/dist/main/headerBg.jpg)"></div>
	</header>

<main>
	<section class="profile registration sectionWithBg userForm">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<ul class="breadcrumbs">
						<li><a href="/">Home</a></li>
						<li><span>Registration</span></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<span class="profile_title">Registration</span>	
					<div class="profile_body">
						
						<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
							<?php echo display_error(); ?>
							<input type="text" name="username" required placeholder="Login">
							<input type="email" name="email" required placeholder="Email">
							<input type="fname" name="first_name" required placeholder="First Name">
							<input type="lname" name="last_name" required placeholder="Last Name">
							<select id="country" name="country">
								<option value="Afganistan">Afghanistan</option>
								<option value="Albania">Albania</option>
								<option value="Algeria">Algeria</option>
								<option value="American Samoa">American Samoa</option>
								<option value="Andorra">Andorra</option>
								<option value="Angola">Angola</option>
								<option value="Anguilla">Anguilla</option>
								<option value="Antigua & Barbuda">Antigua & Barbuda</option>
								<option value="Argentina">Argentina</option>
								<option value="Armenia">Armenia</option>
								<option value="Aruba">Aruba</option>
								<option value="Australia">Australia</option>
								<option value="Austria">Austria</option>
								<option value="Azerbaijan">Azerbaijan</option>
								<option value="Bahamas">Bahamas</option>
								<option value="Bahrain">Bahrain</option>
								<option value="Bangladesh">Bangladesh</option>
								<option value="Barbados">Barbados</option>
								<option value="Belarus">Belarus</option>
								<option value="Belgium">Belgium</option>
								<option value="Belize">Belize</option>
								<option value="Benin">Benin</option>
								<option value="Bermuda">Bermuda</option>
								<option value="Bhutan">Bhutan</option>
								<option value="Bolivia">Bolivia</option>
								<option value="Bonaire">Bonaire</option>
								<option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
								<option value="Botswana">Botswana</option>
								<option value="Brazil">Brazil</option>
								<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
								<option value="Brunei">Brunei</option>
								<option value="Bulgaria">Bulgaria</option>
								<option value="Burkina Faso">Burkina Faso</option>
								<option value="Burundi">Burundi</option>
								<option value="Cambodia">Cambodia</option>
								<option value="Cameroon">Cameroon</option>
								<option value="Canada">Canada</option>
								<option value="Canary Islands">Canary Islands</option>
								<option value="Cape Verde">Cape Verde</option>
								<option value="Cayman Islands">Cayman Islands</option>
								<option value="Central African Republic">Central African Republic</option>
								<option value="Chad">Chad</option>
								<option value="Channel Islands">Channel Islands</option>
								<option value="Chile">Chile</option>
								<option value="China">China</option>
								<option value="Christmas Island">Christmas Island</option>
								<option value="Cocos Island">Cocos Island</option>
								<option value="Colombia">Colombia</option>
								<option value="Comoros">Comoros</option>
								<option value="Congo">Congo</option>
								<option value="Cook Islands">Cook Islands</option>
								<option value="Costa Rica">Costa Rica</option>
								<option value="Cote DIvoire">Cote DIvoire</option>
								<option value="Croatia">Croatia</option>
								<option value="Cuba">Cuba</option>
								<option value="Curaco">Curacao</option>
								<option value="Cyprus">Cyprus</option>
								<option value="Czech Republic">Czech Republic</option>
								<option value="Denmark">Denmark</option>
								<option value="Djibouti">Djibouti</option>
								<option value="Dominica">Dominica</option>
								<option value="Dominican Republic">Dominican Republic</option>
								<option value="East Timor">East Timor</option>
								<option value="Ecuador">Ecuador</option>
								<option value="Egypt">Egypt</option>
								<option value="El Salvador">El Salvador</option>
								<option value="Equatorial Guinea">Equatorial Guinea</option>
								<option value="Eritrea">Eritrea</option>
								<option value="Estonia">Estonia</option>
								<option value="Ethiopia">Ethiopia</option>
								<option value="Falkland Islands">Falkland Islands</option>
								<option value="Faroe Islands">Faroe Islands</option>
								<option value="Fiji">Fiji</option>
								<option value="Finland">Finland</option>
								<option value="France">France</option>
								<option value="French Guiana">French Guiana</option>
								<option value="French Polynesia">French Polynesia</option>
								<option value="French Southern Ter">French Southern Ter</option>
								<option value="Gabon">Gabon</option>
								<option value="Gambia">Gambia</option>
								<option value="Georgia">Georgia</option>
								<option value="Germany">Germany</option>
								<option value="Ghana">Ghana</option>
								<option value="Gibraltar">Gibraltar</option>
								<option value="Great Britain">Great Britain</option>
								<option value="Greece">Greece</option>
								<option value="Greenland">Greenland</option>
								<option value="Grenada">Grenada</option>
								<option value="Guadeloupe">Guadeloupe</option>
								<option value="Guam">Guam</option>
								<option value="Guatemala">Guatemala</option>
								<option value="Guinea">Guinea</option>
								<option value="Guyana">Guyana</option>
								<option value="Haiti">Haiti</option>
								<option value="Hawaii">Hawaii</option>
								<option value="Honduras">Honduras</option>
								<option value="Hong Kong">Hong Kong</option>
								<option value="Hungary">Hungary</option>
								<option value="Iceland">Iceland</option>
								<option value="Indonesia">Indonesia</option>
								<option value="India">India</option>
								<option value="Iran">Iran</option>
								<option value="Iraq">Iraq</option>
								<option value="Ireland">Ireland</option>
								<option value="Isle of Man">Isle of Man</option>
								<option value="Israel">Israel</option>
								<option value="Italy">Italy</option>
								<option value="Jamaica">Jamaica</option>
								<option value="Japan">Japan</option>
								<option value="Jordan">Jordan</option>
								<option value="Kazakhstan">Kazakhstan</option>
								<option value="Kenya">Kenya</option>
								<option value="Kiribati">Kiribati</option>
								<option value="Korea North">Korea North</option>
								<option value="Korea Sout">Korea South</option>
								<option value="Kuwait">Kuwait</option>
								<option value="Kyrgyzstan">Kyrgyzstan</option>
								<option value="Laos">Laos</option>
								<option value="Latvia">Latvia</option>
								<option value="Lebanon">Lebanon</option>
								<option value="Lesotho">Lesotho</option>
								<option value="Liberia">Liberia</option>
								<option value="Libya">Libya</option>
								<option value="Liechtenstein">Liechtenstein</option>
								<option value="Lithuania">Lithuania</option>
								<option value="Luxembourg">Luxembourg</option>
								<option value="Macau">Macau</option>
								<option value="Macedonia">Macedonia</option>
								<option value="Madagascar">Madagascar</option>
								<option value="Malaysia">Malaysia</option>
								<option value="Malawi">Malawi</option>
								<option value="Maldives">Maldives</option>
								<option value="Mali">Mali</option>
								<option value="Malta">Malta</option>
								<option value="Marshall Islands">Marshall Islands</option>
								<option value="Martinique">Martinique</option>
								<option value="Mauritania">Mauritania</option>
								<option value="Mauritius">Mauritius</option>
								<option value="Mayotte">Mayotte</option>
								<option value="Mexico">Mexico</option>
								<option value="Midway Islands">Midway Islands</option>
								<option value="Moldova">Moldova</option>
								<option value="Monaco">Monaco</option>
								<option value="Mongolia">Mongolia</option>
								<option value="Montserrat">Montserrat</option>
								<option value="Morocco">Morocco</option>
								<option value="Mozambique">Mozambique</option>
								<option value="Myanmar">Myanmar</option>
								<option value="Nambia">Nambia</option>
								<option value="Nauru">Nauru</option>
								<option value="Nepal">Nepal</option>
								<option value="Netherland Antilles">Netherland Antilles</option>
								<option value="Netherlands">Netherlands (Holland, Europe)</option>
								<option value="Nevis">Nevis</option>
								<option value="New Caledonia">New Caledonia</option>
								<option value="New Zealand">New Zealand</option>
								<option value="Nicaragua">Nicaragua</option>
								<option value="Niger">Niger</option>
								<option value="Nigeria">Nigeria</option>
								<option value="Niue">Niue</option>
								<option value="Norfolk Island">Norfolk Island</option>
								<option value="Norway">Norway</option>
								<option value="Oman">Oman</option>
								<option value="Pakistan">Pakistan</option>
								<option value="Palau Island">Palau Island</option>
								<option value="Palestine">Palestine</option>
								<option value="Panama">Panama</option>
								<option value="Papua New Guinea">Papua New Guinea</option>
								<option value="Paraguay">Paraguay</option>
								<option value="Peru">Peru</option>
								<option value="Phillipines">Philippines</option>
								<option value="Pitcairn Island">Pitcairn Island</option>
								<option value="Poland">Poland</option>
								<option value="Portugal">Portugal</option>
								<option value="Puerto Rico">Puerto Rico</option>
								<option value="Qatar">Qatar</option>
								<option value="Republic of Montenegro">Republic of Montenegro</option>
								<option value="Republic of Serbia">Republic of Serbia</option>
								<option value="Reunion">Reunion</option>
								<option value="Romania">Romania</option>
								<option value="Russia">Russia</option>
								<option value="Rwanda">Rwanda</option>
								<option value="St Barthelemy">St Barthelemy</option>
								<option value="St Eustatius">St Eustatius</option>
								<option value="St Helena">St Helena</option>
								<option value="St Kitts-Nevis">St Kitts-Nevis</option>
								<option value="St Lucia">St Lucia</option>
								<option value="St Maarten">St Maarten</option>
								<option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
								<option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
								<option value="Saipan">Saipan</option>
								<option value="Samoa">Samoa</option>
								<option value="Samoa American">Samoa American</option>
								<option value="San Marino">San Marino</option>
								<option value="Sao Tome & Principe">Sao Tome & Principe</option>
								<option value="Saudi Arabia">Saudi Arabia</option>
								<option value="Senegal">Senegal</option>
								<option value="Seychelles">Seychelles</option>
								<option value="Sierra Leone">Sierra Leone</option>
								<option value="Singapore">Singapore</option>
								<option value="Slovakia">Slovakia</option>
								<option value="Slovenia">Slovenia</option>
								<option value="Solomon Islands">Solomon Islands</option>
								<option value="Somalia">Somalia</option>
								<option value="South Africa">South Africa</option>
								<option value="Spain">Spain</option>
								<option value="Sri Lanka">Sri Lanka</option>
								<option value="Sudan">Sudan</option>
								<option value="Suriname">Suriname</option>
								<option value="Swaziland">Swaziland</option>
								<option value="Sweden">Sweden</option>
								<option value="Switzerland">Switzerland</option>
								<option value="Syria">Syria</option>
								<option value="Tahiti">Tahiti</option>
								<option value="Taiwan">Taiwan</option>
								<option value="Tajikistan">Tajikistan</option>
								<option value="Tanzania">Tanzania</option>
								<option value="Thailand">Thailand</option>
								<option value="Togo">Togo</option>
								<option value="Tokelau">Tokelau</option>
								<option value="Tonga">Tonga</option>
								<option value="Trinidad & Tobago">Trinidad & Tobago</option>
								<option value="Tunisia">Tunisia</option>
								<option value="Turkey">Turkey</option>
								<option value="Turkmenistan">Turkmenistan</option>
								<option value="Turks & Caicos Is">Turks & Caicos Is</option>
								<option value="Tuvalu">Tuvalu</option>
								<option value="Uganda">Uganda</option>
								<option value="United Kingdom">United Kingdom</option>
								<option value="Ukraine">Ukraine</option>
								<option value="United Arab Erimates">United Arab Emirates</option>
								<option value="United States of America">United States of America</option>
								<option value="Uraguay">Uruguay</option>
								<option value="Uzbekistan">Uzbekistan</option>
								<option value="Vanuatu">Vanuatu</option>
								<option value="Vatican City State">Vatican City State</option>
								<option value="Venezuela">Venezuela</option>
								<option value="Vietnam">Vietnam</option>
								<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
								<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
								<option value="Wake Island">Wake Island</option>
								<option value="Wallis & Futana Is">Wallis & Futana Is</option>
								<option value="Yemen">Yemen</option>
								<option value="Zaire">Zaire</option>
								<option value="Zambia">Zambia</option>
								<option value="Zimbabwe">Zimbabwe</option>
							</select>
							<select id="rank" name="rank">
								<option value="Iron1">Iron 1</option>
								<option value="Iron2">Iron 2</option>
								<option value="Iron3">Iron 3</option>
								<option value="Iron4">Iron 4</option>
								
								<option value="Bronze1">Bronze 1</option>
								<option value="Bronze2">Bronze 2</option>
								<option value="Bronze3">Bronze 3</option>
								<option value="Bronze4">Bronze 4</option>

								<option value="Silver1">Silver 1</option>
								<option value="Silver2">Silver 2</option>
								<option value="Silver3">Silver 3</option>
								<option value="Silver4">Silver 4</option>

								<option value="Gold1">Gold 1</option>
								<option value="Gold2">Gold 2</option>
								<option value="Gold3">Gold 3</option>
								<option value="Gold4">Gold 4</option>

								<option value="Platinum1">Platinum 1</option>
								<option value="Platinum2">Platinum 2</option>
								<option value="Platinum3">Platinum 3</option>
								<option value="Platinum4">Platinum 4</option>

								<option value="Diamond1">Diamond 1</option>
								<option value="Diamond2">Diamond 2</option>
								<option value="Diamond3">Diamond 3</option>
								<option value="Diamond4">Diamond 4</option>
							</select>
							<input type="password" name="password" required placeholder="Password">
							<input type="password" name="confirm_password" required placeholder="Repeat Password">
							<div class="editPhoto">
								<input type="file" name="img" id="editPhoto" accept="img/*">
								<label for="editPhoto" class="labelPhoto button accent">
									<span>Choose Photo</span>
								</label>
							</div>
							<button class="button main"><span>Confirm</span></button>
							
						</form>
						
					</div>
				</div>
			</div>
		</div>
		<div class="addBg" style="background-image:url(./images/dist/main/profile_bg.jpg)"></div>
	</section>
</main>

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-8 order-md-1 order-4">
					<div class="footerInfo">
						<div class="logo_footer">
							<img src="./images/dist/main/logo_footer.png" alt="logo footer">
						</div>
						<p class="copy_desc">
							League of Legends is a registered trademark of Riot Games, Inc. We are in no way affiliated with, associated with or endorsed by Riot Games, Inc.
						</p>
						<p class="copy">© 2021 bestboost.net | All Rights Reserved</p>
						<div class="payment">
							<span>Payment systems:</span>
							<div class="paymentSystems">
								<img src="./images/dist/main/paypal.png" alt="lol boosting paypal payment system">
							</div>
						</div> 
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-4 order-md-2 order-3">
					<div class="footerGroup">
						<h4 class="footerTitle">About us</h4>
						<ul class="footerList">
							<li><a href="#">Home</a></li>
							<li><a href="#">FAQ</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6 order-md-3 order-1">
					<div class="footerGroup">
						<h4 class="footerTitle">Solo boosting</h4>
						<ul class="footerList">
							<li><a href="#">Solo division boosting</a></li>
							<li><a href="#">Solo placement matches</a></li>
							<li><a href="#">Solo net wins</a></li>
							<li><a href="#">Solo normal wins</a></li>
							<li><a href="#">Solo masteries</a></li>
							<li><a href="#">Solo leveling</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 order-md-4 order-2">
					<div class="footerGroup">
						<h4 class="footerTitle">Duo boosting</h4>
						<ul class="footerList">
							<li><a href="#">Duo division boosting</a></li>
							<li><a href="#">Duo placement matches</a></li>
							<li><a href="#">Duo net wins</a></li>
							<li><a href="#">Duo games</a></li>
						</ul>
					</div>
				</div>
				<div class="col-12 order-5">
					<div class="createdBy">
						<a target="_blank" href="https://wayinweb.pro"><img src="./images/dist/main/logo_created.svg" alt="created by wayinweb pro"></a>
					</div>
				</div>
			</div>
		</div>
	</footer>
	</div>
	
	<script src="js/app.min.js"></script>
	<script src="libs/luxy/luxy.min.js"></script>
	<script>
		var isMobile = /iPhone|iPad|Android/i.test(navigator.userAgent)
		if (!isMobile) {
			var options={wrapper:'#scrollWrapper', targets:'.sectionBg',wrapperSpeed: 0.04};luxy.init(options)
		}
	</script>
</body>
</html>

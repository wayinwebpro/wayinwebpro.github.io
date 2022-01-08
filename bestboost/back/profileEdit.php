<?
$page_title = "Edit Profile";
include 'header.php';

if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
	?>
  <script type="text/javascript">
  	window.location.href = "index.php";
  </script>  
<?php
    exit;
}


//------------------------- username----------------------------
    if(isset($_POST['username'])){
        $username = '';
        $username_err = '';
        
        if(empty(trim($_POST["username"]))){
            $username_err = "Enter username";
            array_push($errors, "Enter username");
        }else{
            $sql = "SELECT id FROM Users WHERE username = :username";

            if($stmt = $dbcon->prepare($sql)){
                $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
                $param_username = trim($_POST["username"]);

                if($stmt->execute()){
                    if($stmt->rowCount() == 1){
                        $username_err = "This username is already taken";
                        array_push($errors, "This username is already taken");
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
    
        if(empty($username_err)){
            $sql = "UPDATE Users
                    SET username = :username
                    WHERE id = :id";
            if($stmt = $dbcon->prepare($sql)){
                $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
                $stmt->bindParam(":id", $_SESSION['id'], PDO::PARAM_STR);
                
                $param_username = $username;
                if($stmt->execute()){
                    $_SESSION["username"] = $username;
                }
            }
        }
    }
    //------------------------- username-end---------------------------
        //------------------------- email----------------------------
    if(isset($_POST['email'])){
        $email = '';
        $email_err = '';
        
        if(empty(trim($_POST["email"]))){
            $email_err = "Enter email";
            array_push($errors, "Enter email");
        }else{
            $sql = "SELECT id FROM Users WHERE email = :email";

            if($stmt = $dbcon->prepare($sql)){
                $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
                $param_email = trim($_POST["email"]);

                if($stmt->execute()){
                    if($stmt->rowCount() == 1){
                        $email_err = "This email is already taken";
                        array_push($errors, "This email is already taken");
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
    
        if(empty($email_err)){
            $sql = "UPDATE Users
                    SET email = :email
                    WHERE id = :id";
            if($stmt = $dbcon->prepare($sql)){
                $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
                $stmt->bindParam(":id", $_SESSION['id'], PDO::PARAM_STR);
                
                $param_username = $username;
                if($stmt->execute()){
                    $_SESSION["email"] = $email;
                }
            }
        }
    }
    //------------------------- email-end---------------------------
    //------------------------- image----------------------------

    if(isset($_POST['submitImg'])){
        if( $_FILES['img']['name'] === '' || $_FILES['img']['name'] === null || $_FILES['img']['name'] === ' '){
        $img = 'default.svg';
    }else{
        
        $folder = "images/user_pics/";
        $date = new DateTime();
        $unique_hash = $date_hash = hash('ripemd160', $date->getTimestamp());
        $img = $_FILES['img']['name'];
        
        $path = $folder . $img ;
        $target_file = $folder.basename($_FILES["img"]["name"]);
        
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
        $sql = "UPDATE Users
                    SET img = :img
                    WHERE id = :id";
        if($stmt = $dbcon->prepare($sql)){
            $stmt->bindParam(":img", $param_img, PDO::PARAM_STR);
            $stmt->bindParam(":id", $_SESSION['id'], PDO::PARAM_STR);
            
            $param_img = $img;
            if($stmt->execute()){
                $_SESSION["img"] = $img;
            }
        }
    }
}

    //------------------------- image-end---------------------------
?>
<div class="row">
                <div class="col-12 g-0">
                    <div class="heading_title">
                        <h1>Profile Edit</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="sectionBg" data-speed-y="3" data-offset="0" style="background-image:url(./images/dist/main/headerBg.jpg)"></div>
    </header>

<main>
    <section class="profile registration profileEdit sectionWithBg userForm">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrumbs">
                        <li><a href="/">Home</a></li>
                        <li><span>Profile Edit</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <span class="profile_title">Profile Edit</span> 
                    <div class="profile_body">
                        
                        <form method="POST">
                            <div class="editWrapper">
                                <input type="text" name="username" value="<? echo $_SESSION['username']?>" required placeholder="Login">
                                <button class="button main"><span>Confirm</span></button>
                            </div>
                        </form>
                        <form method="POST">
                            <div class="editWrapper">
                                <input type="text" name="email" value="<? echo $_SESSION['email']?>" required placeholder="Email">
                                <button class="button main"><span>Confirm</span></button>
                            </div>
                        </form>
                        <form method="POST">
                            <div class="editWrapper">
                                <input type="text" name="password" required placeholder="Password">
                                <button class="button main"><span>Confirm</span></button>
                            </div>
                        </form>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="editWrapper">
                                <div class="editPhoto">
                                    <input type="file" id="editPhoto" name="img">
                                    <label for="editPhoto" class="labelPhoto button accent">
                                        <span>Choose Photo</span>
                                    </label>
                                </div>
                                <button type="submit" class="button main" name="submitImg"><span>Confirm</span></button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="addBg" style="background-image:url(./images/dist/main/profile_bg.jpg)"></div>
    </section>
</main>


<?
include 'footer.php';
?>

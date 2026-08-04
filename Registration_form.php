
<?php

$host = 'localhost';
$db_name = 'contact-list';
$db_user = 'root';
$db_pass = '';

 $conn = new mysqli($host, $db_user, $db_pass, $db_name);
if($conn->connect_error){
    die("Database Connection failed". $conn->connect_error);
}


$table = 'contacts';

$erros= [];

if ($_SERVER['REQUEST_METHOD']  === 'POST'){
    $name = $_POST['name'] ??"";
    $email= $_POST['email'] ??"";
    $tel = $_POST['tel'] ??"";
    $password = $_POST['password'] ??"";
    $confirm_pass = $_POST['confirm-pass'];

    // Validate user data
    if(empty($name)){
        $errors['username'] = "User name is required";
    }

    if (empty($tel)){
        $errors['tel'] = "Phone number is required";
    }

    if(empty($email)){
        $errors['email'] = "Email is required";
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "The email is invalid! Please Enter a valid email";
    }
    else {
        $sql = "SELECT * FROM $table WHERE email = '$email'";
        $stmt = $conn->prepare($sql);
        $stmt->store_result();
        if($stmt->num_rows() > 0){
            $errors['email'] = "Email is already registered. Please enter a different email";
        }
        $stmt->close();
        }
    }

    if(empty($password)){
        $errors['password'] = "Password is required";
    }

    if ($password !== $confirm_pass){
        $errors['confirm_pass'] = "Passwords do not match";
    }

    if(empty($errors)){
        $sql = "INSERT INTO $table VALUES($name,$email,$tel,$password)";
        $stmt = $this->connection->prepare($sql);
        $stmt ->execute();
        // This is to clear the fields after correct password match
        $name = '';
        $tel = '';
        $email = '';
    }
    
    $conn->close();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact_Form</title>
    <link rel="stylesheet" href="contact-list.css">
</head>

<body>
    <div class="container">
            <form action="Registration_form.php" method="POST">
                <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" value="<? $name ?>">
                <?php ?>
                </div>

                <div class="form-group">
                <label for="tel">Phone Number</label>
                <input type="tel" name="tel" id="tel" value="<? $tel ?>">
                <? if (isset($errors['name'])): ?>{
                    <div class="error"><? echo $errors['name']; ?></div>
                    <?php endif; ?>
                }
                </div>

                <div class="form-group">
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" value="<? $email ?>">
                <? if (isset($errors['email'])): ?>{
                    <div class="error"><? echo $errors['email']; ?></div>
                    <?php endif; ?>
                }
                </div>

                <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" id="password" value="<? $password ?>">
                <? if (isset($errors['password'])): ?>{
                    <div class="error"><? echo $errors['password']; ?></div>
                    <?php endif; ?>
                }
                
                </div>

                <div class="form-group">
                <label for="confirm-pass">Confirm</label>
                <input type="text" name="confirm-pass" id="confirm-pass" value="<? $confirm_pass ?>">
                </div>
                    <? if (isset($errors['confirm-pass'])): ?>{
                    <div class="error"><? echo $errors['confirm-pass']; ?></div>
                    <?php endif; ?>
                }
                
                <div class="submit-btn"> 
                    <input type="submit" value="Submit">
                </div>
               
        </form>
    </div>
</body>
</html>

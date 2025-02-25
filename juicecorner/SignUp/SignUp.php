<!-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="../Sign Up/Sign Up.css" />
  </head>
  <body>



<nav class="navbar">
    <div class="logo">
      <img src="../Pic/logo.png" alt="Logo" height="40">
    </div>

    
    <div class="links">
      <a href="../home_page/imdex.html" class="link"><i class="fas fa-home"></i> Home</a> 
      <a href="../cartt/cart.html" class="link"><i class="fas fa-shopping-cart"></i> Cart</a>
      <a href="../PHP/index.html" class="link"><i class="fas fa-bars"></i> Menu</a> 
      <a href="../Sign Up/Sign Up.html" class="link"><i class="fas fa-sign-in-alt"></i> Sign up</a>

    </div>
  </nav>


    <div class="form-container">
   
      <h2>Sign Up</h2>
      <form id="signUpForm" action="./2.html">
        <input type="text" id="first-name" placeholder="First Name" />
        <span class="error-message" id="first-name-error"></span>

        <input type="text" id="last-name" placeholder="Last Name" />
        <span class="error-message" id="last-name-error"></span>

        <input type="text" id="email" placeholder="Email" />
        <span class="error-message" id="email-error"></span>

        <input type="password" id="password" placeholder="Password" />
        <span class="error-message" id="password-error"></span>

        <input
          type="password"
          id="confirm-password"
          placeholder="Confirm Password"
        />
        <span class="error-message" id="confirm-password-error"></span>

        <button type="submit">Sign Up 
        </button>
      
      </form>
      <div class="signup">I don't have an account yet
        <a href="../login/login.php">I already have an account</a>
            </div>
    </div>
   
 
  </body>
</html> -->

<?php
include '../db_config.php';

$firstNameError = $lastNameError = $emailError = $passwordError = $confirmPasswordError = "";
$firstName = $lastName = $email = $password = $confirmPassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if (empty($firstName)) {
        $firstNameError = "First Name is required";
    }
    if (empty($lastName)) {
        $lastNameError = "Last Name is required";
    }
    if (empty($email)) {
        $emailError = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format";
    }
    if (empty($password)) {
        $passwordError = "Password is required";
    }
    if (empty($confirmPassword)) {
        $confirmPasswordError = "Confirm Password is required";
    } elseif ($password !== $confirmPassword) {
        $confirmPasswordError = "Passwords do not match";
    }

    if (empty($firstNameError) && empty($lastNameError) && empty($emailError) && empty($passwordError) && empty($confirmPasswordError)) {
        $fullName = $firstName . " " . $lastName;

        $sql = "SELECT email FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $emailError = "Email already exists.";
        } else {
            $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $fullName, $email, $password);

            if ($stmt->execute()) {
                echo "<script>alert('Registration Successful!');</script>";
            } else {
                echo "<script>alert('Error: Registration Failed!');</script>";
            }
        }
        $stmt->close();
    }
}
$conn->close();
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="SignUp.css" />
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="../Pic/logo.png" alt="Logo" height="40">
        </div>
        <div class="links">
            <a href="../home_page/imdex.html" class="link"><i class="fas fa-home"></i> Home</a> 
            <a href="../cartt/cart.html" class="link"><i class="fas fa-shopping-cart"></i> Cart</a>
            <a href="../PHP/index.html" class="link"><i class="fas fa-bars"></i> Menu</a> 
            <a href="../SignUp/SignUp.html" class="link"><i class="fas fa-sign-in-alt"></i> Sign up</a>
        </div>
    </nav>

    <div class="form-container">
        <h2>Sign Up</h2>
        <form id="signUpForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" id="first-name" name="first_name" placeholder="First Name">
            <span class="error-message" id="first-name-error"><?php echo $firstNameError; ?></span>

            <input type="text" id="last-name" name="last_name" placeholder="Last Name">
            <span class="error-message" id="last-name-error"><?php echo $lastNameError; ?></span>

            <input type="text" id="email" name="email" placeholder="Email">
            <span class="error-message" id="email-error"><?php echo $emailError; ?></span>

            <input type="password" id="password" name="password" placeholder="Password">
            <span class="error-message" id="password-error"><?php echo $passwordError; ?></span>

            <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm Password">
            <span class="error-message" id="confirm-password-error"><?php echo $confirmPasswordError; ?></span>

            <button type="submit">Sign Up</button>
        </form>
        <div class="signup">
            I don't have an account yet
            <a href="../login/login.php">I already have an account</a>
        </div>
    </div>

    <script>
        window.onload = function() {
            document.getElementById('first-name').value = '';
            document.getElementById('last-name').value = '';
            document.getElementById('email').value = '';
            document.getElementById('password').value = '';
            document.getElementById('confirm-password').value = '';
        };
    </script>
        <script src="1.js"></script>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    
</head>
<body>
    <div class="wrapper">
        <div class="inner" style="padding-bottom: 0px; padding-top: 0px;">
            <div class="image-holder" style="margin-top: 70px;">
                <img src="img/1.png" alt="" style="border-radius: 20px; " >
            </div>
            <form>
                <h3>Registration Form</h3>
                <div class="form-group">
                    <input type="text" name="firstname" placeholder="First Name" class="form-control" required>
                    <input type="text" name="lastname" placeholder="Last Name" class="form-control" required>
                </div>
                <div class="form-wrapper">
                    <input type="number" name="nationalId" placeholder="National ID number" class="form-control" required>
                    <i class="zmdi zmdi-account"></i>
                </div>
                <div class="form-wrapper">
                    <input type="date" name="birthDate" class="form-control" required>
                    <i class="zmdi zmdi-calendar"></i>
                </div>
                <div class="form-wrapper">
                    <input type="text" name="email" placeholder="Email Address" class="form-control" required>
                    <i class="zmdi zmdi-email"></i>
                    <span id="emailError" class="error"></span>
                </div>
                <div class="form-group">
                    <select name="gender" id="" class="form-control">
                        <option value="" disabled selected>Gender</option>
                        <option value="male">Male</option>
                        <option value="femal">Female</option>
                    </select>
                    <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                    <select name="maritalStatus" id="" class="form-control" style="margin-left: 10px;">
                        <option value="" disabled selected>Marital status</option>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                        <option value="widowed">Widowed</option>
                    </select>
                    <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                </div>
                <div class="form-wrapper">
                    <input type="text" name="username" placeholder="Username" class="form-control" required>
                    <i class="zmdi zmdi-account"></i>
                    <span id="usernameError" class="error"></span>
                </div>
                <div class="form-wrapper">
                    <input type="password" name="password" placeholder="Password" class="form-control" required>
                    <i class="zmdi zmdi-lock"></i>
                </div>
                <button>Register
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
                <p style="padding: 10px; margin-top: 10px;">Already have an account? <a href="login.php" style="text-decoration: none;">Log In</a></p>
            </form>
        </div>
    </div>
    
</body>
</html>

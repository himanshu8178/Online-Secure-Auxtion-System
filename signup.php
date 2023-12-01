<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
    <!-- Custom CSS for the form -->
    <style>
        /* Custom CSS for the form */
         .signup-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .signup-form h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #007BFF;
        }
        .signup-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            padding: 10px;

            margin-bottom: 15px;
            border-radius: 5px;
        }
        
        .btn-primary {
            background-color: #00000;
            border-color: #007BFF;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="signup-form">
                    <h1>Auxtion</h1>
                    <h2>Sign Up</h2>
                    <form action="signupProcess.php" method="POST">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input style="margin-left: 60px;" type="text" class="form-control" id="firstname" name="firstname" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input style="margin-left: 63px;" type="text" class="form-control" id="lastname" name="lastname" required>
                        </div>
                        <div class="mb-3">
                            <label for="mobilenumber" class="form-label">Phone Number</label>
                            <input style="margin-left: 35px;" type="text" class="form-control" id="mobilenumber" name="mobilenumber" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input style="margin-left: 70px;" type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input style="margin-left: 100px;" type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input style="margin-left: 75px;" type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="document" class="form-label">Document Verification</label>
                            <select style="margin-bottom: 10px;" class="form-select" id="document" name="document">
                                <option value="aadhaar">Aadhaar Card</option>
                                <option value="pancard">PAN Card</option>
                            </select>
                        <div class="mb-3">
                            <label for="documentnumber" class="form-label">Document number</label>
                            <input style="margin-left: 15px;" type="text" class="form-control" id="documentnumber" name="documentnumber" required>
                        </div>   
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

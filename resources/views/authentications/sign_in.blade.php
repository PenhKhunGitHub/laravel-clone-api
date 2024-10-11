<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4C+6W2+g7qWl0zYAFq6TA3aAw5ob9t7JDEzTmSgPoxH3XYvK02Mv62CLp9YO8qdxr6gBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        html, body {
            height: 100%;
            margin: 0;
            background: #f8f9fa url('images/login-bg-v3.jpg') center center fixed;
            background-size: cover;
        }

        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            padding-bottom: 55px;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
        }

        .login-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #276B08;
        }

        .form-control, .form-select {
            background-color: rgba(200, 174, 236, 0.212);
            border-radius: 25px;
            border: 1px solid transparent;
            padding: 13px 13px;
            padding-left: 20px;
            color: white;
            font-weight: 500;
            opacity: 0.9;
            caret-color: white;
        }
        .form-control::placeholder {
            color: white;
            opacity: 0.9;
        }

        .form-control:hover, .form-select:hover, .form-control:focus, .form-select:focus {
            border-color: rgb(189, 186, 186);
            box-shadow: none;
            background: none;
            transition: border-color 1s ease, background 1s ease;
        }

        .btn-primary {
            padding: 10px 10px;
            border-radius: 25px;
            background-color: rgb(90, 90, 248);
            border: 1px solid transparent;
            font-size: 16px;
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: #1e5707;
            border-color: whitesmoke;
        }
        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #f8f9fa;
        }
    </style>

</head>
<body>

<div class="login-container">
    <div class="login-card">
        <div class="text-center">
            <img src="{{('images/bbt-logo-removebg-preview.png')}}" alt="Logo" width="200">
        </div>
        <form action="" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Username" aria-describedby="inputGroupPrepend2" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" aria-describedby="inputGroupPrepend2" required>
                <i class="fas fa-eye toggle-password" id="togglePassword"></i>
            </div>
            <div class="mb-3">
                <select class="form-select" id="lang" name="lang">
                    <option value="english" selected>English</option>
                    <option value="khmer">Khmer</option>
                </select>
            </div>
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary" id="login">Login</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap and jQuery Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://parsleyjs.org/dist/parsley.min.js"></script>

<script type="text/javascript">
    $(function () {
        $('#loginform').parsley();
        window.localStorage.clear();
        $('#togglePassword').on('click', function () {
            const passwordField = $('#password');
            const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
            passwordField.attr('type', type);

            // Toggle the icon
            $(this).toggleClass('fa-eye fa-eye-slash');
        });
    });
</script>
</body>
</html>
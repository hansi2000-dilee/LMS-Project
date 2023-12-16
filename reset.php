<!DOCTYPE html>
<html>

<head>
    <title>Reset 6</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="style1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>

<body>
   
   
        <div class="infinity-container">
            <div class="infinity-form-block">
                <div class="infinity-click-box text-center">Reset Your password</div>

                <div class="infinity-fold">
                    <div class="infinity-form">
                        <div class="reset-form d-block">
                            <form class="reset-password-form px-3">
                                <p class="mb-3 text-white">
                                    Please enter your email address and we will send you a password reset link.
                                </p>
                                <div class="form-input">
                                    <input type="email" name="" placeholder="Email Address" tabindex="10" required>
                                </div>

                                <div class="col-12 mb-3 text-right">
                                    <button type="submit" class="btn">Send Reset Link</button>
                                </div>
                            </form>
                        </div>

                        <div class="reset-confirmation d-none px-3">
                            <div class="mb-4">
                                <h4 class="mb-3 text-white">Link was sent</h4>
                                <h6 class="text-white">Please, check your inbox for a password reset link.</h6>
                            </div>
                            <div class="text-right">
                                <a href="login.html">
                                    <button type="submit" class="btn">Login Now</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.infinity-click-box').click(function() {
                    $('.infinity-fold').toggleClass('active')
                })
            })

            function PasswordReset() {
                $('form.reset-password-form').on('submit', function(e) {
                    e.preventDefault();
                    $('.reset-form')
                        .removeClass('d-block')
                        .addClass('d-none');
                    $('.reset-confirmation').addClass('d-block');
                });
            }

            window.addEventListener('load', function() {
                PasswordReset();
            });
        </script>
        <script src="js/reset_password.js"></script>

</body>

</html>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        <div>
            Hi {{$user->fname}}, 

            Thanks for creating an account with the verification demo app.

            Please follow the link below to verify your email address
            {{ URL::to('register/verify/' . $user->confirmation_code) }}.<br/>

            Your confirmation code is: {{ $user->confirmation_code }} .
        </div>

    </body>
</html>
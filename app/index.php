<?php 

    require "init.php";

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formic Code Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container pt-5">
        <div class="row">
            <?= formic('POST', [
                    formic_group("username")->setRule("is_alpha"),
                    formic_group("email")->setRule("is_required")->setRule("is_email"),
                    formic_group("password", "Password", "password"),
                    formic_submit("Register")
            ])->setAttribute('class', "col-6 offset-3")->onSubmit(function ($validatedData, $form){
                $form->slot = formic_message("The data has been submitted", "success") . $form->slot;
                
            }, function($error, $form){
                $form->slot = formic_message($error, "danger") . $form->slot;
                
            }); ?>
        </div>
    </div>
</body>
</html>
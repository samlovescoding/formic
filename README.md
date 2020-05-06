# Formic
#### The last form library you will ever need.

Formic is a PHP Library that provides form components for easy and quick form generation. Formic supports Bootstrap Theming out of the box and is very customizable. Here are the features of Formic.

  - Form Components
  - Input Persistence
  - Form Submission
  - Form Validation

# Installation
Use composer to install Formic.

```sh
composer require samlovescoding/formic
```

Import the compose autoload.
```php
<?php require "vendor/autoload.php"; ?>
```

# Usage Guide

#### 1. Formic Component
All formic components are inherited from the abstract Formic\Component. The Formic\Component provides the following methods.
```php
<?php 
    $formicComponent = formic_message("This is good day", "success"); //formic_message is child of Formic\Component
    $formicComponent->setClass("alert-dismissable");
    $formicComponent->setAttribute("type", "submit");
    echo $formicComponent;
?>
```

All the formic components are chainable. Hence the same code can be written as
```php
<?= formic_message("This is good day", "success")->setClass("alert-dismissable")->setAttribute("type", "submit");
?>
```

To change innerHTML of a formic component, you can use slots.
```php
<?= formic_message("This is good day", "success")->slot = "This is a very good day";
?>
```

#### 2. Formic Alert Message
A formic alert message is Formic\Message type and renders itself into a ``<div class="alert alert-success">Your message here.</div>``. To actually generate a formic message we can use the following function.
```php
<?=formic_message("This is my message", "success")?>
<?=formic_message("Oh no! An error occured.", "danger")?>
```

#### 3. Formic Input
A formic input is Formic\Input type and renders itself into ``<input class="form-control" name="sth" id="sth" placeholder="Something" />``. To use formic input we can use following.
```php
<?php
    formic_input($id, $type, $placeholder, $value, $rules);
    // or
    Formic\Input($id, $type, $placeholder, $value, $rules);
    
    $input = formic_input("email", "email", "Your email here.");
    $input->setRule("is_required");                         // For a single rule
    $input->setRules(["is_email", "is_required"]);          //For multiple rules
    echo $input;
?>
<!--or you can use-->
<?=formic_input("email")->setRules("is_email", "is_required")?>
```


#### 4. Formic Form Group (Input with Label)
A formic form group is a Formic\FormGroup type.
```php
<?php
    formic_group($id, $label, $type, $placeholder, $value, $rules);
?>
<!--or you can use-->
<?=formic_group("name")->setRules("is_required")?>
```
It renders into the following HTML.
```html
<div class="form-group">
    <label for="$id">$label</label>
    <input ...formic_input />
</div>
```


#### 5. Formic Submit
A formic submit is a Formic\Input type.
```php
<?=formic_submit("Login")?>
```
It renders into the following HTML.
```html
<input name="formic_submit" value="Login" />
```

#### 6. Formic Form
A formic form is a Formic\Form type. It handles Form Submission and Form Validation. It also provides necessary callback for handling form states. Lets understand a formic form with code.
```php
<?=formic($method, $inputs) ?>  //Syntax

// $inputs is an array that can contain various Formic Components as mentioned above.
```

Here is sample registration form that works with Bootstrap 4 styling.
```php
<?=formic("POST", [
    formic_group("name"),
    formic_group("email", "email"),
    formic_group("password", "password"),
    formic_submit("Register")
])?>
```

Handling Form Submission.
```php

//Formic\Form($method, $inputs)->onSubmit(Closure $success, Closure $failure);

<?=formic("POST", [
    formic_group("name")->setRule("is_required"),
    formic_group("email", "email")->setRule("is_required")->setRule("is_email"),
    formic_group("password", "password")->setRule("is_required"),
    formic_submit("Register")
])->onSubmit(function($validatedRequest, $form){
    //Save the validated request to database.
    Users::create($validatedRequest);
}, function($error, $form){
    $form->slot = formic_message($error, "danger") . $form->slot;
})?>
```



---
### Todos

 - Add TextArea
 - Add Select
 - Add Checkbox
 - Add Radio

License
----

MIT

**Free forever!**

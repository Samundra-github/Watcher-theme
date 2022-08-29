<?php
/* 
Template Name: Sign up 
Template Post Type: page
*/

// Validation Check

global $wpdb;

if($_POST) {
    $username = $wpdb -> escape($_POST['txtUsername']);
    $email = $wpdb -> escape($_POST['txtEmail']);
    $password = $wpdb -> escape($_POST['txtPassword']);
    $Confpassword = $wpdb -> escape($_POST['txtConfirmPassword']);
    $error = array();
    if(strpos($username, ' ') !== FALSE) {
        $error['username_space'] = "Remove space from username.";
    }

    if (empty($username)) {
        $error['username_error'] = "Please enter username.";
    }

    if(username_exists($username)) {
        $error['username_exists'] = "Username already exists.";
    }

    if(!is_email($email)) {
        $error['email_valid'] = "Enter valid email.";
    }

    if (email_exists($email)) {
        $error['email_existence'] = "Email already exists.";
    }

    if (strcmp($password, $Confpassword) !==0 ) {
        $error['password'] = "Password didn't match.";
    }

    if (count($error) == 0) {
        wp_create_user($username, $password, $email);
        echo "User Created Successfully";
        exit();
    }
    else {
        // echo "Please check your form";
        print_r($error);
    }
}

?>

<style>
    form {
        width: auto;
        border: 3px solid rgb(177, 142, 142);
        padding: 100px 129px;
        background: rgb(85, 54, 54);
        border-radius: 20px;
        margin-right: 70px;
        margin-left: 70px;
    }

    h2 {
        text-align: center;
        margin-bottom: 40px;
    }
    input {
        display: block;
        border: 2px solid #ccc;
        width: 95%;
        padding: 10px;
        margin: 10px auto;
        border-radius: 5px;
    }
    label {
        color: #888;
        font-size: 18px;
        padding: 10px;
    }
    button {
        float: right;
        background: rgb(35, 174, 202);
        padding: 10px 15px;
        color: #fff;
        border-radius: 5px;
        margin-right: 10px;
        border: none;
    }
    button:hover {
        opacity: 1;
    }
    .error {
        background: #F2DEDE;
        color: #0c0101;
        padding: 10px;
        width: 95%;
        border-radius: 5px;
        margin: 20px auto;
    }
    h1 {
        text-align: center;
        color: rgb(134, 3, 3);
    }
    a {
        float: right;
        background: rgb(183, 225, 233);
        padding: 10px 15px;
        color: #fff;
        border-radius: 10px;
        margin-right: 10px;
        border: none;
        text-decoration: none;
    }
    a:hover {
        opacity: .7;
    }

</style>

<form method="post">
    <h2>Sign Up Here</h2>

    <p>
        <label>Enter Username</label>
    <div>
        <input type="text" id="txtUsername" name="txtUsername" placeholder="Username" />
    </div>
    </p>

    <p>
        <label>Enter Email</label>
    <div>
        <input type="email" id="txtEmail" name="txtEmail" placeholder="Email" />
    </div>
    </p>

    <p>
        <label>Enter Password</label>
    <div>
        <input type="password" id="txtPassword" name="txtPassword" placeholder="Password" />
    </div>
    </p>

    <p>
        <label>Confirm Password</label>
    <div>
        <input type="password" id="txtConfirmPassword" name="txtConfirmPassword" placeholder="Confirm Password" />
    </div>
    </p>

    <button type="submit">Sign Up</button>
</form>
<?php

/*
Template Name: Login
Template Post Type: page
*/
global $wpdb;



?>


<?php

if ($_POST) {
    $username = $wpdb->escape($_POST['username']);
    $password = $wpdb->escape($_POST['password']);

    $login_array = array();
    $login_array['user_login'] = $username;
    $login_array['user_password'] = $password;

    $verify_user = wp_signon($login_array, true);
    if (!is_wp_error($verify_user)) {
        echo "<script>window.location = '" . site_url() . "' </script>";
    } else {
        echo "<script>window.location = '" . site_url() . "/login" . "' </script>";
        echo "<p> Invalid Credentials </p>";

    }
} else { ?>
    <form method="post">

        <h2>LOGIN</h2>
        <p>
            <label for="username">Username/Email</label>
            <input type="text" id="username" name="username" placeholder="Enter Username/Email">
        </p>

        <p>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter Password">
        </p>

        <button type="submit">Login</button>


        <button class="signup"> <a href="http://localhost:81/watcher/sign-up/">Sign Up</a> </button>

    </form>
<?php } ?>



<style>
    form {
        width: auto;
        border: 3px solid rgb(177, 142, 142);
        padding: 177px;
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
        cursor: pointer;
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

    .signup {
        float: left;
    }

    a {
        float: left;
        color: #fff;
        text-decoration: none;
    }

    a:hover {
        opacity: .7;
    }
</style>
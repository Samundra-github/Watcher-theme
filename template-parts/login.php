<?
/*
Template Name: Login
Template Post Type: page
*/
?>
<style>
    form {
        width: auto;
        border: 3px solid rgb(177, 142, 142);
        padding: 129px;
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
<form action="login.php" method="post">

    <h2>LOGIN</h2>

    <?php if (isset($_GET['error'])) { ?>

        <p class="error"><?php echo $_GET['error']; ?></p>

    <?php } ?>

    <label>User Name</label>

    <input type="text" name="uname" placeholder="User Name"><br>

    <label>Password</label>

    <input type="password" name="password" placeholder="Password"><br>

    <button type="submit">Login</button>

</form>
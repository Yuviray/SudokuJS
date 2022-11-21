<?php
    namespace Tester;
    require 'config.php';

    if(!empty($_SESSION["id"]))
    {
        $id = $_SESSION["id"];
        $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
        $row = mysqli_fetch_assoc($result);
    }

    else
    {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>

            <link href="https://fonts.googleapis.com/css2?family=Teko:wght@500&display=swap" rel="stylesheet">
            <link id=theme1 rel="stylesheet" type="text/css" href="Theme2.css">
            <link rel="stylesheet" media="all" type="text/css" href="tutorial.css">

        <style>

                    .mt-0 {
                    margin-top: 0 !important;
                    }

                    .mb-5 {
                    margin-bottom: 3rem !important;
                    }

                    .text-black {
                    color: #000 !important;
                    }

                    .btn {
                    font-size: 1rem;
                    font-weight: 600;
                    line-height: 1.5;
                    display: inline-block;
                    padding: .625rem 1.25rem;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    user-select: none;
                    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
                    text-align: center;
                    vertical-align: middle;
                    white-space: nowrap;
                    border: 1px solid transparent;
                    border-radius: .375rem;
                    }

                    .btn-info {
                    color: #fff;
                    border-color: #11cdef;
                    background-color: #11cdef;
                    box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
                    }

                    .btn:hover {
                    transform: translateY(-1px);
                    box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
                    }              

                    p {
                    font-size: 1rem;
                    font-weight: 600;
                    line-height: 1.7;
                    margin-top: 0;
                    margin-bottom: 1rem;
                    }

                    .center
                    {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        background: white;
                        border-radius: 10px;
                        box-shadow: 10px 10px 15px rgba(0,0,0,0.05);
                        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                    }

                    .center h1
                    {
                        padding: 0 45px 20px 45px;
                        border-bottom: 1px solid gray;
                        
                        font-weight: 1200;
                        line-height: 1.5;
                        color: #00;
                    }

                    .center h3
                    {
                        font-weight: 1200;
                        line-height: 1.5;
                        color: #00;
                    }

                    .center form
                    {
                        padding: 10px 40px;
                        box-sizing: border-box;
                        
                        font-size: 1.15rem;
                        font-weight: 1200;
                        line-height: 1.7;
                        margin-top: 0;
                        margin-bottom: 1rem;
                    }
        </style>

    </head>

    <body>

    <div class="center">
        <form class="" action="" method="post" autocomplete="off">

                <h1><?php echo $row["user_name"];?>'s Profile</h1>

                <h3 class="text-black">Username: <br></h3>
                <p><?php echo $row["user_name"];?><br></p>
                <p class="mb-5"> </p>
                
                <h3 class="text-black">First Name: <br></h3>
                <p><?php echo $row["first_name"];?><br></p>
                <p class="mb-5"> </p>

                <h3 class="text-black">Last Name: <br></h3>
                <p><?php echo $row["last_name"];?><br></p>
                <p class="mb-5"> </p>

                <h3 class="text-black">Email: <br></h3>
                <p><?php echo $row["email"];?><br></p>
                <p class="mb-5"> </p>

                <h3 class="text-black">My High Score: <br></h3>
                <p>Minutes: <b><?php echo $row["minutes"];?></b><br></p>
                <p>Seconds: <b><?php echo $row["seconds"];?></b><br></p>
                <p class="mb-5"> </p>

                <!-- <a href="#!" class="btn btn-info">Edit profile</a> //-->
                <b href="#!" class="btn btn-info" onclick="backToIndexScript()">Return to Game<br></b>
        </form>
    </div>        
    
    <script> 
			function backToIndexScript()
			{ 
				window.location.assign('index.php');
			}
    </script> 

    </body>

</html>

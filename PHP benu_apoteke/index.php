<?php
require "dbBroker.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Optimizacija Benu apoteka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div class="header">
    <div class="naslov">
        <h1>Optimizacija Benu apoteka</h1>
    </div>

</div>

<div class="forma" style="margin-top: 50px">
    <form method="post">
        <div class="input-group mb-3 container">
            <input class="form-control" type="text" name="username" placeholder="Username" value="">
        </div>
        <div class="input-group mb-3 container">
            <input class="form-control" type="password" name="password" placeholder="Password" value="">
        </div>
        <div class="d-grid gap-2 d-md-block">
            <button type="submit" id="login" class="btn btn-success">Prijavi se</button>
            <button type="button" id="register" onclick="" class="btn btn-primary">Registruj se</button>
        </div>

    </form>
    <br>
    <div style="display: block;">
        <p style="color: black; background-color: white;"></p>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
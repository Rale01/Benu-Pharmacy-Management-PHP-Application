<?php
session_start();

if (isset($_SESSION['current_user'])) {
    header('Location: pocetna.php');
    exit();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Optimizacija benu apoteka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
</head>
<body>

<div class="header">
    <div class="naslov">
        <h1>Optimizacija benu apoteka</h1>
    </div>
</div>

<div class="forma" style="margin-top: 50px">
    <form method="post" id="formaRegistracija">
        <div class="input-group mb-3 container">
            <input class="form-control" type="text" name="username" placeholder="Username" value="">
        </div>
        <div class="input-group mb-3 container">
            <input class="form-control" type="password" name="password" placeholder="Password" value="">
        </div>
        <div class="input-group mb-3 container">
            <input class="form-control" type="text" name="ime" placeholder="Ime" value="">
        </div>
        <div class="input-group mb-3 container">
            <input class="form-control" type="text" name="prezime" placeholder="Prezime" value="">
        </div>
        <div class="input-group mb-3 container">
            <input class="form-control" type="date" name="datumrodjenja" value="">
        </div>
        <div class="form-check container">
            <input class="form-check-input" type="radio" name="pol" value="M" id="radioM">
            <label class="form-check-label" for="radioM">
                Muški
            </label>
        </div>
        <div class="form-check container">
            <input class="form-check-input" type="radio" name="pol" value="Z" id="radioZ">
            <label class="form-check-label" for="radioZ">
                Ženski
            </label>
        </div>

        <div class="d-grid gap-2 d-md-block">
            <button type="submit" id="registrujSe" class="btn btn-success" style="background-color: rgba(27,133,24,0.76)">Napravi nalog</button>
            <button type="reset" class="btn btn-primary">Resetuj formu</button>
            <button type="button" onclick="document.location.href='index.php'" class="btn btn-danger" style=" background-color: rgba(238,5,5,0.8)  " >Otkaži</button>
        </div>

    </form>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</body>
</html>
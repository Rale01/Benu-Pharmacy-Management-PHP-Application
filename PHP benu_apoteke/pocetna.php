<?php
require "dbBroker.php";
?>
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

    <div class="navigacija d-flex justify-content-between">
        <ul class="nav" id="navigacija-lista" >
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="pocetna.php">Početna</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Farmaceuti</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Apoteke</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Nalog</a>
            </li>
            <li class="nav-item">
                <p class="">Prijavljen na sistem:></p>
            </li>
        </ul>
        <div>
            <a class="btn btn-danger" href="">Odjavi se</a>
        </div>
    </div>
</div>

<div class="pocetnaStranaSadrzaj">

    <div class="d-flex p-1 justify-content-center align-items-center">
        <div>
            <h3>Sve apoteke</h3>
        </div>
        <div class="w-50 p-3">
            <input class="form-control" type="text" placeholder="pretraga" id="pretraga">
        </div>
        <div>
            <input class="form-control" type="button" id="sortBtn" value="sortiraj">
        </div>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 g-3 justify-content-center">
                <form method="post" action="" class="col">
                    <div class="card" style="background-color: rgba(42,57,89,0.87); width: 35vw; margin-left: auto; margin-right: auto">
                        <div class="card-body">
                            <!--Ovde cemo kreirati kartice koje ce prikazivati apoteke sa farmaceutima -->
                            <button type="submit" class="btn btn-primary">Pogledaj</button>
                        </div>
                    </div>
                </form>
    </div>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
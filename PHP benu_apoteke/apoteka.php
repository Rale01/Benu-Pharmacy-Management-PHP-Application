<?php
session_start();

if (!isset($_SESSION['current_user'])) {
    header('Location: index.php');
    exit();
}

require "dbBroker.php";
require "model/Korisnik.php";
require "model/farmaceut.php";
require "model/apoteka.php";

$korisnik = Korisnik::getKorisnikUsername($_SESSION['current_user'],$konekcija)[0];
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
    <link href="css/style.css" rel="stylesheet">
    <link rel = "shortcut icon" type = "image/x-icon" href = "logo32x32.png"/>
</head>
<body>

<div class="header">
    <div class="naslov">
    <img src ="logo_2_120x120.png"></img>
        <h1>Optimizacija benu apoteka</h1>
    </div>

    <div class="navigacija d-flex justify-content-between">
        <ul class="nav" id="navigacija-lista" >
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="pocetna.php">Početna</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="farmaceut.php">Farmaceuti</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="apoteka.php">Apoteke</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="nalog.php">Nalog</a>
            </li>
            <li class="nav-item">
                <p class="">Prijavljen na sistem: <?=$_SESSION['current_user']?></p>
            </li>
        </ul>
        <div>
            <a class="btn btn-danger" href="odjava.php">Odjavi se</a>
        </div>
    </div>
</div>

<div class="content">
    <div class="naslov">
        <h2>Apoteke</h2>
    </div>

    <div class="forma" style = "border-radius:25px">
        <form method="post" id="formaApoteka">
            <input type="hidden" name="id" value="">
            <input type="hidden" name="korisnik_id" value="<?=$korisnik['id']?>">

            
            <div class="input-group mb-3 container">
                <span class="input-group-text">Farmaceut</span>
                <select class="form-control" type="text" name="farmaceut_id" placeholder="Farmaceut" value="">
                    <option value="0">Nema</option>
                    <?php
                    $farmaceuti=Farmaceut::getAll($konekcija);
                    while(($farmaceut=$farmaceuti->fetch_assoc())!=null){?>
                        <option value="<?=$farmaceut['id']?>"><?=$farmaceut['ime']." ".$farmaceut['prezime']?></option>
                    <?php } ?>
                </select>
            </div>
            

            <div class="input-group mb-3 container">
                <span class="input-group-text">Naziv apoteke</span>
                <input class="form-control" type="text" name="naziv" value="">
            </div>
            <div class="input-group mb-3 container">
                <span class="input-group-text">Opstina</span>
                <input class="form-control" type="text" name="opstina" value="">
            </div>

            

            <div class="d-grid gap-2 d-md-block">
                <button type="submit"  class="btn btn-success" style="background-color: rgb(11, 218, 81); border: none">Sačuvaj apoteku</button>
                <button type="reset" id="resetApoteka" class="btn btn-primary" style="background-color: rgb(152, 251, 152); border: none">Obriši podatke o apoteci</button>
                <button type="button" id="obrisiApoteku" class="btn btn-danger" style="background-color: rgb(79, 121, 66); border: none" >Obriši apoteku</button>
            </div>

        </form>
    </div>


    <div class="prikazPodataka" style = "padding: 20px; border-radius:25px" >
        <div class="d-flex p-1 justify-content-center align-items-center">
            <div>
                <h3>Apoteke</h3>
            </div>
            <div class="w-50 p-3">
                <input class="form-control" type="text" placeholder="pretraga" id="pretraga">
            </div>
            <div>
                <input class="form-control" type="button" id="sortBtn" value="Sortiraj po nazivu apoteka" style = "margin-right: 5px">
            </div>
            <div>
                <input class="form-control" type="button" id="sortOBtn" value="Sortiraj po opstinama"style = "margin-left: 5px">
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 g-3">
            <?php
            $apoteke=Apoteka::getAll($konekcija);
            while (($apoteka=$apoteke->fetch_assoc())!=null){?>

                <div class="col">
                    <div class="card" style="background-color: 	rgb(53, 94, 59);border-radius:25px">
                        <div class="card-body">
                            <h5 class="card-title"><?=$apoteka['naziv']?></h5>
                            <?php $farmaceut=Farmaceut::getFarmaceut($apoteka['farmaceut_id'],$konekcija)[0]?>
                            <p class="card-text">Farmaceut: <?=$farmaceut['ime']." ".$farmaceut['prezime']?></p>
                            <p class="card-text">Naziv apoteke: <?=$apoteka['naziv']?></p>
                            <p class="card-text karticaOpstina">Opstina: <?=$apoteka['opstina']?></p>  
                            <?php $korisnikK=Korisnik::getKorisnik($apoteka['korisnik_id'],$konekcija)[0]?>
                            <p class="card-text">Korisnik dodao: <?=$korisnikK['username']?></p>
                            <input type="radio" name="apotekaCheck" value="<?=$apoteka['id']?>">
                        </div>
                    </div>
                </div>

            <?php } 
            ?>
        </div>


    </div>

</div>



<br>
<br>
<br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="js/sortiranjeipretraga.js"></script>
<script src="js/apoteka.js"></script>
<?php
if(isset($_POST['id'])){
    echo '<script type="text/javascript">
            popuniFormu('.$_POST["id"].');
        </script>'
    ;

}
?>
</body>
</html>
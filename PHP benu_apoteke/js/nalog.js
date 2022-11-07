$('#formaRegistracija').submit(function (){

    event.preventDefault();

    const $form = $(this);
    const $input = $form.find('input');

    const data=$form.serialize();

    console.log(data);

    $input.prop('disabled',true);

    req=$.ajax({
        url: 'requestHandler/korisnik/update.php',
        type:'post',
        data: data
    });


    $input.prop('disabled',false);
    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno izmenjen korisnik");
            location.href="odjava.php";
        }else{
            alert("Neuspešno izmenjen korisnik")

        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});

$('#obrisiNalogBtn').click(function (){

    let id = document.getElementsByName('id')[0].value;
    console.log(id);

    req=$.ajax({
        url: 'requestHandler/korisnik/delete.php',
        type:'post',
        data: {'id':id}
    });



    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno obrisan korisnik");
            location.href="odjava.php";
        }else{
            alert("Neuspešno obrisan korisnik")
            console.log(res)
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});
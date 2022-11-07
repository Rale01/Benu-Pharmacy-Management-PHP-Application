$('#formaRegistracija').submit(function (){
    event.preventDefault();
    const $form = $(this);
    const $input = $form.find('input');

    const data=$form.serialize();

    console.log(data);

    $input.prop('disabled',true);

    req=$.ajax({
            url: 'requestHandler/korisnik/add.php',
            type:'post',
            data: data
    });


    $input.prop('disabled',false);
    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno ste se registrovali");
            location.href='index.php';
        }else{
            alert("Neuspešno ste se registrovali")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});	
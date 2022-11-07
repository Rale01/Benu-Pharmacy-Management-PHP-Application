$('#formaApoteka').submit(function (){
    event.preventDefault();
    const $form = $(this);
    const $input = $form.find('input','textarea','select');

    const data=$form.serialize();

    console.log(data);

    $input.prop('disabled',true);
    if($('input[name="id"]').val()==""){
        req=$.ajax({
            url: 'requestHandler/apoteke/add.php',
            type:'post',
            data: data
        });
    }else{
        req=$.ajax({
            url: 'requestHandler/apoteke/update.php',
            type:'post',
            data: data
        });
    }

    $input.prop('disabled',false);

    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno sačuvana apoteka");
            location.reload();
        }else{
            alert("Neuspešno sačuvana apoteka")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});

function popuniFormu(idT){
    let id=idT;

    req=$.ajax({
        url: 'requestHandler/apoteke/get.php',
        type:'post',
        data: {'id':id}
    });

    req.done(function(res,textStatus,jqXHR){

        let apoteka = $.parseJSON(res)[0];

        $('input[name="id"]').val(apoteka.id);
        $('input[name="korisnik_id"]').val(apoteka.korisnik_id);
        $('input[name="naziv"]').val(apoteka.naziv);
        $('select[name="farmaceut_id"]').val(apoteka.farmaceut_id);
        $('select[name="opstina"]').val(apoteka.opstina);
        
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });
}

$('input[name="apotekaCheck"]').click(function (){
    popuniFormu($('input[name="apotekaCheck"]:checked').val());
});

$('#resetApoteka').click(function (){
    $('input[name="id"]').val("");
});



$('#obrisiApoteku').click(function(){
    let id = $('input[name="id"]').val();

    if(id==""){
        alert("Apoteka nije odabrana");
        return;
    }

    req=$.ajax({
        url: 'requestHandler/apoteke/delete.php',
        type:'post',
        data: {'id':id}
    });

    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno obrisana apoteka");
            location.reload();
        }else{
            alert("Neuspešno obrisana apoteka")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });
});
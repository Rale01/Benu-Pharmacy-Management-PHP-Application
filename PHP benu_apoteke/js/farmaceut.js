$('#formaFarmaceut').submit(function (){
    event.preventDefault();
    const $form = $(this);
    const $input = $form.find('input','textarea');

    const data=$form.serialize();

    console.log(data);

    $input.prop('disabled',true);
    if($('input[name="id"]').val()==""){
        req=$.ajax({
            url: 'requestHandler/farmaceut/add.php',
            type:'post',
            data: data
        });
    }else{
        req=$.ajax({
            url: 'requestHandler/farmaceut/update.php',
            type:'post',
            data: data
        });
    }

    $input.prop('disabled',false);

    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno sačuvan farmaceut");
            location.reload();
        }else{
            alert("Neuspešno sačuvan farmaceut")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});

$('input[name="farmaceutCheck"]').click(function (){

    let id=$('input[name="farmaceutCheck"]:checked').val();

    req=$.ajax({
        url: 'requestHandler/farmaceut/get.php',
        type:'post',
        data: {'id':id}
    });

    req.done(function(res,textStatus,jqXHR){

        let farmaceut = $.parseJSON(res)[0];

        $('input[name="id"]').val(farmaceut.id);
        $('input[name="ime"]').val(farmaceut.ime);
        $('input[name="prezime"]').val(farmaceut.prezime);
        $('input[name="strucnaSprema"]').val(farmaceut.strucnaSprema);



    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});

$('#resetFarmaceut').click(function (){
    $('input[name="id"]').val("");
});

$('#obrisiFarmaceuta').click(function(){
    let id = $('input[name="id"]').val();

    if(id==""){
        alert("Farmaceut nije odabran");
        return;
    }

    req=$.ajax({
        url: 'requestHandler/farmaceut/delete.php',
        type:'post',
        data: {'id':id}
    });

    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno obrisan farmaceut");
            location.reload();
        }else{
            alert("Neuspešno obrisan farmaceut")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });
});
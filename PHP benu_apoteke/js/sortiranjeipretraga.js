$('#pretraga').on("keyup", function() {
    let unos = $(this).val();
    let filter = unos.toLowerCase();
    let objekti = $('.col')
    console.log(objekti)

    for(let i=0;i<objekti.length;i++){

        let vidljiv=false;


        let naslov = objekti[i].getElementsByTagName("h5")[0];
        let paragrafi=objekti[i].getElementsByTagName("p");

        let niz=[];
        niz.push(naslov);
        for(let j=0;j<paragrafi.length;j++){
            niz.push(paragrafi[j])
        }

        for(let j=0; j<niz.length;j++){
            if (niz[j]) {
                unos = niz[j].textContent || niz[j].innerText;
                if (unos.toLowerCase().indexOf(filter) > -1) {
                    vidljiv=true;
                }
            }

        }





        if(vidljiv){
            objekti[i].style.display = "";
        }else{
            objekti[i].style.display = "none";
        }
    }
})

$('#sortBtn').click(function (){

    let sortirano = false;

    while (!sortirano) {
        sortirano = true;
        let objekti = $('.col');
        let zaZamenu;
        let i
        for (i = 0; i < objekti.length-1; i++) {
            zaZamenu = false;
            let el1 = objekti[i].getElementsByTagName("h5")[0];
            let el2 = objekti[i + 1].getElementsByTagName("h5")[0];
            if (el1.innerHTML.toLowerCase() > el2.innerHTML.toLowerCase()) {
                zaZamenu = true;
                break;
            }
        }
        if (zaZamenu) {
            objekti[i].parentNode.insertBefore(objekti[i + 1], objekti[i]);
            sortirano = false;
        }
    }
});

$('#sortOBtn').click(function (){

    let sortirano = false;

    while (!sortirano) {
        sortirano = true;
        let objekti = $('.col');
        let zaZamenu;
        let i
        for (i = 0; i < objekti.length-1; i++) {
            zaZamenu = false;
            let el1 = objekti[i].getElementsByClassName("card-text karticaOpstina")[0];
            let el2 = objekti[i + 1].getElementsByClassName("card-text karticaOpstina")[0];
            if (el1.innerHTML.toLowerCase() > el2.innerHTML.toLowerCase()) {
                zaZamenu = true;
                break;
            }
        }
        if (zaZamenu) {
            objekti[i].parentNode.insertBefore(objekti[i + 1], objekti[i]);
            sortirano = false;
        }
    }
});

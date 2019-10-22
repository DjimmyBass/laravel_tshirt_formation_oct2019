//alert('bin');

//verifier si on est sur la page backend qui permet d choisir un type de vetement
if($('.change_type').length) {
//au chargement de la page on lance la function de chargement des tailles avec l avaleur initiale de select value type
//recuperation d la valeur de l option selectionnée par defaut au chargement de la page
    let type_id = $('.change_type').val();
    let produit_id = $('.change_type').data('id_produit');

//appel de la fonction
    loadTailles(type_id, produit_id);
}
$('.change_type').on('change', function () {
    //alert('boum');
    let type_id = this.value;
    // alert(type_id);
    loadTailles(type_id, produit_id);


});


function loadTailles(type_id, produit_id) {
    axios.post('/backend/produit/select/size', {'type_id': type_id, 'produit_id': produit_id}).then(reponse => {
        $('.load_tailles').html(reponse.data);
    });
}


$('.remove_size').on('click',function (e) {
    e.preventDefault();
    let produit_id = $(this).data('id_produit');
    let taille_id = $(this).data('id_taille');
   // console.log(produit_id,taille_id);
    axios.post('/backend/produit/remove/size',{'produit_id':produit_id,'taille_id':taille_id}).then(reponse=>{
        //alert(reponse.data);

        //ne plus afficher le tr qui contient le bouton
        $(this).closest('tr').remove();
        $('.remove_reponse').html(reponse.data);
        $('.remove_reponse').show();
    });

});

if($('.change_size').length) {
    let taille_id = $('.change_size').val();
    let produit_id = $('.change_size').data('produit_id');
    LoadQuantites(taille_id,produit_id);
}


$('.change_size').on('change',function () {
    let taille_id = this.value;
    let produit_id = $(this).data('produit_id');
    LoadQuantites(taille_id,produit_id);

});

function LoadQuantites(taille_id,produit_id) {
    axios.post('/panier/qte/check',{'taille_id':taille_id,'produit_id':produit_id}).then(reponse=> {
        $('.load_qte').html(reponse.data);
    })
}


/**
 * Created by wilder on 12/06/17.
 */
$(document).ready(function(){
    /* id de symfony a obtenir par l'inspecteur de code*/
    $("#wcs_ajaxtownbundle_contact_town").keyup(function (){
        town=this.value;
        html="";
        if (town.length>1) {

            $.ajax({
                type: "POST",
                url: "/autocomplete/" + town,

                timeout : 3000,
                dataType: "json",

                success: function (response) {
                    $towns=JSON.parse(response.data);
                    console.log($towns);
                    for(i=0;i<$towns.length;i++){
                        html+="<li>"+$towns[i].town+"</li>";
                    }

                    //.html() sans contenu affiche le contenu de l'id!! avec contenu il le remplace
                    $("#autocomplete").html(html);
                    //le html est afficher on click sur une ligne
                    $("#autocomplete li").click( function () {
                        //traiter a partir de l(objet
                        $("#wcs_ajaxtownbundle_contact_town").val($(this)[0].innerText);
                        //console.log($(this)[0].innerText);
                        $("#autocomplete").html("");
                    })

                },

                error: function (response) {
                    console.error("Err !!!" + response);
                }
            });


        }
    });
});
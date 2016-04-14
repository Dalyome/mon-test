/**
 * Created by webform on 1/03/2016.
 */

function confirmDelete(letitre, id){
    var question = confirm("Voulez-vous vraiment supprimer « "+letitre+ " »");
    if(question){
        document.location.href="?sup="+id;
    }
}

//popup
function MM_openBrWindow(id) { //v2.0
    
 if ( confirm("Etes-vous surs de vouloir supprimer ce client?") ) {
    var xmlHttp = new XMLHttpRequest();
    let toDelete = "/fonaco/sup.php?edit1="+id;
    xmlHttp.open("GET", toDelete, true); // true for asynchronous 
    xmlHttp.send(null);
    location.reload();
 }
 
}
    
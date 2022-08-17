//popup
function delClient(id) { //v2.0
    
 if ( confirm("Etes-vous surs de vouloir supprimer ce client?") ) {
    var xmlHttp = new XMLHttpRequest();
    let toDelete = "/fonacogestion/FonacoGestionPHP/supCli.php?ID="+id;
    xmlHttp.open("GET", toDelete, true); // true for asynchronous 
    xmlHttp.send(null);
    location.reload();
 }
 
}
function delCommande(idcom,iddevis) { //v2.0
    
 if ( confirm("Etes-vous surs de vouloir supprimer cette commande?") ) {
    var xmlHttp = new XMLHttpRequest();
    let toDelete = "/fonacogestion/FonacoGestionPHP/supCom.php?idcom="+idcom+"&numdevis="+iddevis;
    xmlHttp.open("GET", toDelete, true); // true for asynchronous 
    xmlHttp.send(null);
 }
 
}
function delCommandeFournisseur(id) { //v2.0
    
 if ( confirm("Etes-vous surs de vouloir supprimer cette commande?") ) {
    var xmlHttp = new XMLHttpRequest();
    let toDelete = "/fonacogestion/FonacoGestionPHP/supComFournisseur.php?ID="+id;
    xmlHttp.open("GET", toDelete, true); // true for asynchronous 
    xmlHttp.send(null);
    location.reload();
 }
 
}
function delFournisseur(id) { //v2.0
    
 if ( confirm("Etes-vous surs de vouloir supprimer ce fournisseur?") ) {
    var xmlHttp = new XMLHttpRequest();
    let toDelete = "/fonacogestion/FonacoGestionPHP/supFournisseur.php?ID="+id;
    xmlHttp.open("GET", toDelete, true); // true for asynchronous 
    xmlHttp.send(null);
    location.reload();
 }
 
}
function delFromStock(id) { //v2.0
    
 if ( confirm("Etes-vous surs de vouloir supprimer cet élément?") ) {
    var xmlHttp = new XMLHttpRequest();
    let toDelete = "/fonacogestion/FonacoGestionPHP/supstock.php?ID="+id;
    xmlHttp.open("GET", toDelete, true); // true for asynchronous 
    xmlHttp.send(null);
    location.reload();
 }
 
}
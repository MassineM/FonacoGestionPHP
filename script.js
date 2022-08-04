//popup
function MM_openBrWindow(id) { //v2.0
    
 if ( confirm("Etes-vous surs de vouloir supprimer ce client?") ) {
    // var xmlHttp = new XMLHttpRequest();
    // xmlHttp.open( "GET", "/../sup.php?edit1=1", false ); // false for synchronous request
    // xmlHttp.send( null );
    // return xmlHttp.responseText;
    var xmlHttp = new XMLHttpRequest();
    // xmlHttp.onreadystatechange = function() { 
    //     if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
    //         callback(xmlHttp.responseText);
    // }
    let toDelete = "/fonaco/sup.php?edit1="+id;
    xmlHttp.open("GET", toDelete, true); // true for asynchronous 
    xmlHttp.send(null);
    location.reload();
 }
 
}
    
function resetSearch() {
    document.getElementById("searchResults").innerHTML = "";
    document.getElementById("searchResults").style.border = "0px";
}

function searchUsers(input) {
    let xhttp;
    if (input.length === 0) {
        resetSearch()
    }
    if(window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
    } else {
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.onreadystatechange = function () {
        if(this.readystatechange === 4 && this.status === 200) {
            
        }
    }
}

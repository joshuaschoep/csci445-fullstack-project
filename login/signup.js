
function checkPasswordsMatch() {
    // to quick check that user passwords match before submitting
    // does not check any password restrictions
    var p1 = "";
    var p2 = "";
    p1 = document.getElementById("pw").value;
    p2 = document.getElementById("pw-repeat").value;

    if (p1 !== p2) {
        alert("passwords do not match. please make sure you retype the password exactly");
        document.getElementById("register").reset();
        return false;
    }
    else {
        // hash the password on submit if it is acceptable
        // sha512 probably overkill but whatever
        document.getElementById("pw").value = hex_sha512(p1);
        document.getElementById("pw-repeat").value = hex_sha512(p2);
        return true;
    }
}

function checkUserInfo() {
    if (checkPasswordsMatch()) {
        var uname = "";
        uname = document.getElementById("uname").value;
        
        // query for usernames and if it exists reset the page
        if (window.XMLHttpRequest) {
            xht = new XMLHttpRequest();
        } else {
            xht = new ActiveXObject("Microsoft.XMLHTTP");
        }
    
        xht.onreadystatechange=function() {
            if(this.readyState==4 && this.status==200) {
                if (this.responseText == "repeat") {
                    // if the username is a repeat, return false
                    alert("Username already taken. please try again");
                    document.getElementById("uname").value = "";
                    return false;
                }
            }
        }
        xht.open('GET', 'check_user.php?name='+uname,true);
        xht.send();
    }
    else {
        document.getElementById("pw").value = "";
        document.getElementById("pw-repeat").value = "";
        return false;
    }

}

function checkPasswordsMatch() {
    // to quick check that user passwords match before submitting
    // does not check any password restrictions
    var p1 = "";
    var p2 = "";
    p1 = document.getElementById("pw").value;
    p2 = document.getElementById("pw-repeat").value;

    if (p1 !== p2) {
        console.log("pw mismatch first")
        alert("passwords do not match. please make sure you retype the password exactly");
        document.getElementById("register").reset();
        return false;
    }
    else {
        // hash the password on submit if it is acceptable
        // sha512 probably overkill but whatever
        // document.getElementById("pw").value = hex_sha512(p1);
        return true;
    }
}

// global referenced onsubmit
var valid_username = false;

function checkUserInfo() {
    p1 = document.getElementById("pw").value;
    if (checkPasswordsMatch()) {
        if (valid_username == false) {
            alert("Username already taken. please try again");
            document.getElementById("uname").value = "";
            return false;
        }
        else {
            document.getElementById("pw").value = hex_sha512(p1);
            return true;
        }
    }
    else {
        console.log("pw mismatch")
        document.getElementById("pw").value = "";
        document.getElementById("pw-repeat").value = "";
        return false;
    }
}

function checkUserName() {
    var xht;
    
    var uname = "";
    uname = document.getElementById("uname").value;
    console.log('uname: '+uname);
    // query for usernames and if it exists reset the page
    if (window.XMLHttpRequest) {
        xht = new XMLHttpRequest();
    } else {
        xht = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xht.onreadystatechange = stateChanged;
    xht.open('GET', 'check_user.php?uname='+uname,true);
    xht.send();
    
    function stateChanged() {
        if(xht.readyState==4 && xht.status==200) {
            console.log("returned text: "+xht.responseText);
            if (xht.responseText == "repeat") {
                // console.log("resp.val onreadystatechange before: "+resp.val);
                // update global to reference onsubmit...
                
                valid_username = false;
                console.log("on state change valid username: "+valid_username);
                // if the username is a repeat, return false
                // alert("Username already taken. please try again");
                // document.getElementById("uname").value = "";
                return false;
                }
                
            
            else {
                // no matches
                valid_username = true; 
                return true;
            }
        }
        return false;
    }
}

var valid_login = false;

function loginInfo() {
    checkSignInInfo()
    if (valid_login == false) {
        alert("incorrect login credentials");
        document.getElementById("login").reset();
        return false;
    }
    else {
        return true;
    }
}

function checkSignInInfo() {
    var xht;
    
    var uid_email = "";
    var upass = "";
    uid_email = document.getElementById("uid_email").value;
    upass = document.getElementById("upass").value;
    upass = hex_sha512(upass);
    // console.log('uname: '+uname);
    // query for usernames and if it exists reset the page
    if (window.XMLHttpRequest) {
        xht = new XMLHttpRequest();
    } else {
        xht = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xht.onreadystatechange = submitLogin;
    xht.open('GET', 'check_login.php?uid_email='+uid_email+'&upass='+upass,true);
    xht.send();

    function submitLogin() {
        if(xht.readyState==4 && xht.status==200) {
            if (xht.responseText == "success") {
                valid_login = true;
            }
            else {
                valid_login = false;
            }
        }
        else {
            // bad response
            return false;
        }
    }

}
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
    }
}
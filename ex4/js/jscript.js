document.getElementById("submit").onsubmit = function() {
    var fullName = document.getElementsByName("fullName")[0].value;
    var phone = document.getElementById("phone")[0].value;

    if (!(fullName.includes(" "))) {
        return false;
    }

    if (phone.length < 9 || phone.length > 10 || phone.includes("-")) {
        return false;
    }
}
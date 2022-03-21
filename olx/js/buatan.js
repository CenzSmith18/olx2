function myFunction() {
    var voucher = document.getElementById("voucher");
    var about = document.getElementById("about");
    if (voucher.style.display === "none") {
        voucher.style.display = "block";
        about.style.display = "none";
    } else {
        voucher.style.display = "block";
    }
}
function myFunction2() {
    var voucher = document.getElementById("voucher");
    var about = document.getElementById("about");
    if (about.style.display === "none") {
        about.style.display = "block";
        voucher.style.display = "none";
    } else {
        about.style.display = "block";
    }
}


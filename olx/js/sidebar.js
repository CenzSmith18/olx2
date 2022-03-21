document.getElementsByClassName("toggler-navbar")[0].addEventListener("click", toogleClass);

function toogleClass() {
    document.getElementsByClassName("hamburger-menu")[0].classList.toggle('open')
    document.getElementsByClassName("sidebar")[0].classList.toggle('open')
}
function sidebar() {
    var sidebar = document.getElementById("panel-sidebar");
    if (sidebar.style.display === "none") {
        sidebar.style.display = "block";
    } else {
        sidebar.style.display = "none";
    }
}
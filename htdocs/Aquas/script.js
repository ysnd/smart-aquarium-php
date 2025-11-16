function toggleSideNav() {
    var sideNav = document.getElementById("sideNav");
    var isi = document.getElementById("isi");
    var menuIcon = document.getElementById("menuIcon");

    if (sideNav.style.width === "25%") {
        sideNav.style.width = "0";
        isi.style.marginLeft = "0";
        menuIcon.style.marginLeft = "0";
    } else {
        sideNav.style.width = "25%";
        isi.style.marginLeft = "25%";
        menuIcon.style.marginLeft = "25%";
        content.style.marginLeft = "25%";
    }
}
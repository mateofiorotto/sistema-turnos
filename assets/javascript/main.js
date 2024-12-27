let userIcon = document.getElementById("user-icon");
let dropDownUser = document.getElementById("dropdown-user");

function mostrarMenu() {
    dropDownUser.classList.toggle('d-none');
}

if (userIcon) {
    userIcon.addEventListener("click",mostrarMenu);
}

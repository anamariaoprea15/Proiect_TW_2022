function openForm() {
    document.getElementById('formPopup').style.display = "block";
}

function closeForm() {
    document.getElementById('formPopup').style.display = "none";
}

function goRegister() {
    document.getElementById('loginContainer').style.display = "none";
    document.getElementById('registerContainer').style.display = "block";
}

function goLogin() {
    document.getElementById('registerContainer').style.display = "none";
    document.getElementById('loginContainer').style.display = "block";
}
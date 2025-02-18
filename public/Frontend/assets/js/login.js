function show_pass() {

    var pass_field = document.getElementById("password");
    var repass_field = document.getElementById("repassword");

    if (pass_field.type === "password") {
        pass_field.type = "text";
    } else {
        pass_field.type = "password";
    }

    if (repass_field.type === "password") {
        repass_field.type = "text";
    } else {
        repass_field.type = "password";
    }
}

function option_func(){
    const login_btn = document.querySelector('#login_btn');
    login_btn.classList.remove("disable");
}
// Validating Phone
let phone = document.getElementById('phone');
let error_phone = document.getElementById('error_phone');
document.getElementById('phone').addEventListener('blur', () => {
    if(isNaN(phone.value)){
        error_phone.innerText = 'Phone should be a number';
        phone.color = 'red';
    }else{
        error_phone.innerText = '';
    }
});


// Validating Name
let fname = document.getElementById('fullName');
let error_fname = document.getElementById('error_fname');
document.getElementById('fullName').addEventListener('blur', () => {
    if(isNaN(fname.value)){
        error_fname.innerText = '';
    }else{
        error_fname.innerText = 'Inappropriate Name field...';
        fname.color = 'red';
    }
});

// Validating Email
document.querySelector('#email').addEventListener('blur', email);
function email(){
    let email = document.getElementById("email").value;
    let filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(email == ""){
        document.getElementById("error_email").innerHTML = "";
    }
    else if (!filter.test(email)) {
        document.getElementById("error_email").innerHTML = "Invalid email address";
    }
    else{
        document.getElementById("error_email").innerHTML = "";
    }
}
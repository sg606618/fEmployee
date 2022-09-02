let menu = document.getElementById('threeLine');
let nav = document.getElementById('nav');
let menuShow = document.getElementById('menus');

window.onload = function() {
    document.onclick = function (div) {
        if(div.target.id !== 'menus' && div.target.id !== 'threeLine'){
            menuShow.style.left = '-100%';
        }
    }
}
function displayThreeLine(){
    menuShow.style.left = "0%";
}
function hideThreeLine(){
    menuShow.style.left = "-100%";
}
// if(nav.style.display === "flex"){
//     menuShow.style.display = "none";
// }else{
//     menuShow.style.display = "block";
// }


// Password show or hide 
function showpass() {
    document.getElementById('hidepas').style.visibility = "visible";
    document.getElementById('showpas').style.visibility = "hidden";
    
    var x = document.getElementById("inputpass");
    if (x.type === "password") {
      x.type = "text";
    }
}
function hidepass() {
    document.getElementById('hidepas').style.visibility = "hidden";
    document.getElementById('showpas').style.visibility = "visible";

    var x = document.getElementById("inputpass");
    if (x.type === "text") {
      x.type = "password";
    }
}


function submitForm() {
    document.getElementById('alert').style.display = "flex";
}


// let check = document.getElementById('checkbox');
function checked() {
    if(document.getElementById("checkbox").checked == false){
        document.getElementById("checkbox").checked = true;
    }else{
        document.getElementById("checkbox").checked = false;
    }
}



// Individual 
document.getElementById('pay').addEventListener('click', hidePaymentContent);
document.getElementById('line').addEventListener('click', hidePaymentContent);
function hidePaymentContent(){
    if(document.getElementById('payForm').style.top == "-150%"){
        document.getElementById('payForm').style.top = "2%";
        if(document.id !== 'payForm'){
            document.style.opacity = '.3';
        }
    }else{
        document.getElementById('payForm').style.top = "-150%";
    }
};
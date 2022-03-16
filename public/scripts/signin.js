
let nom=document.getElementById("nom");
let prenom=document.getElementById("prenom");
let email=document.getElementById("mail");
let pass1=document.getElementById("password1");
let pass2=document.getElementById("password2");

function lastname(){
    if(nom.value.length >=2){
        nom.setAttribute('class','valid');
    }else{
        nom.setAttribute('class','invalid');
    }
}

function firstname(){
    if(prenom.value.length >=2){
        prenom.setAttribute('class','valid');
    }else{
        prenom.setAttribute('class','invalid');
    }

}

function verifmail()
{
    var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (email.value.match(regex))
    {
        email.setAttribute('class','valid');
    }
    else {
        email.setAttribute('class','invalid');
    }
}

function verifpassword(){
    var regex = /^[a-zA-Z0-9]{0,6}$/g;

    if (pass1.value.match(regex) && pass1.value.length >=6 )
    {
        pass1.setAttribute('class','valid');
        return true;
    }
    else{
        pass1.setAttribute('class','invalid');
        return false;
    }
}
function idpassword(){

    if(verifpassword()===true && pass1.value===pass2.value){
        pass2.setAttribute('class','valid');

    }
    else{
        pass2.setAttribute('class','invalid');
    }
}
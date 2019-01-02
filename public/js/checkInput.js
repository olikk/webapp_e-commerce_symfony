
function checkName(champ){
    
   if(champ.value.length < 2){
      document.getElementById("nameError").style.display = 'block';
      document.getElementById("name").className = "form-control is-invalid";
      return false;
    }else{
      document.getElementById("nameError").style.display = 'none';
      document.getElementById("name").className = "form-control is-valid";
      return true;
   }
}
function checkSurname(champ){
    
   if(champ.value.length < 2){
      document.getElementById("surnameError").style.display = 'block';
      document.getElementById("surname").className = "form-control is-invalid";
      return false;
    }else{
      document.getElementById("surnameError").style.display = 'none';
      document.getElementById("surname").className = "form-control is-valid";
      return true;
   }
}
function checkMail(champ){
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value)){
      document.getElementById("mailError").style.display = 'block';
      document.getElementById("email").className = "form-control is-invalid";
   }else{
       document.getElementById("mailError").style.display = 'none';
       document.getElementById("email").className = "form-control is-valid";
   }
}

function check2Psw(champ){
    if (champ.value!=""){
        if(champ.value != document.getElementById("password").value){
            document.getElementById("pswError").style.display = 'block';
            document.getElementById("password-confirm").className = "form-control is-invalid";
            document.getElementById("password").className = "form-control is-invalid";
        }else{
            document.getElementById("pswError").style.display = 'none';
            document.getElementById("password-confirm").className = "form-control is-valid";
            document.getElementById("password").className = "form-control is-valid";
        }
    }
}
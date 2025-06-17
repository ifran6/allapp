// Function to switch between forms and clear messages
// function showForm(formId) {
//     document.querySelectorAll(".form-box").forEach(form => {
//         form.classList.remove("active");
//         const responseMsg = form.querySelector('.response');
//         if (responseMsg) responseMsg.innerHTML = ''; // clear messages when switching
//     });
//     const targetForm = document.getElementById(formId);
//     if (targetForm) {
//         targetForm.style.display="block";
//         // classList.add("active");
//     }

//     alert(formId);
// }

 

function showForm(formId) {
    document.getElementById("loginForm").style.display="none";
    document.getElementById("forgotPwdForm").style.display="none";
    document.getElementById("forgotPasswordForm").style.display="none";
    document.getElementById("registerForm").style.display="none";
    document.getElementById(formId).style.display="block";
}


function formSwitchHandler(){
        const forgottenPwd = document.querySelector('.forgotten-pass');
    if(forgottenPwd){
        forgottenPwd.addEventListener('click', () => showForm('forgotPwdForm'));
    }

    const formRegister = document.querySelector('.button-register');
    if(formRegister){
        formRegister.addEventListener('click', () => showForm('registerForm'));
    }

    const continueForgotPwd = document.querySelector('.button-fgt-continue');
    if(continueForgotPwd){
        continueForgotPwd.addEventListener('click', () => showForm('forgotPasswordForm'));
    }

    const loginFrmHandler = document.querySelector('.button-login');
    if(loginFrmHandler){
        loginFrmHandler.addEventListener('click', () => showForm('loginForm'));
    }
}


function loginFormHandler(){
    const responseMsg = document.querySelector('.response');
    const loginHandler = document.querySelector('.frm-login');
    if(loginHandler){
          loginHandler.addEventListener('submit', (ev)=> {
        ev.preventDefault();

        const formData = new FormData(ev.target);
        // inputhandler
        const lgnUser = document.querySelector('.lgn-username').value.trim();
         const lgnPass = document.querySelector('.lgn-password').value.trim();

         if(lgnUser == "" || lgnPass == ""){

            responseMsg.innerHTML ="<p class='alert alert-danger'>Field the Form </p>";
         }else{
            fetch('../includes/login_app.php', {
                method:"POST",
                body:formData,
            })
            // .then(res => res.text())
            .then(response=>{
                if(!response.ok){ 
                  throw new Error(`Server responded with status: ${response.status}`);
                   
                }else{
                     window.location.href = "welcome.php";
                }
                return response.text();
            })
            .then(data => {responseMsg.innerHTML = data;
                //  loginHandler.reset();
                })
            .catch(err => {
             responseMsg.innerHTML = "Err"+err;
            });
         }
        
    });
    }
}


function registrationFormHandler(){
    const registrationHandler = document.querySelector('.frm-register');
    const regMsg = document.querySelector('.hintmsg');

    if(registrationHandler){
        registrationHandler.addEventListener('submit', (e) =>{
        e.preventDefault();
        const form = new FormData(e.target);

        const username = document.querySelector('.username').value.trim();
        const lastName = document.querySelector('.last-name').value.trim();
        const firstName = document.querySelector('.first-name').value.trim();
        const email = document.querySelector('.email').value.trim();
        const userPassword= document.querySelector('.password').value.trim();
        const confirmPass = document.querySelector('.confirm-password').value.trim();

        if(username == "" || lastName == "" || firstName == "" || email == "" ||userPassword == "" || confirmPass == ""){
            regMsg.innerHTML = "<p class='alert alert-danger'>Please fill out the forms</p>";
        }else if(userPassword !== confirmPass  ){
             regMsg.innerHTML = "<p class='alert alert-danger'>Password doesn't Match!</p>";
        }else{
           fetch('../includes/register.php', {
                    method:"POST",
                    body:form,
                })
                .then(response => {
                    if(!response.ok){
                        throw new Error(`Server responded with status: ${response.status}`);
                    }
                    else{
                    //    setTimeout(()=>{ window.location.href = "./user_action.php";}, 2000);
                    }
                return response.text();
                })
                .then(data => {regMsg.innerHTML = data;
                    //  loginHandler.reset();
                    })
                .catch(err => {
                regMsg.innerHTML = "Err"+err;
                });
        }
        
         });
    }
    
}


registrationFormHandler();
loginFormHandler();
formSwitchHandler();


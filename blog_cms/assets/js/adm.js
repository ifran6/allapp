
function viewHandlers(){
        const viewUsers = document.getElementById('viewUser');
    if(viewUsers){
        viewUsers.addEventListener('click', ()=>{
            const displayUsers = document.querySelector('.d-users');
            fetch('../includes/fetchusers.php')
            .then(response=>{ 
                if(!response.ok){ 
                  throw new Error(`Server responded with status: ${response.status}`);
                   
                }else{
                    // setTimeout(()=>{ window.location.href = "welcome.php";}, 2000);
                    // alert(0);
                }
                return response.text();
            })
            .then(data=>{
                displayUsers.innerHTML = data;
            })
            .catch(err=>{
                displayUsers.innerHTML = "Error:"+err;
            });
            displayUsers.innerHTML = ("viewUser");
        });
    }
}


// function editHandler(){
// document.querySelectorAll(".button_edit-user").forEach(btnId=>btnId.addEventListener("click", ()=>{
//  console.log('more info: btnId.dataset.userId');
//     // alert(0);
// })
// );
  // }
// }


function addNewUser() {
    const addUser = document.querySelector('.frm-add-user');
    const Msg = document.querySelector('.err__msg');
    if (addUser) {
        addUser.addEventListener('submit', (e) => {
            e.preventDefault();

            const userForm = new FormData(e.target);
            const addUsername = document.querySelector('.username').value.trim();
            const addLname = document.querySelector('.lname').value.trim();
            const addFname = document.querySelector('.fname').value.trim();
            const addEmail = document.querySelector('.email').value.trim();
            const addPass = document.querySelector('.pass').value.trim();
            const confirmPass = document.querySelector('.confirm-pass').value.trim();

            // Ensure all fields are filled
            if (
                addUsername !== "" &&
                addLname !== "" &&
                addFname !== "" &&
                addEmail !== "" &&
                addPass !== "" &&
                confirmPass !== ""
            ) {
                if (addPass === confirmPass) {
                     Msg.innerHTML = "<p class='text-info text-center'>Submitting user...</p>";

                   setTimeout(()=>{
                    fetch('../includes/adduser.php', {
                        method: 'POST',
                        body: userForm,
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`Server responded with status: ${response.status}`);
                        }
                        return response.text();
                    })
                    .then(data => {
                        Msg.innerHTML = data;
                        // addUser.reset(); // Optional: reset form after successful submit
                    })
                    .catch(err => {
                        Msg.innerHTML = `<p class='text-danger'>Error: ${err.message}</p>`;
                    });
                   },3000);

                } else {
                    Msg.innerHTML = "<p class='text-danger'>Passwords do not match!</p>";
                }
            } else {
                Msg.innerHTML = "<p class='text-danger'>All fields are required!</p>";
            }
        });
    }
}

// Call the function to attach event
addNewUser();


function updateFormHandler() {
    const updateForm = document.querySelector(".update-form");
        const updErrMsg = document.querySelector(".update-Emsg");
    
    if(updateForm){
        updateForm.addEventListener('submit', (e)=>{
            e.preventDefault();
            
            const myForm = new FormData(e.target);
            const updateUsername = document.querySelector('.update_username').value.trim();
            const updateLname = document.querySelector('.update_lname').value.trim();
            const updateFname = document.querySelector('.update_fname').value.trim();
            const updateEmail = document.querySelector('.update_email').value.trim();
            const updatePass = document.querySelector('.update_pass').value.trim();

            if(updateUsername !== "" 
                && updateLname !== ""
                && updateFname !== "" 
                && updateEmail !== ""
                && updatePass !== ""){

                fetch('../includes/update.php',{
                        method:'POST',
                        body:myForm,
                    })
                    .then(res => {
                        if(!res.ok){
                            throw new Error(`Server responded with status: ${res.status}`);
                        }
                        else{
                        
                        // setTimeout(()=>{ window.location.href = "./welcome.php";}, 5000);
                        }
                    return res.text();
                    })
                    .then(data => {updErrMsg.innerHTML = data;
                        //  loginHandler.reset();
                        })
                    .catch(err => {
                    updErrMsg.innerHTML = "Err"+err;
                    });

            }else{
                updErrMsg = document.innerHTML = "<p class='text-danger'> Fill out this Field! </p>";
            }
            // alert("update loading");
        });
    }
    
}

updateFormHandler();
// addNewUser();
viewHandlers();

function addRoleFormHandler() {
    const addRoleForm = document.querySelector(".add_role_form");
        const addRoleErrMsg= document.querySelector(".add_role_Emsg");
    
    if(addRoleForm){
        addRoleForm.addEventListener('submit', (e)=>{
            e.preventDefault();
            
            const myForm = new FormData(e.target);
            const addRoleUsername = document.querySelector('.add_role_username').value.trim();
            const addRoleLname = document.querySelector('.add_role_lname').value.trim();
            const addRoleFname = document.querySelector('.add_role_fname').value.trim();
            const addRoleEmail = document.querySelector('.add_role_email').value.trim();
            const addRoleSelect = document.querySelector('.select_role');
            const selectedRole = addRoleSelect.options[addRoleSelect.selectedIndex].value.trim();

             addRoleErrMsg.innerHTML = "<p class='text-info'> Submitting role...</p>";

            // alert(selectedRole);
         setTimeout(()=>{
            if(addRoleUsername !== ""
                || addRoleLname !== ""
                || addRoleFname !== ""
                || addRoleEmail !== ""
                || selectedRole !== ""){
                
                
                    
                fetch('../includes/select__role.php',{
                        method:'POST',
                        body:myForm,
                    })
                    .then(res => {
                        if(!res.ok){
                            throw new Error(`Server responded with status: ${res.status}`);
                        }
                        else{
                        
                        // setTimeout(()=>{ window.location.href = "./welcome.php";}, 5000);
                        }
                    return res.text();
                    })
                    .then(data => {addRoleErrMsg.innerHTML = data;
                        //  loginHandler.reset();
                        })
                    .catch(err => {
                    addRoleErrMsg.innerHTML = "Err"+err;
                    });
                
            }else{
                addRoleErrMsg = document.innerHTML = "<p class='text-danger'> Fill out this Field! </p>";
            }

         }, 2000);
            // alert("update loading");
        });
    }
    
}

addRoleFormHandler();
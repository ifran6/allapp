function showFormHandler(formId) {
    document.getElementById("add__product").style.display="none";
    document.getElementById("add_product_byBatch").style.display="none";
    document.getElementById(formId).style.display="block";
}

const addProductIndividual = document.querySelector(".individual_product");
    if(addProductIndividual){
        addProductIndividual.addEventListener("click", () => showFormHandler("add__product"));
    }

const addProductByBatch = document.querySelector(".batch_product");
if(addProductByBatch){
        addProductByBatch.addEventListener("click", () => showFormHandler("add_product_byBatch"));
    }


const viewUsers = document.querySelector('.viewUser'); 
      
    if(viewUsers){
        viewUsers.addEventListener('click', ()=>{
             const displayUsers = document.querySelector('.d-users');
            displayUsers.innerHTML = "<P class='text-info text-center p-2'> Loading users, please wait...</p>";

            setTimeout(()=> {
                fetch('../includes/fetchusers.php')
                    .then(response=>{ 
                        if(!response.ok){ 
                        throw new Error(`Server responded with status: ${response.status}`);
                        
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
             
            }, 3000);  
         });
    }

//  ==============================gettingById==================================
// ===============================================================================

         const openUsers = document.getElementById('openUser');
       
    if(openUsers){
            openUsers.addEventListener('click', ()=>{  
                const userFeedback = document.querySelector('.d-users');  
                userFeedback.innerHTML = "<P class='text-info text-center p-2'> Loading users.....</p>";
              
                setTimeout(() => {
                    fetch('../includes/fetchusers.php')
                .then(response=>{ 
                    if(!response.ok){ 
                    throw new Error(`Server responded with status: ${response.status}`);
                    
                    }
                    return response.text();
                })
                .then(data=>{
                    userFeedback.innerHTML = data;
                })
                .catch(err=>{
                    userFeedback.innerHTML = "Error:"+err;
                });
          
                }, 2000);
            });
        }
  

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
                updErrMsg.innerHTML = "<p class='text-danger'> Fill out this Field! </p>";
            }
            // alert("update loading");
        });
    }
    
}

updateFormHandler();
// addNewUser();


// viewHandlers();

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


const addProduct = document.querySelector('.frm-add-product');
 const err_msg = document.querySelector('.err__msg');
if(addProduct){
    addProduct.addEventListener('submit', e => {
        e.preventDefault();
        // alert("add Product loading");
        const myForm = new FormData(e.target);
       

        err_msg.innerHTML = "<p class='text-info' role='alert'> Adding Product loading....</p>";
        const product_name = document.querySelector('.product_name').value.trim();
        const product_description = document.querySelector('.product_desc').value.trim();
        const product_qty = document.querySelector('.product_qty').value.trim();
        const product_price = document.querySelector('.product_price').value.trim();
        const product_category = document.querySelector('.product_category');
        const productCategory = product_category.options[product_category.selectedIndex].value.trim();

        setTimeout(() =>{
             if(product_name !== ""
                && product_description !== ""
                && product_qty !== ""
                && product_price !== ""
                && productCategory !== ""
              && Number(product_qty) || Number(product_price)){
                
                fetch('../includes/add_product_inc.php',{
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
                    .then(data => {err_msg.innerHTML = data;
                        //  loginHandler.reset();
                        })
                    .catch(err => {
                    err_msg.innerHTML = "Err"+err;
                    });
                
            }else{
                err_msg.innerHTML = "<p class='text-danger'> Fill out this Field! </p>";
            }

        }, 2000);
    });
}


const multiBatchProduct = document.querySelector('.frm-add-multiproduct');
 if(multiBatchProduct){

    multiBatchProduct.addEventListener('submit', e => {
        e.preventDefault();
        const errMsg = document.querySelector('.err-msg');
        errMsg.innerHTML = "<p class='text-info text-center' role='alert'>Uploading Product file...</p>";
        const batchForm = new FormData(e.target);

        const productDescription = document.querySelector('.product_description').value.trim();

        // alert(`multiple Product ${errMsg}`);
        if(productDescription !==""){
             setTimeout(() => {
                fetch('../includes/batch_product_inc.php',{
                        method:'POST',
                        body:batchForm,
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
                    .then(data => {errMsg.innerHTML = data;
                        //  loginHandler.reset();
                        })
                    .catch(err => {
                    errMsg.innerHTML = "Err"+err;
                    });
             }, 2000);
            //  erMsg.innerHTML = "<p class='text-success'> uploading...! </p>";
        }else{
            errMsg.innerHTML = "<p class='text-danger'> Fill out this Field! </p>";
        }
    });
 }

 const productViewHandler = document.getElementById('viewProduct');
    if(productViewHandler){
        productViewHandler.addEventListener("click", () => {
            const displayBox = document.querySelector('.d-users');

            displayBox.innerHTML = "<p class='text-info text-center p-4'> Fetching Products.....!</p>";

            setTimeout(()=>{
                fetch('../includes/fetchproduct.php')
                    .then(res => {
                        if(!res.ok){
                            throw new Error(`Server responded with status: ${res.status}`);
                        }
                        
                    return res.text();
                    })
                    .then(data => { displayBox.innerHTML = data;
                        //  loginHandler.reset();
                        })
                    .catch(err => {
                    displayBox.innerHTML = "Err"+err;
                    });
            }, 1500);
            // alert('Open product');
        });
    }


    const editProductHandler = document.querySelector('.product_update_form');
    if(editProductHandler){
        editProductHandler.addEventListener('submit', e => {
            e.preventDefault();
            const productUpdateMsg = document.querySelector('.update-Emsg');
            const productForm = new FormData(e.target);

            productUpdateMsg.innerHTML = "<p class='text-info'>Submitting Product for Update...</p>";

            // alert('edit product loading');

             setTimeout(()=>{
                fetch('../includes/updateproduct.php',
                    {
                        method:'POST',
                        body:productForm,
                    })
                    .then(res => {
                        if(!res.ok){
                            throw new Error(`Server responded with status: ${res.status}`);
                        }
                       
                    return res.text();
                    })
                    .then(data => { 
                        productUpdateMsg.innerHTML = data;
                         
                        setTimeout(()=>{ editProductHandler.reset();}, 1000);
                        })
                    .catch(err => {
                    productUpdateMsg.innerHTML = "Err"+err;
                    });
            }, 2000);
        });
    }


//  function deleteProduct() {
//     document.querySelectorAll(".btn_delete-product").forEach(function (btn) {
//         btn.addEventListener("click", function () {
//             const dataId = this.getAttribute('data-id');
//             const errBox = document.querySelector('.errBox'); 
//             errBox.innerHTML = "<p class='text-info'>Deleting product...</p>";
// console.log('hello');
//             if (confirm("Are you sure you want to delete this product?")) {
               

//                 const formData = new FormData();
//                 formData.append('id', dataId);

//                 fetch('../includes/deleteproduct.php', {
//                     method: 'POST',
//                     body: formData,
//                 })
//                 .then(res => {
//                     if (!res.ok) {
//                         throw new Error(`Server responded with status: ${res.status}`);
//                     }
//                     return res.text();
//                 })
//                 .then(data => {
//                     errBox.innerHTML = data;

//                     // Optionally reload page or remove row from DOM
//                     setTimeout(() => {
//                         location.reload(); // or remove the specific row via JS
//                     }, 1500);
//                 })
//                 .catch(err => {
//                     errBox.innerHTML = "<p class='text-danger'>Error: " + err.message + "</p>";
//                 });
//             }
//         });
//     });
// }

function deleteProduct(){
    document.addEventListener("click", function (e) {
    if (e.target && e.target.classList.contains("btn_delete-product")) {
        const dataId = e.target.getAttribute('data-id');
        const errBox = document.querySelector('.errBox');

        if (confirm("Are you sure you want to delete this product?")) {
            errBox.innerHTML = "<p class='text-info'>Deleting product...</p>";

            const formData = new FormData();
            formData.append('id', dataId);

            fetch('../includes/delete_product.php', {
                method: 'POST',
                body: formData,
            })
                .then(res => {
                    if (!res.ok) {
                        throw new Error(`Server responded with status: ${res.status}`);
                    }
                    return res.text();
                })
                .then(data => {
                    errBox.innerHTML = data;
                    // setTimeout(() => {
                    //     location.reload();
                    // }, 1500);
                })
                .catch(err => {
                    errBox.innerHTML = "<p class='text-danger'>Error: " + err.message + "</p>";
                });
        }
    }
});

}

deleteProduct();



// =====================================================
// ==================ADs===============================

// create_ads

const createADs = document.querySelector('.frm-create-ads');

if(createADs){
    createADs.addEventListener('submit', (ev) => {
        ev.preventDefault();
        const myForm = new FormData(ev.target);
        const adsErrMsg = document.querySelector('.ads_err__msg');

        // adsErrMsg.innerHTML = "<p class='text-danger text-center'> loading Ads</p>";

        const adsTitle = document.querySelector('.ads_name').value.trim();
        const adsCategory = document.querySelector('.ads_category');
        const adsDescription = document.querySelector('.ads_desc').value.trim();
        const selectedADsCategory = adsCategory.options[adsCategory.selectedIndex].value.trim();

       

        if(adsTitle !=="" && selectedADsCategory !== "" && adsDescription !== "" && adsDescription !== ""){
            if(adsCategory === ""){
                adsErrMsg.innerHTML = "<p class='text-danger text-center'> Category can't be empty </p>";
            }else{  adsErrMsg.innerHTML = "<p class='text-info text-center'> loading, please wait...... </p>";
                setTimeout(()=>{ 
                    fetch('../includes/ads_inc.php',
                        {
                            method:'POST',
                            body:myForm,
                        }
                    )
                        .then(res => {
                            if(!res.ok){
                                throw new Error(`Server responded with status: ${res.status}`);
                            }
                            
                        return res.text();
                        })
                        .then(data => { adsErrMsg.innerHTML = data;
                            // setTimeout(()=>{ createADs.reset();}, 3000);
                            })
                        .catch(err => {
                        adsErrMsg.innerHTML = "Err"+err;
                        });
                }, 3000);
            }
        }else{
             adsErrMsg.innerHTML = "<p class='text-danger text-center'> Look out for the empty Fields</p>";
        }


    });
}

const viewAdvert = document.getElementById("viewADs");
if(viewAdvert){
    const dp = document.querySelector('.d-users');
    viewAdvert.addEventListener('click', () =>{
      dp.innerHTML = "<p class='text-info text-center p-4'> Loading Ads</p>";

      setTimeout(() => {
        fetch('../includes/fetch_ads.php')
            .then(response=>{ 
                if(!response.ok){ 
                throw new Error(`Server responded with status: ${response.status}`);
                
                }
                return response.text();
            })
            .then(data=>{
                dp.innerHTML = data;
            })
            .catch(err=>{
                dp.innerHTML = "Error:"+err;
            });
            // displayUsers.innerHTML = ("viewUser");
       
            }, 3000);
    });
}

// ======================================================================
// ========================== UADs=======================================

const adsUpdateForm = document.querySelector('.ads_update-form');

if(adsUpdateForm){
    adsUpdateForm.addEventListener('submit', (ads) => {
        ads.preventDefault();
        const adsForm = new FormData(ads.target);
        const feedback = document.querySelector('.error_msg');
        const adsTitle = document.querySelector('.ads_title_update').value.trim();
        const adsDescr = document.querySelector('.ads_descr_update').value.trim();
        const adsCategory = document.querySelector('.ads_category_update');
        const selectedCategoryUpdate = adsCategory.options[adsCategory.selectedIndex].value.trim();
        const adsStatu = document.querySelector('.ads_category_update');
        const selectedStatuUpdate = adsStatu.options[adsStatu.selectedIndex].value.trim();

        feedback.innerHTML = "<p class='text-info text-center p-4'> Updating ADs, please wait..... </p>";

        if(confirm("Are you sure?")){
            if(adsTitle !=="" && adsDescr !=="" && selectedCategoryUpdate !=="" && selectedStatuUpdate !==""){
                setTimeout(() => {
                    fetch('../includes/update_ads.php',{
                        method:'POST',
                        body:adsForm,
                    })
                    .then(response=>{ 
                        if(!response.ok){ 
                        throw new Error(`Server responded with status: ${response.status}`);
                        
                        }
                        return response.text();
                    })
                    .then(data=>{
                        feedback.innerHTML = data;
                    })
                    .catch(err=>{
                        feedback.innerHTML = "Error:"+err;
                    });
                }, 2000);
            }else{
                feedback.innerHTML = "<p class='text-danger text-center'> Couldn't submit an empty fields</p>";
            }
        }

    });
}



    document.addEventListener("click", (e) =>{
        if (e.target && e.target.classList.contains("btn_delete_ads")) {
     const idElems = e.target.getAttribute('data-id');
     const delForm = new FormData();
     const feedback = document.querySelector('.errBox');

     delForm.append('id',idElems);
     if(confirm("are you sure?")){
        setTimeout(() => {
            fetch('../includes/delete_ads.php',{
                method:'POST',
                body:delForm,
            })
            .then(response=>{ 
                if(!response.ok){ 
                throw new Error(`Server responded with status: ${response.status}`);
                
                }
                return response.text();
            })
            .then(data=>{
                feedback.innerHTML = data;
            })
            .catch(err=>{
                feedback.innerHTML = "Error:"+err;
            });
        }, 2000);
     }}
    });

    const viewPost = document.getElementById('viewPost');
    const feedback = document.querySelector('.d-users'); 
  
    if(viewPost){
       viewPost.addEventListener('click', ()=>{
            feedback.innerHTML = "<p class='text-info text-center p-4'> Loading Post</p>";

             setTimeout(()=>{
                fetch('../includes/fetchpost.php')
                    .then(res => {
                        if(!res.ok){
                            throw new Error(`Server responded with status: ${res.status}`);
                        }
                        
                    return res.text();
                    })
                    .then(data => { 
                        feedback.innerHTML = data;
                        //  loginHandler.reset();
                        })
                    .catch(err => {
                    feedback.innerHTML = "Err"+err;
                    });
            }, 1500);
       });
      
    }


    // =====================post_update-form======================
    // ===========================================================

    const postUpdateForm = document.querySelector('.post_update-form');
    if(postUpdateForm){
        postUpdateForm.addEventListener('submit', (el)=>{
            el.preventDefault();
            const postForm = new FormData(el.target);
            const feedback = document.querySelector('.error_msg');
            feedback.innerHTML = "<p class='text-center text-info'> updating post, please wait...</p>";

        const postTitle = document.querySelector('.post_title_update').value.trim();
        const post = document.querySelector('.post_content_update').value.trim();
        const postCategory = document.querySelector('.post_category_update');
        const selectedCategoryUpdate = postCategory.options[postCategory.selectedIndex].value.trim();
        const postStatu = document.querySelector('.post_statu_update');
        const selectedStatuUpdate = postStatu.options[postStatu.selectedIndex].value.trim();

        if(postTitle !== "" && post !== "" && selectedCategoryUpdate !== "" && selectedStatuUpdate !== ""){
              setTimeout(()=>{
                fetch('../includes/post_inc.php',{
                    method:'POST',
                    body:postForm,
                })
                    .then(res => {
                        if(!res.ok){
                            throw new Error(`Server responded with status: ${res.status}`);
                        }
                        
                    return res.text();
                    })
                    .then(data => { feedback.innerHTML = data;
                        //  loginHandler.reset();
                        })
                    .catch(err => {
                    feedback.innerHTML = "Err"+err;
                    });
            }, 1500);
        }else{
             feedback.innerHTML = "<p class='text-center text-danger'> Couldn't submit empty field! </p>";
        }
           
        });
       
    }
    
    // =====================post_create-form======================
    // ===========================================================

    const createPosForm = document.querySelector('.frm-create-post');
    if(createPosForm){
        createPosForm.addEventListener('submit', (el)=>{
            el.preventDefault();
            const postForm = new FormData(el.target);
            const feedback = document.querySelector('.post_err__msg');
            feedback.innerHTML = "<p class='text-center text-info'> Creating Post, please wait...</p>";

        const postTitle = document.querySelector('.post_title').value.trim();
        const post = document.querySelector('.post_content').value.trim();
        const postCategory = document.querySelector('.post_category');
        const selectedCategoryUpdate = postCategory.options[postCategory.selectedIndex].value.trim();

        if(postTitle !== "" && post !== "" && selectedCategoryUpdate !== ""){
              setTimeout(()=>{
                fetch('../includes/create_post_inc.php',{
                    method:'POST',
                    body:postForm,
                })
                    .then(res => {
                        if(!res.ok){
                            throw new Error(`Server responded with status: ${res.status}`);
                        }
                        
                    return res.text();
                    })
                    .then(data => { feedback.innerHTML = data;
                        //  loginHandler.reset();
                        })
                    .catch(err => {
                    feedback.innerHTML = "Err"+err;
                    });
            }, 1500);
        }else{
             feedback.innerHTML = "<p class='text-center text-danger'> Couldn't submit empty field! </p>";
        }
           
        });
       
    }


     document.addEventListener("click", function (e) {
    if (e.target && e.target.classList.contains("btn_delete-post")) {
        const dataId = e.target.getAttribute('data-id');
        const errBox = document.querySelector('.errBox');

        if (confirm("Are you sure you want to delete this product?")) {
            errBox.innerHTML = "<p class='text-info'>Deleting product, please wait...</p>";

            const formData = new FormData();
            formData.append('id', dataId);

            fetch('../includes/delete_post.php', {
                method: 'POST',
                body: formData,
            })
                .then(res => {
                    if (!res.ok) {
                        throw new Error(`Server responded with status: ${res.status}`);
                    }
                    return res.text();
                })
                .then(data => {
                    errBox.innerHTML = data;
                    // setTimeout(() => {
                    //     location.reload();
                    // }, 1500);
                })
                .catch(err => {
                    errBox.innerHTML = "<p class='text-danger'>Error: " + err.message + "</p>";
                });
        }
    }
});

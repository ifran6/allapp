// alert("radio button loading");


function showRadio(){
//     let rad1 = document.getElementById("rad1a");
// let rad2 = document.getElementById("rad2b");
let x = document.querySelector(".rad1a");
let y = document.querySelector(".rad2b");

    if(x.checked == true){
        // document.write(`option ${x.value} selected`);
        alert(`option ${x.value} selected`);
    }else if(y.checked == true){
        alert(`you choose ${y.value}`);

    }else{
        alert('No option selected');
    }

}


function showSelection(){
    // alert('seletion loading');
    var sele = document.getElementById('select_0ne');
    alert(sele.options[sele.selectedIndex].value);
    (sele.options[sele.selectedIndex].value == "Option3")?alert("You are correct"):alert("Wrong Option");
}

let xdiv = document.querySelectorAll(".m-div");

for(i = 0; i < xdiv.length; i++){
    xdiv[i].style.background="Red";
    setInterval(function(){
        for(i = 0; i < xdiv.length; i++){
            xdiv[i].style.background="orange";
        }
        }, 2000);

        setTimeout(function(){
            for(i = 0; i < xdiv.length; i++){
                xdiv[i].style.background="pink";
            }
            }, 2500);
}
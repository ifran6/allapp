
const pro_descr = ` Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo voluptatem cumque esse aperiam nulla blanditiis, ducimus inventore illum porro molestias ex nisi excepturi tempore ipsam aspernatur est vitae! Dolor, eveniet.`;


const product = [
    {image:'./assets/images/hero.png',
     name:'Graphic Design',
     descriptions:pro_descr,
     subtitle:'let design for you ....IcT to your door step'
    },

    {  image:'./assets/images/hat-graduation-png-5.png',
        name:'Web Design/Development',
        descriptions:pro_descr,
        subtitle:'let design for you ....IcT to your door step'
    },

    {  image:'./assets/images/slider.jpeg',
        name:'Computer Networking',
        descriptions:pro_descr,
        subtitle:'let design for you ....IcT to your door step'
       },

       {  image:'./assets/images/hero.png',
        name:'Video Editing',
        descriptions:pro_descr,
        subtitle:'let design for you ....IcT to your door step'
       }
]


// const packHTML ='';
function displayScreen(item){
 return `
  <div class='product-card'>
      <div class='product-image-box'>
        <img src=${item.image} class='product-image' alt=${item.name} />
      </div>

      <div class='card-inner'>
         ${item.descriptions} <br>
         <div>${item.subtitle}</div> <br>
         <button class='button-read-more'> Read more!</button>
      </div>
  </div>`;
}


const productData = document.querySelector('.product-item-js');

if(productData){
    productData.innerHTML = product.map(e=>displayScreen(e)).join("");
}


openSlider = (id) => {
  document.getElementById(id).classList.add('myClass'); 
  document.getElementById('slider').classList.add('sliderView');
}

closeHideF = () => {
  let closeHide = document.querySelector('.myClass');
  closeHide.classList.remove('myClass'); 
  let sliderHide = document.querySelector(".sliderView")
  sliderHide.classList.remove('sliderView'); 
  console.log(closeHide.className)
}

previousPhoto = () => {
  let closeHide = document.querySelector('.myClass');
  let previousOne = closeHide.previousElementSibling;
  let leftarrow = document.querySelector('.leftArrow');
  if (previousOne.className === "hideImg"){
    closeHide.classList.remove('myClass');
    previousOne.classList.add("myClass")
  } else {
    leftarrow.style.opacity = "0.5";
  }
};

nextPhoto = () => {
  let closeHide = document.querySelector('.myClass');
  let nextOne = closeHide.nextElementSibling;
  let rightarrow = document.querySelector('.rightArrow');
  if (nextOne.className === "hideImg"){
    closeHide.classList.remove('myClass');
    nextOne.classList.add("myClass")
  } else {
    rightarrow.style.opacity = "0.5";
  }
}



// let sm = document.getElementById('sm');
// let sk = document.getElementById('sk');



// window.addEventListener('scroll', function(){
//     let value = window.scrollY;    
//     let scrollHeight = document.documentElement.scrollTop
//     sk.style.marginTop = value + 'px';
//     if(value < 600){

//         sk.style.height = 70 + value * 0.01 + 'vh';
//         sm.style.marginTop = value * 1.3 + 'px';
//         if(value < 425){
//             sk.style.transform = 'rotate(' + value * 0.1 + 'deg)';
//             sm.style.transform = 'rotate(-' + value * 0.1 + 'deg)';
//         }
//         // sm.style.marginTop = value + 'px';
    


//         if(scrollHeight > 270 && scrollHeight < 480 ){
//             sk.style.right = (value - 270) * 3 + 300 + 'px';
//             sm.style.right = (value - 270) * 3 + 250 + 'px';
//         }
//     }
//     if(value > 600){
//         sm.style.marginRight = (value - 600) * 2 + 'px';
//         sk.style.height = 75.93 + (value - 600) * 0.1 + 'vh';
//         // sk.style.right = (927 - ((value-600) * 0.5)) + 'px';
//         sk.style.transform = 'rotate(' + value * 0.05 + 'deg)';
//     }

// })

const chk = document.getElementById('chk');
const logo = document.getElementById('logo');
const up = document.getElementById('upButton');
const hum = document.getElementById('hideInPc');
const menu = document.getElementById('mobMen')
const body = document.body;

const date = new Date()
const hour = date.getHours()



if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) { 
    document.body.classList.toggle('dark');
}

 function returnThemeBasedOnTime(){
    if (hour < 5 || hour > 20){
        document.body.classList.toggle('dark');
    }
  }


returnThemeBasedOnTime()



chk.addEventListener('change', () => {
	document.body.classList.toggle('dark');
    localStorage.setItem("blockIsActive", document.body.classList.contains('dark'));
});

let blockIsActive = localStorage.getItem("blockIsActive");

if (blockIsActive == "true") {
    document.body.classList.add('dark');
}










window.addEventListener('scroll', function(){
    let value = window.scrollY;   
    
    if (value > 400){
        up.style.display = "block";
    }
    if (value < 400){
        up.style.display = "none";
    }

}
)


var container = document.querySelector('#articles');
var msnry = new Masonry( container, {
  // Настройки
  columnWidth: '.article',
  itemSelector: '.article',
  horizontalOrder: true
});


function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Закройте выпадающее меню, если пользователь щелкает за его пределами
  window.onclick = function(event) {
      
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }





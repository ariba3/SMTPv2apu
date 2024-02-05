//window scroll
window.addEventListener('scroll',()=>{
  document.querySelector('.profile-popup').style.display='none'
  document.querySelector('.add-post-popup').style.display='none'
  document.querySelector('.theme-customize').style.display='none'
})


// start pop

 
document.querySelectorAll('#my-profile-picture').forEach(AllProfile=>{
  AllProfile.addEventListener('click',()=>{
    document.querySelector('.profile-popup').style.display='flex'
  })
});

document.querySelectorAll('.close').forEach(AllClose=>{
  AllClose.addEventListener('click',()=>{
    document.querySelector('.profile-popup').style.display='none'
    document.querySelector('.add-post-popup').style.display='none'
    document.querySelector('.theme-customize').style.display='none'
  })

})


document.querySelector('#profile-upload').addEventListener('change',()=>{
  document.querySelectorAll('#my-profile-picture img').forEach(AllProfileImg=>{
    AllProfileImg.src = URL.createObjectURL(document.querySelector('#profile-upload').files[0])
  })
})



// add post

document.querySelector('#create-lg').addEventListener('click',()=>{
  document.querySelector('.add-post-popup').style.display='flex'
})

document.querySelector('#feed-pic-upload').addEventListener('change',()=>{
  document.querySelector('#postIMG').src= URL.createObjectURL(document.querySelector('#feed-pic-upload').files[0]);
})
//post
document.querySelector('.mini-button').addEventListener('click',()=>{
  document.querySelector('.add-post-popup').style.display='flex';
})

// like


document.querySelectorAll('.action-button span:first-child i').forEach(liked=>{
  liked.addEventListener('click',()=>{
    liked.classList.toggle('liked');
  })
})


let menuItem =document.querySelectorAll('.menu-item');
const removeActive =()=>{
  menuItem.forEach(item=>{
    item.classList.remove('active');
  })
}

menuItem.forEach(item=>{
  item.addEventListener('click',()=>{
    removeActive();
    item.classList.add('active');
    document.querySelector('.notification-box').style.display='none';
  })
})



// theme

document.querySelector('#theme').addEventListener('click',()=>
{
  document.querySelector('.theme-customize').style.display='flex';
})

let colorpallete = document.querySelectorAll('.choose-color span');
var root =document.querySelector(':root');

const removeActiveColor = ()=>{
  colorpallete.forEach(color=>{
    color.classList.remove('active')
  })
}



colorpallete.forEach(color=>{

  color.addEventListener('click',()=>{
    let primaryHue;
    removeActiveColor();

    color.classList.add('active');
    if(color.classList.contains('color-1')){
      Hue= 252;
    }else if(color.classList.contains('color-2')){
      Hue=52;
    }else if(color.classList.contains('color-3')){
      Hue=352;
    }
    root.style.setProperty('--primary-color-hue',Hue);

  })
})



let bg1= document.querySelector('.bg1');
let bg2 = document.querySelector('.bg2');


let lightColorLightTheme;

let whiteColorLightTheme;

let darkColorLightTheme;

bg2.addEventListener('click',()=>{
  darkColorLightTheme ='95%';
  lightColorLightTheme = '5%';
  whiteColorLightTheme = '25%';


    // active class add
    bg2.classList.add('active');
    bg1.classList.remove('active');

    changBg();

});

const changBg =()=>{
  root.style.setProperty('--color-dark-light-theme',darkColorLightTheme);
  root.style.setProperty('--color-light-light-theme',lightColorLightTheme);
  root.style.setProperty('--color-white-light-theme',whiteColorLightTheme);

  
}



let sounds=document.querySelectorAll('audio');
let keys=document.querySelector('ul');

function playSound(index){
    sounds[index].currentTime=0;
    sounds[index].play();
}

function createEffect(index){
    let width=document.querySelector('.effects-container').offsetWidth;
    let design=document.createElement('div');
    design.setAttribute('class','design');
    let r=Math.random()*255;
    let g=Math.random()*255;
    let b=Math.random()*255;
    design.style.background=`rgb(${r},${g},${b})`;
    design.style.height=(Math.random()*100+5)+"px";
    design.style.left=((width/12*index)+(width/12)*0.4)+"px";
    document.querySelector('.effects-container').appendChild(design);
    design.style.animation="drop 1.2s ease-out";
    design.addEventListener('animationend',function(el){
        document.querySelector('.effects-container').removeChild(design);
    })
}

document.addEventListener('keydown', function(el){
    let keycode=el.keyCode;
    switch(keycode){
        case 65:    //A
            playSound(0);
            createEffect(0);
            break;
        case 87:    //W
            playSound(1);
            createEffect(1);
            break;
        case 83:    //S
            playSound(2);
            createEffect(2);
            break;
        case 69:    //E
            playSound(3);
            createEffect(3);
            break;
        case 68:    //D
            playSound(4);
            createEffect(4);
            break;
        case 70:    //F
            playSound(5);
            createEffect(5);
            break;
        case 84:    //T
            playSound(6);
            createEffect(6);
            break;
        case 71:    //G
            playSound(7);
            createEffect(7);
            break;
        case 89:    //Y
            playSound(8);
            createEffect(8);
            break;
        case 72:    //H
            playSound(9);
            createEffect(9);
            break;
        case 85:    //U
            playSound(10);
            createEffect(10);
            break;
        case 74:    //J
            playSound(11);
            createEffect(11);
            break;
    }
});

keys.addEventListener('click', function(el){
    let l=keys.children.length;
    for(let i=0;i<l;i++){
        if(el.target==keys.children[i]){
            playSound(i);
            createEffect(i);
        }
    }
});


let slider=document.querySelector('ul');
let moveLeft=document.getElementById('left-btn');
let moveRight=document.getElementById('right-btn');
let cursor=0;
init();

function init(){
    let n=slider.children.length;
    let width=slider.offsetWidth;
    for(let i=0;i<n;i++){
        slider.children[i].style.left=(width*i)+"px";
        if(width*i!=0)
            slider.children[i].classList.add('hide');
    }
}

moveLeft.addEventListener('click', function(el){
    let n=slider.children.length;
    let width=slider.offsetWidth;
    if(cursor>0){
        for(let i=0;i<n;i++){
            slider.children[i].style.left=(width*(i-cursor))+width+"px";
            if((width*(i-cursor))+width==0){
                slider.children[i].classList.remove('animationInLeft');
                slider.children[i].classList.add('animationInRight');
                slider.children[i].classList.remove('hide');
            }
            else
                slider.children[i].classList.add('hide');
        }
        cursor--;
    }
});

moveRight.addEventListener('click', function(el){
    let n=slider.children.length;
    let width=slider.offsetWidth;
    if(cursor<n-1){
        for(let i=0;i<n;i++){
            slider.children[i].style.left=(width*(i-cursor))-width+"px";
            if((width*(i-cursor))-width==0){
                slider.children[i].classList.remove('animationInRight');
                slider.children[i].classList.add('animationInLeft');
                slider.children[i].classList.remove('hide');
            }
            else
                slider.children[i].classList.add('hide');
        }
        cursor++;
    }
});

document.addEventListener('keyup', function(el){
    let n=slider.children.length;
    let width=slider.offsetWidth;
    switch(el.keyCode){
        case 37:
            if(cursor>0){
                for(let i=0;i<n;i++){
                    slider.children[i].style.left=(width*(i-cursor))+width+"px";
                    if((width*(i-cursor))+width==0){
                        slider.children[i].classList.remove('animationInLeft');
                        slider.children[i].classList.add('animationInRight');
                        slider.children[i].classList.remove('hide');
                    }
                    else
                        slider.children[i].classList.add('hide');
                }
                cursor--;
            }
            break;
        case 39:
            if(cursor<n-1){
                for(let i=0;i<n;i++){
                    slider.children[i].style.left=(width*(i-cursor))-width+"px";
                    if((width*(i-cursor))-width==0){
                        slider.children[i].classList.remove('animationInRight');
                        slider.children[i].classList.add('animationInLeft');
                        slider.children[i].classList.remove('hide');
                    }
                    else
                        slider.children[i].classList.add('hide');
                }
                cursor++;
            }
            break;
    }
});
let ul=document.querySelector('ul');
let overlay=document.querySelector('.overlay');

ul.addEventListener('click', function(el){
    let url=el.target.getAttribute('src');
    let img=document.createElement('img');
    img.setAttribute('src',url);
    if(el.target.getAttribute('class')=="vertical-img")
        img.setAttribute('class','vertical-img');
    else
        img.setAttribute('class','horizontal-img');
    overlay.appendChild(img);
    overlay.classList.add('add-on');
});

overlay.addEventListener('click', function(el){
    if(overlay.classList.contains('add-on') && el.target!=overlay.children[0]){
        overlay.removeChild(overlay.children[0]);
        overlay.classList.remove('add-on');
    }
});

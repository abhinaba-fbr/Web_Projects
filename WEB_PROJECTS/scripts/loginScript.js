let form = document.querySelector('form');

form.addEventListener('mouseover', function(el){
    childs=form.children;
    for(let i=0;i<childs.length;i++){
        if(el.target===childs[i])
            childs[i].classList.add('highlight');
        else
            childs[i].classList.remove('highlight');
    }
});

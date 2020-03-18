let input=document.querySelector('.container input[type="text"]');
let ul=document.querySelector('.container ul');
country=['Austria','Australia','Argentina','Angola','Alaska','Afganistan','Albania','Bangaldesh','Canada','Chili','Denmark','England','France','Germany','Hungray','India','Ireland','Japan','Kenya','Lithiopia','Oman','USA'];
let cursor=0;

input.addEventListener('keydown',function(el){
    if(el.keyCode==13)
        el.preventDefault();
});

input.addEventListener('focus', function(el){
    ul.classList.remove('hide');
});

input.addEventListener('keyup',function(el){
    el.preventDefault();
    addToList(input.value);

    switch(el.keyCode){
        case 13:
            input.value=document.getElementById('highlighted').innerText;
            ul.innerHTML="";
            cursor=0;
            break;
        case 38:
            if(cursor>0)
                cursor--;
            addCursor(cursor);
            break;
        case 40:
            if(cursor<ul.children.length-1)
                cursor++;
            addCursor(cursor);
            break;
    }
    
    if(input.value==="")
        ul.innerHTML="";
    
    input.addEventListener('blur', function(el){
        ul.classList.add('hide');
    });
});

function addToList(val){
    let listItems="";
    for(let i=0;i<country.length;i++){
        if(country[i].startsWith(val))
            listItems+="<li>"+country[i]+"</li>";
    }
    ul.innerHTML=listItems;
    addCursor(cursor);
}

function addCursor(cursor){
    for(let i=0;i<ul.children.length;i++)
        ul.children[i].removeAttribute("id");
    ul.children[cursor].id="highlighted";
}

ul.addEventListener('mousemove', function(el){
    console.log(el.target);
    el.target.addEventListener('click', function(el1){
        console.log("do something");
    })
});
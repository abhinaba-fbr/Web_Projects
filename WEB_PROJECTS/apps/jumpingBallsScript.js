let boxes=document.querySelector('.boxes');
colors=["rgb(77, 70, 54)","rgb(43, 153, 146)","rgb(40, 33, 138)","rgb(43, 186, 24)","rgb(252, 71, 86)"];

boxes.addEventListener('click', function(el){
    let widthOfBox=window.innerWidth/boxes.children.length;
    let x=el.clientX;
    let color="";
    for(let i=0;i<boxes.children.length;i++){
        if(boxes.children[i]==el.target)
            color=colors[i];
    }
    let ball=document.createElement('div');
    ball.setAttribute('class','ball');
    ball.style.position="absolute";
    ball.style.top="50%";
    //ball.style.left=Math.floor(x/widthOfBox)*widthOfBox+widthOfBox/2.3+"px";
    ball.style.left=(el.clientX-15)+"px";
    ball.style.background=color;
    document.querySelector('.balls').appendChild(ball);
    //console.log(Math.floor(x/widthOfBox)+widthOfBox/2+"px", x);
    ball.style.animation="jump 0.8s ease-in-out";
    ball.addEventListener('animationend', function(el){
        document.querySelector('.balls').removeChild(ball);
    });
});

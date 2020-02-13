let title=document.querySelector(".header-container h2");

title.addEventListener('mouseenter', function(el){
    let viewLabel=document.querySelector("#viewLabel1");
    viewLabel.style.display="block";
    viewLabel.style.left=-((window.innerWidth/2)-(el.clientX))+"px";
});

title.addEventListener('mouseout', function(el){
    let viewLabel=document.querySelector("#viewLabel1");
    viewLabel.style.display="none";
});

let profile=document.querySelector(".log-container img");

profile.addEventListener("mouseenter", function(el){
    let viewLabel=document.querySelector("#viewLabel2");
    viewLabel.style.display="block";
});

profile.addEventListener("mouseout", function(el){
    let viewLabel=document.querySelector("#viewLabel2");
    viewLabel.style.display="none";
})

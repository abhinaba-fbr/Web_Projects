window.PopStateEvent=function(){
    console.log("popstate");
    this.location.href="includes/logout.handler.php";
}

console.log(window.innerHeight);
console.log(window.innerWidth);

let xhr=new XMLHttpRequest();
xhr.open("get","includes/clearCache.php",true);
xhr.onload=function(){
    if(xhr.status==200){
        console.log(xhr.responseText);
    }
}
xhr.send();


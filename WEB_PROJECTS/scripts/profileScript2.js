let choose=document.querySelector("input[type='file']");
let upload=document.querySelector("input[name='upload']");
let cross=document.querySelector(".dp-container i");
let img=document.querySelector("#image");
console.log(choose);
console.log(upload);
console.log(img);

choose.addEventListener('change', function(el){
    let file=choose.files.name;
    if(file!=""){
        choose.style.display="none";
        upload.classList.remove('hide');
        cross.classList.remove('hide');
        //img.setAttribute("src",file);
        let output="",dummyImage="path/image.png";
        let xhr=new XMLHttpRequest();
        xhr.open("post","includes/ajaxAdd.php",true);
        let fd=new FormData();
        fd.append('file',choose.files[0]);
        //need not set Content-type // Automatically set as multipart-form-data
        xhr.onload=function(){
            if(xhr.status==200){
                output=xhr.responseText;
                console.log(output);
                if(output=='uploading error' || output=='Not Set')
                    img.setAttribute("alt",output);
                img.setAttribute("src",output);
            }
        }
        xhr.onerror=function(){
            img.setAttribute("alt",xhr.responseText);
            img.setAttribute("src",dummyImage);
        }
        xhr.send(fd);
    }
});

cross.addEventListener('click',function(el){
    let file=choose.files.name;
    if(file!=""){
        choose.value="";
        choose.style.display="block";
        upload.classList.add('hide');
        cross.classList.add('hide');
        img.setAttribute("src","uploads/default.jpg");
    }

})




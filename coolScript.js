let svgPath=document.querySelectorAll('.container path');
console.log(svgPath.length);
for(let i=0;i<svgPath.length;i++)
    console.log(svgPath[i].getTotalLength());
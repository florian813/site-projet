let plus=document.getElementById("plus");
let moins=document.getElementById("moins");

let imageAgrandie=document.getElementById('imageAgrandie');
let image1=document.getElementById('image1');
let image2=document.getElementById('image2');
let image3=document.getElementById('image3');
let image4=document.getElementById('image4');

let tableau=new Array();

//push dans le talbeau les sources des images
tableau.push(image1);
tableau.push(image2);
tableau.push(image3);
tableau.push(image4);


moins.addEventListener('click',function(){

    var v=parseInt(document.getElementById("quantité").innerText);
    v=v-1;
    if(v<=1){v=1};
    if(v<5){
        document.getElementById("divMax").style.visibility="hidden";
    };
    document.getElementById("quantité").innerText=v;
});

plus.addEventListener('click',function(){

    var v=parseInt(document.getElementById('quantité').innerText);
    v=v+1;
    if(v>=5) {
        v = 5;

    };
    if(v==5){
        document.getElementById("divMax").style.visibility = "visible";
    }

    document.getElementById('quantité').innerText=v;

});

//image1.addEventListener('click', function(){
//  tableau.forEach(element=> console.log(element));

//});

tableau.forEach(element=> {
    element.addEventListener('click',function(){
        imageAgrandie.src=element.src;
    });
});
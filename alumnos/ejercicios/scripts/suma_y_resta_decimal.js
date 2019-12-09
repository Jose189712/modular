var divuno = null;
var divdos= null;
var divtres = null;
var divcuatro = null;
var contador = 0;

function allowDrop(ev) {
    ev.preventDefault();
    }

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
    }

function drop1(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
              if(data == "drag1"){
                divuno = true;
                contador=contador+1;
              }else{
                divuno = false;
              }
}
function drop2(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
              if(data == "drag2"){
                divdos = true;
                contador=contador+1;
              }else{
                divdos = false;
              }
}
function drop3(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
              if(data == "drag3" || data == "drag4"){
                divtres = true;
                contador=contador+1;
              }else{
                divtres = false;
              }
}
function drop4(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
              if(data == "drag4"  || data == "drag3"){
                divcuatro = true;
                contador=contador+1;
              }else{
                divcuatro = false;
              }
}
function revisar(){
    if(divuno==true){
        document.getElementById('div1').style.borderColor='green';
        document.getElementById('div1').style.backgroundColor='#8ac76d';
    }else if(divuno==false){
        document.getElementById('div1').style.borderColor='red';
        document.getElementById('div1').style.backgroundColor='#e07474';
    }

    if(divdos==true){
        document.getElementById('div2').style.borderColor='green';
        document.getElementById('div2').style.backgroundColor='#8ac76d';
    }else if(divdos==false){
        document.getElementById('div2').style.borderColor='red';
        document.getElementById('div2').style.backgroundColor='#e07474';
    }

    if(divtres==true){
        document.getElementById('div3').style.borderColor='green';
        document.getElementById('div3').style.backgroundColor='#8ac76d';
    }else if(divtres==false){
        document.getElementById('div3').style.borderColor='red';
        document.getElementById('div3').style.backgroundColor='#e07474';
    }

    if(divcuatro==true){
        document.getElementById('div4').style.borderColor='green';
        document.getElementById('div4').style.backgroundColor='#8ac76d';
    }else if(divcuatro==false){
        document.getElementById('div4').style.borderColor='red';
        document.getElementById('div4').style.backgroundColor='#e07474';
    }
    alert('puntuacion:'+contador);
}



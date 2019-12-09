
function revisar(){
  var uno = document.getElementById('in1').value;
  var dos = document.getElementById('in2').value;
  var tres = document.getElementById('in3').value;
  var cuatro = document.getElementById('in4').value;

  var cinco = document.getElementById('in5').value;
  var seis = document.getElementById('in6').value;
  var siete = document.getElementById('in7').value;
  var ocho = document.getElementById('in8').value;

  var contador = 0;
  // Prismas
    if(uno==24){
        contador=contador+1;
        document.getElementById('div1').style.borderColor='green';
        document.getElementById('div1').style.backgroundColor='#8ac76d';
    }else{
        document.getElementById('div1').style.borderColor='red';
        document.getElementById('div1').style.backgroundColor='#e07474';
    }

    if(dos==18){
        contador=contador+1;
        document.getElementById('div2').style.borderColor='green';
        document.getElementById('div2').style.backgroundColor='#8ac76d';
    }else{
        document.getElementById('div2').style.borderColor='red';
        document.getElementById('div2').style.backgroundColor='#e07474';
    }

    if(tres==6){
        contador=contador+1;
        document.getElementById('div3').style.borderColor='green';
        document.getElementById('div3').style.backgroundColor='#8ac76d';
    }else{
        document.getElementById('div3').style.borderColor='red';
        document.getElementById('div3').style.backgroundColor='#e07474';
    }

    if(cuatro==8){
        contador=contador+1;
        document.getElementById('div4').style.borderColor='green';
        document.getElementById('div4').style.backgroundColor='#8ac76d';
    }else{
        document.getElementById('div4').style.borderColor='red';
        document.getElementById('div4').style.backgroundColor='#e07474';
    }

    if(cinco==27){
        contador=contador+1;
        document.getElementById('div5').style.borderColor='green';
        document.getElementById('div5').style.backgroundColor='#8ac76d';
    }else{
        document.getElementById('div5').style.borderColor='red';
        document.getElementById('div5').style.backgroundColor='#e07474';
    }

    if(seis==4){
        contador=contador+1;
        document.getElementById('div6').style.borderColor='green';
        document.getElementById('div6').style.backgroundColor='#8ac76d';
    }else{
        document.getElementById('div6').style.borderColor='red';
        document.getElementById('div6').style.backgroundColor='#e07474';
    }

    if(siete==20){
        contador=contador+1;
        document.getElementById('div7').style.borderColor='green';
        document.getElementById('div7').style.backgroundColor='#8ac76d';
    }else{
        document.getElementById('div7').style.borderColor='red';
        document.getElementById('div7').style.backgroundColor='#e07474';
    }

    if(ocho==28){
        contador=contador+1;
        document.getElementById('div8').style.borderColor='green';
        document.getElementById('div8').style.backgroundColor='#8ac76d';
    }else{
        document.getElementById('div8').style.borderColor='red';
        document.getElementById('div8').style.backgroundColor='#e07474';
    }

    alert('puntuacion:'+contador);
}


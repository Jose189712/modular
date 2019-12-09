
function revisar(){
  var prism_triangular = document.getElementById('prism_triangular').value;
  var prism_hexagonal = document.getElementById('prism_hexagonal').value;
  var prism_rectangular = document.getElementById('prism_rectangular').value;
  var prism_pentagonal = document.getElementById('prism_pentagonal').value;

  var pira_cuadrangular = document.getElementById('pira_cuadrangular').value;
  var pira_pentagonal = document.getElementById('pira_pentagonal').value;
  var pira_triangular = document.getElementById('pira_triangular').value;
  var pira_hexagonal = document.getElementById('pira_hexagonal').value;

  var contador = 0;
  // Prismas
    if(prism_triangular=="prisma triangular" || 
       prism_triangular=="Prisma Triangular" ||
       prism_triangular=="PRISMA TRIANGULAR"){
        contador=contador+1;
        document.getElementById('uno').style.borderColor='green';
        document.getElementById('uno').style.backgroundColor='#8ac76d';
    }else{
        document.getElementById('uno').style.borderColor='red';
        document.getElementById('uno').style.backgroundColor='#e07474';
    }

    if(prism_hexagonal=="prisma hexagonal" || 
       prism_hexagonal=="Prisma Hexgonal" ||
       prism_hexagonal=="PRISMA HEXAGONAL"){
        contador=contador+1;
        document.getElementById('dos').style.borderColor='green';
        document.getElementById('dos').style.backgroundColor='#8ac76d';
    }else{
        document.getElementById('dos').style.borderColor='red';
        document.getElementById('dos').style.backgroundColor='#e07474';
    }

    if(prism_rectangular=="prisma rectangular" || 
       prism_rectangular=="Prisma Rectangular" ||
       prism_rectangular=="PRISMA RECTANGULAR"){
        contador=contador+1;
        document.getElementById('tres').style.borderColor='green';
        document.getElementById('tres').style.backgroundColor='#8ac76d';
    }else{
        document.getElementById('tres').style.borderColor='red';
        document.getElementById('tres').style.backgroundColor='#e07474';
    }

    if(prism_pentagonal=="prisma pentagonal" || 
       prism_pentagonal=="Prisma Pentagonal" ||
       prism_pentagonal=="PRISMA PENTAGONAL"){
        contador=contador+1;
        document.getElementById('cuatro').style.borderColor='green';
        document.getElementById('cuatro').style.backgroundColor='#8ac76d';
    }else{
        document.getElementById('cuatro').style.borderColor='red';
        document.getElementById('cuatro').style.backgroundColor='#e07474';
    }
    // Piramides
    if(pira_cuadrangular=="piramide cuadrangular" || 
       pira_cuadrangular=="Piramide Cuadrangular" ||
       pira_cuadrangular=="PIRAMIDE CUADRANGULAR"){
        contador=contador+1;
        document.getElementById('cinco').style.borderColor='green';
        document.getElementById('cinco').style.backgroundColor='#8ac76d';
    }else{
        document.getElementById('cinco').style.borderColor='red';
        document.getElementById('cinco').style.backgroundColor='#e07474';
    }

    if(pira_pentagonal=="piramide pentagonal" || 
       pira_pentagonal=="Piramide Pentagonal" ||
       pira_pentagonal=="PIRAMIDE PENTAGONAL"){
        contador=contador+1;
        document.getElementById('seis').style.borderColor='green';
        document.getElementById('seis').style.backgroundColor='#8ac76d';
    }else{
        document.getElementById('seis').style.borderColor='red';
        document.getElementById('seis').style.backgroundColor='#e07474';
    }

    if(pira_triangular=="piramide triangular" || 
       pira_triangular=="Piramide Triangular" ||
       pira_triangular=="PIRAMIDE TRIANGULAR"){
        contador=contador+1;
        document.getElementById('siete').style.borderColor='green';
        document.getElementById('siete').style.backgroundColor='#8ac76d';
    }else{
        document.getElementById('siete').style.borderColor='red';
        document.getElementById('siete').style.backgroundColor='#e07474';
    }

    if(pira_hexagonal=="piramide hexagonal" || 
       pira_hexagonal=="Piramide Hexagonal" ||
       pira_hexagonal=="PIRAMIDE HEXAGONAL"){
        contador=contador+1;
        document.getElementById('ocho').style.borderColor='green';
        document.getElementById('ocho').style.backgroundColor='#8ac76d';
    }else{
        document.getElementById('ocho').style.borderColor='red';
        document.getElementById('ocho').style.backgroundColor='#e07474';
    }

    alert('puntuacion:'+contador);
}


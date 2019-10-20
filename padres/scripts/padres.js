$(document).ready(function(){
  $('.sidenav').sidenav();
  $(".dropdown-trigger").dropdown();

  $(function ()
  {
      var $counter = $('#counter'),
          startVal = $counter.text(),
          currentVal,
          endVal = 15,
          fontSize = $counter.css('font-size');
      
  
          currentVal = startVal;
          var i = setInterval(function ()
          {
              if (currentVal === endVal)
              {
                  clearInterval(i);
                  $counter.animate({fontSize: fontSize});
              }
              else
              {
                  $counter.text(currentVal);
                currentVal++;
              }
          }, 100);
  
  });

  $(function ()
  {
      var $counter = $('#counter2'),
          startVal = $counter.text(),
          currentVal,
          endVal = 10,
          fontSize = $counter.css('font-size');
      
  
          currentVal = startVal;
          var i = setInterval(function ()
          {
              if (currentVal === endVal)
              {
                  clearInterval(i);
                  $counter.animate({fontSize: fontSize});
              }
              else
              {
                  $counter.text(currentVal);
                currentVal++;
              }
          }, 100);
  
  });

  $(function ()
  {
      var $counter = $('#counter3'),
          startVal = $counter.text(),
          currentVal,
          endVal = 18,
          fontSize = $counter.css('font-size');
      
  
          currentVal = startVal;
          var i = setInterval(function ()
          {
              if (currentVal === endVal)
              {
                  clearInterval(i);
                  $counter.animate({fontSize: fontSize});
              }
              else
              {
                  $counter.text(currentVal);
                currentVal++;
              }
          }, 100);
  
  });

});


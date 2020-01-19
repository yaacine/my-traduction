  // Or with jQuery

  $(document).ready(function(){
    alert('flutter');

    $('.sidenav').sidenav();
  });



  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.autocomplete');
    var instances = M.Autocomplete.init(elems, options);
  });



  $(document).ready(function(){
    alert('flutter');
    $('select').formSelect();
  });
 


  $(document).ready(function(){
    $('.carousel').carousel(); 
  });

  
  setInterval(function() {
    $('.carousel').carousel('next');
  }, 2000); 
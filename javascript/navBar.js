  // Or with jQuery

  $(document).ready(function(){
    $('.sidenav').sidenav();
  });



  // document.addEventListener('DOMContentLoaded', function() {
  //   var elems = document.querySelectorAll('.autocomplete');
  //   var instances = M.Autocomplete.init(elems, options);
  // });

  // $(document).ready(function(){
  //   $('input.autocomplete').autocomplete({
  //     data: {
  //       "Apple": null,
  //       "Microsoft": null,
  //       "Google": 'https://placehold.it/250x250'
  //     },
  //   });
  // });
       


  // document.addEventListener('DOMContentLoaded', function() {
  //   var elems = document.querySelectorAll('select');
  //   console.log("here guys")
  //   var instances = M.FormSelect.init(elems, options);
  // });


  $(document).ready(function(){
    $('select').formSelect();
  });


  $(document).ready(function(){
    $('.carousel').carousel(); 
  });

  
  setInterval(function() {
    $('.carousel').carousel('next');
  }, 2000); 



  $('.dropdown-trigger').dropdown();
    
  $(document).ready(function(){
    $('.tooltipped').tooltip();
  });


  $(document).ready(function(){
    $('.tabs').tabs();
  });

  $(document).ready(function(){
    $('.collapsible').collapsible();
  });``


  $(document).ready(function(){
    $('.modal').modal();
  });


  // passing the id to delete to the modal
  function deleteDemandeDevis( id ){
    $('#hiddenDeleteDemandeDevis').val(id);



  }  // passing the id to delete to the modal
  function deleteDemandeTraduction( id ){
    $('#hiddenDeleteDemandeTraduction').val(id);
  }


  
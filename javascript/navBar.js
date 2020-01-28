// Or with jQuery

$(document).ready(function() {
  $(".sidenav").sidenav();
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

$(document).ready(function() {
  $("select").formSelect();
});

$(document).ready(function() {
  $(".carousel").carousel();
});

setInterval(function() {
  $(".carousel").carousel("next");
}, 2000);

$(".dropdown-trigger").dropdown();

$(document).ready(function() {
  $(".tooltipped").tooltip();
});

$(document).ready(function() {
  $(".tabs").tabs();
});

$(document).ready(function() {
  $(".collapsible").collapsible();
});
``;

$(document).ready(function() {
  $(".modal").modal();
});

// passing the id to cancel to the modal
function deleteDemandeDevis(id) {
  $("#hiddenDeleteDemandeDevis").val(id);
} 


// passing the id to response demande devis modal modal
function respondeDemandeDevis(id) {
  $("#hiddenResponseDemandeDevis").val(id);
} 

// passing the id to delete to the modal
function deleteDemandeTraduction(id) {
  $("#hiddenDeleteDemandeTraduction").val(id);
}

// passing the id to payement to the modal
function payerDemandeTraduction(id) {
  $("#hiddenResponseDemandeTraduction").val(id);
}


// passing the id to payement to the of notation
function noterDemandeTraduction(id, idTrad) {
  $("#ResponseDemandeTraductionId").val(id);
  $("#hiddenNotertraducteurID").val(idTrad);
}




function respondeDemandeTraduction(id) {
  $("#ResponseDemandeTraductionId").val(id);
}


function resultDemandeTraduction(id) {
  $("#ResultDemandeTraductionId").val(id);
}


$(document).ready(function() {
  $("#montantDevisTraduction").hide(100);
});

$(document).ready(function() {
  $("#demandeDevisReponse").change(function() {
    var val = $(this).val();
    if (val == "accepter") {
      $("#montantDevisTraduction").show(500);
    } else {
      $("#montantDevisTraduction").hide(500);
    }
  });
});



$(document).ready(function() {
  $("#montantTraduction").hide(100);
});


$(document).ready(function() {
  $("#demandeTraductionReponse").change(function() {
    var val = $(this).val();
    if (val == "accepter") {
      $("#montantTraduction").show(500);
    } else {
      $("#montantTraduction").hide(500);
    }
  });
});


$(document).ready(function(){
  $('.tap-target').tapTarget();
});

$('.tap-target').tapTarget('open');
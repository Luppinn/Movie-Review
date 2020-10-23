function fdeletar(variavel) {
    $.ajax({
      type: "POST",
      url: "deletecmnt.php",
      data: { comentario: variavel },
      success: function(html) {
        reload();
      },
      error: function(html) {
        alert('erro 500');
      }
    });
  }

  function reload(){
    window.location.href = "http://localhost/php/comentar.php?id=1";
  }
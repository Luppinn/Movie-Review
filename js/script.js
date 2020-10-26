function fdeletar(variavel,id) {
    $.ajax({
      type: "POST",
      url: "/controller/deletecmnt.php",
      data: { comentario: variavel },
      success: function(html) {
        reload(id);
      },
      error: function(html) {
        alert('erro 500');
      }
    });
  }

  function reload(id){
    window.location.href = "http://localhost/view/comentar.php?id="+id;
  }

  function validation(){
    alert('Nota deve ser um numero de 1 a 5!');
  }
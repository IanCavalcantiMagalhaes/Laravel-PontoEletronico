function AutenticarLogin(){
    
    $(document).ready(function(){
        $('#CorpoDaTable').empty();
        $.ajax({
          type: "GET",
          data: {CampoPesquisa: $("#CampoPesquisa").val(),
                 PesquisarPor:$('#PesquisarPor').val()},
          url:"/AutenticarLogin",success: function(data){
           if(data=null){
             alert("Dados incorretos");
           }else{
            window.open(URL)
           }
      
       
       
        }});
});
}
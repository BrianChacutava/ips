
console.log();
function Adicionar(){
    jQuery("#tblCadastro tbody").append(
        "<tr>"+
        "<td><input type='text'/></td>"+
        "<td><input type='text'/></td>"+
        "<td><input type='text'/></td>"+
        "<td><img src='images/disk.png' class='btnSalvar'><img src='images/delete.png' class='btnExcluir'/></td>"+
        "</tr>");
     
        jQuery(".btnSalvar").bind("click", Salvar);      
        jQuery(".btnExcluir").bind("click", Excluir);
};


function Salvar(){
    var par = jQuery(this).parent().parent(); //tr
    var tdNome = par.children("td:nth-child(1)");
    var tdTelefone = par.children("td:nth-child(2)");
    var tdEmail = par.children("td:nth-child(3)");
    var tdBotoes = par.children("td:nth-child(4)");
 
    tdNome.html(tdNome.children("input[type=text]").val());
    tdTelefone.html(tdTelefone.children("input[type=text]").val());
    tdEmail.html(tdEmail.children("input[type=text]").val());
    tdBotoes.html("<img src='images/delete.png' class='btnExcluir'/><img src='images/pencil.png' class='btnEditar'/>");
 
    jQuery(".btnEditar").bind("click", Editar);
    jQuery(".btnExcluir").bind("click", Excluir);
};

function Editar(){
    var par = jQuery(this).parent().parent(); //tr
    var tdNome = par.children("td:nth-child(1)");
    var tdTelefone = par.children("td:nth-child(2)");
    var tdEmail = par.children("td:nth-child(3)");
    var tdBotoes = par.children("td:nth-child(4)");
    
    tdNome.html("<input type='text' id='txtNome' value='"+tdNome.html()+"'/>");
    tdTelefone.html("<input type='text' id='txtTelefone' value='"+tdTelefone.html()+"'/>");
    tdEmail.html("<input type='text' id='txtEmail' value='"+tdEmail.html()+"'/>");
    tdBotoes.html("<img src='images/disk.png' class='btnSalvar'/>");
    
    jQuery(".btnSalvar").bind("click", Salvar);
    jQuery(".btnEditar").bind("click", Editar);
    jQuery(".btnExcluir").bind("click", Excluir);
   };
   
   
   function Excluir(){
    var par = jQuery(this).parent().parent(); //tr
    par.remove();
    };

    jQuery(function(){
        //Código das funções Adicionar, Salvar, Editar e Excluir
        jQuery(".btnEditar").bind("click", Editar);
        jQuery(".btnExcluir").bind("click", Excluir);
        jQuery("#btnAdicionar").bind("click", Adicionar);            
     
    });
        
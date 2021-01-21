function abrirProduto(elemento) {
    linktag = elemento.find('itenlink');
    location.assign(linktag.attr('data'));
}

/* Render properties for users */
function renderAttributes(attr) {
    var template = Handlebars.compile($("#attribute-template").html());
    var context = attr;

    return template(context);
}

function loadSelectPicker(){
    $('.selectpicker').selectpicker();
}


function formatState (state) {
    if (!state.id) {
        return state.text;
    }
    var $state = $(
        '<span><span style="color:#'+state.element.getAttribute('data-cor')+';background-color:#'+state.element.getAttribute('data-cor')+';padding-left:2rem; margin-right:1rem;"></span>' + state.text + '</span>'
    );
    return $state;
}
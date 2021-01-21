Dropzone.autoDiscover = false
let props = {
    maxFiles: $('.dropzone').attr('files'),
    maxFilesize: $('.dropzone').attr('size'),
    paramName: $('.dropzone').attr('param'),
    acceptedFiles: $('.dropzone').attr('filetype'),
    resizeWidth: $('.dropzone').attr('resize') == "" ? null : $('.dropzone').attr('resize'),
}

$(".dropzone").dropzone({
    ...props,
    ...ajaxSettings,
    addRemoveLinks: true,
    dictDefaultMessage: "Arraste o ficheiro para carregar.",
    dictFallbackMessage: "Seu navegador nao suporta este recurso",
    dictFileTooBig: "Ficheiro muito grande.",
    dictMaxFilesExceeded: "Atingiu o limite de ficheiros permitidos",
    dictInvalidFileType: "Ficheiro escolhido não é um formato esperado",
    dictCancelUpload: "Cancelar",
    dictUploadCanceled: "Carregamento cancelado",
    dictRemoveFile: "Remover",
    dictRemoveFileConfirmation: "Deseja realmente remover o ficheiro?",
    removedfile: function (file) {
        var name = file.name;
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    },
    success: function (response, xhr) {
        // location.reload();
    }
});

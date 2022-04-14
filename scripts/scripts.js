$(document).ready(function () {
    $("button#inputCadastrar").attr("disabled", true);
    $("#inputAceite").on("change", function () {
        if ($("#inputAceite").is(':checked')) {
            console.log("checked");
            $("button#inputCadastrar").attr("disabled", false);
        } else {
            console.log("unchecked");
            $("button#inputCadastrar").attr("disabled", true);
        }
    });
    $("#nome_completo").on('blur', function(){
        alert(this.val());
    });
});
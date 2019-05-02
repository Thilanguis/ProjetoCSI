function excluir(id) {
    if (confirm('Deseja realmente excluir este contato?')) {
        location.href = 'excluirCliente.php?id_cliente=' + id;
    }
}

$(document).ready(function () {
    $('.addTel1').hide();
    $('#whatsapp').click(function () {
        $('.addTel1').toggle();
    });
});


function getIdTelaFormDietoterapia() {
    // Declaração de Variáveis
    var nome = document.getElementByName("quantidade").value;
}

function excluirAlimento(id) {
    if (confirm('Deseja realmente excluir este alimento?')) {
        location.href = 'excluirAlimento.php?excluirAlimento=' + id;
    }
}

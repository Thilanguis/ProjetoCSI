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

function excluirAlimento(ID) {
    if (confirm('Deseja realmente excluir este alimento?')) {
        location.href = 'excluirAlimento.php?id_alimento=' + ID;
    }
}

function calcularHorasNAF() {
    var n1 = parseInt(document.getElementById('sono').value, 10);
    var n2 = parseInt(document.getElementById('trabalho').value, 10);
    var n3 = parseInt(document.getElementById('estudo').value, 10);
    var n4 = parseInt(document.getElementById('exerFisico').value, 10);
    var n5 = parseInt(document.getElementById('avontade').value, 10);
    var n6 = parseInt(document.getElementById('ativFisica').value, 10);
    document.getElementById('resultadoConta').innerHTML = n1 + n2 + n3 + n4 + n5 + n6;
}

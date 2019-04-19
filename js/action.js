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

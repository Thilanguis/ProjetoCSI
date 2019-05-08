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
    var n1 = parseFloat(document.getElementById('sono').value, 10);
    var n2 = parseInt(document.getElementById('trabalho').value, 10);
    var n3 = parseFloat(document.getElementById('estudo').value, 10);
    var n4 = parseFloat(document.getElementById('exerFisico').value, 10);
    var n5 = parseFloat(document.getElementById('avontade').value, 10);
    var n6 = parseFloat(document.getElementById('ativFisica').value, 10);
    parseFloat(document.getElementById('resultadoConta').innerHTML = n1 + n2 + n3 + n4 + n5 + n6);
}

function calculoIMC() {
    var altura = parseFloat(document.getElementById('altura').value, 10);

    var pesoAtual = parseFloat(document.getElementById('pesoAtual').value, 10);

    var resultado = pesoAtual / (altura * altura);

    if (resultado < 16.00) {
        document.getElementById('resultadoIMC').innerHTML = "Magreza Grau 3";
    } else if (resultado >= 16.00 && resultado < 17.00) {
        document.getElementById('resultadoIMC').innerHTML = "Magreza Grau 2";
    } else if (resultado >= 17.00 && resultado < 18.50) {
        document.getElementById('resultadoIMC').innerHTML = "Magreza Grau 1";
    } else if (resultado >= 18.50 && resultado < 25.00) {
        document.getElementById('resultadoIMC').innerHTML = "Eutrofia";
    } else if (resultado >= 25.00 && resultado < 30.00) {
        document.getElementById('resultadoIMC').innerHTML = "Pre-Obesidade";
    } else if (resultado >= 30.00 && resultado < 35.00) {
        document.getElementById('resultadoIMC').innerHTML = "Obesidade Grau 1";
    } else if (resultado >= 35.00 && resultado < 40.00) {
        document.getElementById('resultadoIMC').innerHTML = "Obesidade Grau 2";
    } else if (resultado > 40.00) {
        document.getElementById('resultadoIMC').innerHTML = "Obesidade Grau 3";
    }
}

function calculoPercentualGordura() {

    var tricipital = parseFloat(document.getElementById('tricipital').value, 10);
    var subescapular = parseFloat(document.getElementById('subescapular').value, 10);
    var suprailiaca = parseFloat(document.getElementById('suprailiaca').value, 10);
    var abdominal = parseFloat(document.getElementById('abdominal').value, 10);
    var quadriceps = parseFloat(document.getElementById('quadriceps').value, 10);

    var resultado1 = (tricipital + subescapular + suprailiaca + abdominal) * 0.153 + 5.783;

    var resultado2 = (tricipital + subescapular + suprailiaca + abdominal + quadriceps) * 0.8 * 0.153 + 5.783;

    if (quadriceps != 0 || quadriceps != ' ') {
        document.getElementById('resultadoPercentualGordura').innerHTML = resultado2.toFixed(2) +
            " % de gordura";
    } else {
        document.getElementById('resultadoPercentualGordura').innerHTML = resultado1.toFixed(2) +
            " % de gordura";
    }
}

function calculoDiferencaPercentualGordura() {

    var tricipital = parseFloat(document.getElementById('tricipital').value, 10);
    var subescapular = parseFloat(document.getElementById('subescapular').value, 10);
    var suprailiaca = parseFloat(document.getElementById('suprailiaca').value, 10);
    var abdominal = parseFloat(document.getElementById('abdominal').value, 10);
    var quadriceps = parseFloat(document.getElementById('quadriceps').value, 10);

    var resultado1 = (tricipital + subescapular + suprailiaca + abdominal) * 0.153 + 5.783;

    var resultado2 = (tricipital + subescapular + suprailiaca + abdominal + quadriceps) * 0.8 * 0.153 + 5.783;

    if (quadriceps != 0 || quadriceps != ' ') {
        document.getElementById('calculoDiferencaPercentualGordura').innerHTML = 100 - resultado2.toFixed(2) +
            " % livre gordura";
    } else {
        document.getElementById('calculoDiferencaPercentualGordura').innerHTML = 100 - resultado1.toFixed(2) +
            " % livre gordura";
    }
}

function processar() {
    calculoPercentualGordura();
    calculoDiferencaPercentualGordura();
}

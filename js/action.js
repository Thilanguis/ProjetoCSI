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
        var id_cliente = document.getElementById("id_cliente").value;
        location.href = 'excluirAlimento.php?id_alimento=' + ID + '&id_cliente=' + id_cliente;
    }
}

function iniciarDieta(id) {
    if (confirm('Deseja iniciar dieta do paciente?')) {
        location.href = 'form-antropometria.php?id_cliente=' + id;
    }
}

function avisoAvancar() {
    alert("Salve os dados para avançar na consulta!");
}

function avisoNaoPodeAcessar() {
    alert("Não pode ser acessado durante a consulta");
}

function deslogar() {
    var nomePaciente = document.getElementById("nutricionistaLogado").value;
    if (confirm('Deseja deslogar do sistema Nutricionista ' + nomePaciente + ' ?')) {
        location.href = 'logout.php';
    }
}

function calcularHorasNAF() {
    var n1 = parseFloat(document.getElementById('sono').value, 10);
    var n2 = parseFloat(document.getElementById('trabalho').value, 10);
    var n3 = parseFloat(document.getElementById('estudo').value, 10);
    var n4 = parseFloat(document.getElementById('exerFisico').value, 10);
    var n5 = parseFloat(document.getElementById('avontade').value, 10);
    var n6 = parseFloat(document.getElementById('ativFisica').value, 10);

    parseFloat(document.getElementById('resultadoConta').innerHTML = n1 + n2 + n3 + n4 + n5 + n6);
}

function calcularNAF() {
    var n1 = parseFloat(document.getElementById('sono').value, 10);
    var n2 = parseFloat(document.getElementById('trabalho').value, 10);
    var n3 = parseFloat(document.getElementById('estudo').value, 10);
    var n4 = parseFloat(document.getElementById('exerFisico').value, 10);
    var n5 = parseFloat(document.getElementById('avontade').value, 10);
    var n6 = parseFloat(document.getElementById('ativFisica').value, 10);
    var n7 = parseFloat(document.getElementById('NAF_sono').value, 10);
    var n8 = parseFloat(document.getElementById('NAF_trabalho').value, 10);
    var n9 = parseFloat(document.getElementById('NAF_estudo').value, 10);
    var n10 = parseFloat(document.getElementById('NAF_exerFisico').value, 10);
    var n11 = parseFloat(document.getElementById('NAF_avontade').value, 10);
    var n12 = parseFloat(document.getElementById('NAF_ativFisica').value, 10);

    document.getElementById('resultadoNAF').innerHTML = (((n1 * n7) + (n2 * n8) + (n3 * n9) + (n4 * n10) + (n5 * n11) + (n6 * n12)) / 24).toFixed(2);
}

function calcularNafTotal() {
    calcularHorasNAF();
    calcularNAF();
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

function calculoPercentualGorduraEmKg() {
    var tricipital = parseFloat(document.getElementById('tricipital').value, 10);
    var subescapular = parseFloat(document.getElementById('subescapular').value, 10);
    var suprailiaca = parseFloat(document.getElementById('suprailiaca').value, 10);
    var abdominal = parseFloat(document.getElementById('abdominal').value, 10);
    var quadriceps = parseFloat(document.getElementById('quadriceps').value, 10);
    var pesoAtual = parseFloat(document.getElementById('pesoAtual').value, 10);

    var resultado1 = (tricipital + subescapular + suprailiaca + abdominal) * 0.153 + 5.783;

    var resultado2 = (tricipital + subescapular + suprailiaca + abdominal + quadriceps) * 0.8 * 0.153 + 5.783;

    if (quadriceps != 0 || quadriceps != ' ') {
        document.getElementById('calculoPercentualGorduraEmKg').innerHTML = ((pesoAtual * resultado2) / 100).toFixed(2) +
            " Kg peso de gordura";
    } else {
        document.getElementById('calculoPercentualGorduraEmKg').innerHTML = ((pesoAtual * resultado1) / 100).toFixed(2) +
            " Kg peso de gordura";
    }
}

function calculoPercentualLivreGorduraEmKg() {
    var tricipital = parseFloat(document.getElementById('tricipital').value, 10);
    var subescapular = parseFloat(document.getElementById('subescapular').value, 10);
    var suprailiaca = parseFloat(document.getElementById('suprailiaca').value, 10);
    var abdominal = parseFloat(document.getElementById('abdominal').value, 10);
    var quadriceps = parseFloat(document.getElementById('quadriceps').value, 10);
    var pesoAtual = parseFloat(document.getElementById('pesoAtual').value, 10);

    var resultado1 = (tricipital + subescapular + suprailiaca + abdominal) * 0.153 + 5.783;

    var resultado2 = (tricipital + subescapular + suprailiaca + abdominal + quadriceps) * 0.8 * 0.153 + 5.783;

    if (quadriceps != 0 || quadriceps != ' ') {
        document.getElementById('calculoPercentualLivreGorduraEmKg').innerHTML = (pesoAtual - resultado2).toFixed(2) +
            " Kg peso livre de gordura";
    } else {
        document.getElementById('calculoPercentualLivreGorduraEmKg').innerHTML = (pesoAtual - resultado1).toFixed(2) +
            " Kg peso livre de gordura";
    }
}

function processar() {
    calculoPercentualGordura();
    calculoDiferencaPercentualGordura();
    calculoPercentualGorduraEmKg();
    calculoPercentualLivreGorduraEmKg();
}

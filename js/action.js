function excluir(id) {
    if (confirm('Deseja realmente excluir este contato?')) {
        location.href = 'excluirCliente.php?id_cliente=' + id;
    }
}

function excluirConsulta(id) {
    if (confirm('Deseja realmente excluir esta consulta?')) {
        location.href = 'excluirConsulta.php?id_cliente=' + id;
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
    if (confirm('Deseja iniciar a dieta do paciente com livro vermelho selecionado?')) {
        location.href = 'form-antropometria.php?id_cliente=' + id;
    }
}

function consultarDieta(id) {
    if (confirm('Deseja consultar a dieta do paciente com nome selecionado em vermelho?')) {
        location.href = 'form-Dietoterapia.php?id_cliente=' + id;
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

function atualizarAntropometria(id_antropometria) {
    var paciente = document.getElementById("paciente").value;
    if (confirm('Deseja atualizar os dados Antropométricos do(a) paciente ' + paciente + ' ? ')) {
        var id_cliente = document.getElementById("id_cliente").value;
        var antropometria = document.getElementById("id_cliente").value;
        var altura = document.getElementById("altura").value;
        var pesoAtual = document.getElementById("pesoAtual").value;
        var bracoEsq = document.getElementById("bracoEsq").value;
        var bracoDir = document.getElementById("bracoDir").value;
        var cintura = document.getElementById("cintura").value;
        var quadril = document.getElementById("quadril").value;
        var torax = document.getElementById("torax").value;
        var abdominal = document.getElementById("abdominal").value;
        var coxaEsq = document.getElementById("coxaEsq").value;
        var coxaDir = document.getElementById("coxaDir").value;
        var panturrilhaEsq = document.getElementById("panturrilhaEsq").value;
        var panturrilhaDir = document.getElementById("panturrilhaDir").value;
        var antebracoEsq = document.getElementById("antebracoEsq").value;
        var antebracoDir = document.getElementById("antebracoDir").value;
        var tricipital = document.getElementById("tricipital").value;
        var subescapular = document.getElementById("subescapular").value;
        var suprailiaca = document.getElementById("suprailiaca").value;
        var dcAbdominal = document.getElementById("dcAbdominal").value;
        var quadriceps = document.getElementById("quadriceps").value;
        location.href = 'atualizarAntropometria.php?id_antropometria=' + id_antropometria + '&id_cliente=' + id_cliente + '&altura=' + altura + '&pesoAtual=' + pesoAtual + '&bracoEsq=' + bracoEsq + '&bracoDir=' + bracoDir + '&cintura=' + cintura + '&quadril=' + quadril + '&torax=' + torax + '&abdominal=' + abdominal + '&coxaEsq=' + coxaEsq + '&coxaDir=' + coxaDir + '&panturrilhaEsq=' + panturrilhaEsq + '&panturrilhaDir=' + panturrilhaDir + '&antebracoEsq=' + antebracoEsq + '&antebracoDir=' + antebracoDir + '&tricipital=' + tricipital + '&subescapular=' + subescapular + '&suprailiaca=' + suprailiaca + '&dcAbdominal=' + dcAbdominal + '&quadriceps=' + quadriceps;
    }
}

function atualizarBioquimica(id_bioquimica) {
    var paciente = document.getElementById("paciente").value;
    if (confirm('Deseja atualizar os dados Bioquímicos do(a) paciente ' + paciente + ' ? ')) {
        var id_cliente = document.getElementById("id_cliente").value;
        var bioquimica = document.getElementById("exampleFormControlTextarea1").value;
        location.href = 'atualizarBioquimica.php?id_bioquimica=' + id_bioquimica + '&id_cliente=' + id_cliente + '&LISTA_HEMOGRAMA_COMPLETO=' + bioquimica;
    }
}

function atualizarCNutricional(ID_A_CLINICANUTRICIONAL) {
    var paciente = document.getElementById("paciente").value;
    if (confirm('Deseja atualizar os dados Clinicos Nutricionais do(a) paciente ' + paciente + ' ? ')) {
        var id_cliente = document.getElementById("id_cliente").value;
        var bioquirecomendacoesOrientacoes = document.getElementById("recomendacoesOrientacoes").value;
        var Hsocial = document.getElementById("Hsocial").value;
        var medicamentos = document.getElementById("medicamentos").value;
        var sinalClinico = document.getElementById("sinalClinico").value;
        var Halimentar = document.getElementById("Halimentar").value;
        var Hfamiliar = document.getElementById("Hfamiliar").value;
        var HpatologiaPregressa = document.getElementById("HpatologiaPregressa").value;
        location.href = 'atualizarClinicaNutricional.php?ID_A_CLINICANUTRICIONAL=' + ID_A_CLINICANUTRICIONAL + '&id_cliente=' + id_cliente + '&recomendacoesOrientacoes=' + bioquirecomendacoesOrientacoes + '&Hsocial=' + Hsocial + '&medicamentos=' + medicamentos + '&sinalClinico=' + sinalClinico + '&Halimentar=' + Halimentar + '&Hfamiliar=' + Hfamiliar + '&HpatologiaPregressa=' + HpatologiaPregressa;
    }
}

function atualizarVetFao(id_vet_fao) {
    var paciente = document.getElementById("paciente").value;
    if (confirm('Deseja atualizar os dados NAF do(a) paciente ' + paciente + ' ? ')) {
        var id_cliente = document.getElementById("id_cliente").value;
        var sono = document.getElementById("sono").value;
        var NAF_sono = document.getElementById("NAF_sono").value;
        var trabalho = document.getElementById("trabalho").value;
        var NAF_trabalho = document.getElementById("NAF_trabalho").value;
        var estudo = document.getElementById("estudo").value;
        var NAF_estudo = document.getElementById("NAF_estudo").value;
        var exerFisico = document.getElementById("exerFisico").value;
        var NAF_exerFisico = document.getElementById("NAF_exerFisico").value;
        var avontade = document.getElementById("avontade").value;
        var NAF_avontade = document.getElementById("NAF_avontade").value;
        var ativFisica = document.getElementById("ativFisica").value;
        var NAF_ativFisica = document.getElementById("NAF_ativFisica").value;
        location.href = 'atualizarVetFao.php?id_vet_fao=' + id_vet_fao + '&id_cliente=' + id_cliente + '&id_vet_fao=' + id_vet_fao + '&sono=' + sono + '&NAF_sono=' + NAF_sono + '&trabalho=' + trabalho + '&NAF_trabalho=' + NAF_trabalho + '&estudo=' + estudo + '&NAF_estudo=' + NAF_estudo + '&exerFisico=' + exerFisico + '&NAF_exerFisico=' + NAF_exerFisico + '&avontade=' + avontade + '&NAF_avontade=' + NAF_avontade + '&ativFisica=' + ativFisica + '&NAF_ativFisica=' + NAF_ativFisica;
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

function calculoVet() {
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

    var naf = (((n1 * n7) + (n2 * n8) + (n3 * n9) + (n4 * n10) + (n5 * n11) + (n6 * n12)) / 24).toFixed(2);

    var tmb = (document.getElementById('tmbPaciente').value).replace(",", "");

    document.getElementById('resultadoVet').innerHTML = (tmb * naf).toFixed(2) + " Kcal";
}

function calcularNafTotal() {
    calcularHorasNAF();
    calcularNAF();
    calculoVet();
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

//verifica capslock ligado
function capLock() {
    document.getElementById('exampleDropdownFormPassword1').onkeyup = function (e) {

        var key = e.charCode || e.keyCode;

        //enter, caps lock e backspace não interessam
        if (key == 13 || key == 8 || key == 46 || key == 20) {
            return false;
        }

        //pega o último caracter digitado
        var tamanho = this.value.length
        var ultimo_caracter = this.value.substring(tamanho - 1);

        //Verifica se é maiúsculo, e se não é shift
        if (ultimo_caracter.toUpperCase() == ultimo_caracter &&
            ultimo_caracter.toLowerCase() != ultimo_caracter &&
            !e.shiftKey) {
            document.getElementById('avisoCapslock').style.visibility = 'visible';
        } else {
            document.getElementById('avisoCapslock').style.visibility = 'hidden';
        }
    };
}

function verificaInput() {
    const inputCpfElement = document.getElementById('exampleDropdownFormEmail1');

    inputCpfElement.addEventListener('keyup', function (ev) {
        const input = ev.target;
        const value = ev.target.value;

        if (value.length == "") {
            input.classList.add('--has-error');
            document.getElementById('avisoFaltaLogin').style.visibility = 'visible';

        } else {
            input.classList.remove('--has-error');
            document.getElementById('avisoFaltaLogin').style.visibility = 'hidden';
        }
    });
}

function verificaInput1() {
    const inputCpfElement = document.getElementById('exampleDropdownFormPassword1');

    inputCpfElement.addEventListener('keyup', function (ev) {
        const input = ev.target;
        const value = ev.target.value;

        if (value.length == "") {
            input.classList.add('--has-error');
            document.getElementById('avisoFaltaSenha').style.visibility = 'visible';

        } else {
            input.classList.remove('--has-error');
            document.getElementById('avisoFaltaSenha').style.visibility = 'hidden';
        }
    });
}

function verificadorSenha() {
    capLock();
    verificaInput1();
}

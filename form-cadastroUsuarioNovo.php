<script src="js/ajaxCEP.js"></script>

<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="margin-left: 220px;">
                    <h3><b>Realize seu cadastro! &nbsp; <i class="fas fa-user-plus" style=" font-size: 30px; color: #4c89e3"></i></b></h3>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

            <div class="modal-body">

                <form action="cadastroCliente.php" method="post">


                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label style="margin-left: 185px;" for="nome">Nome Completo</label> &nbsp; <i class="fas fa-signature" style="font-size: 25px; color: #314bd8;"></i>
                            <input style="text-align: center;" type="text" class="form-control" id="nome" name="nome">
                        </div>
                        <div class="form-group col-md-4">
                            <label style="margin-left: 60px;" for="telefone">Telefone Celular</label> &nbsp; <i class="fas fa-mobile-alt" style="font-size: 25px; color: #d11818"></i>
                            <input style="text-align: center;" type="tel" class="form-control" id="telefone" name="telefone" maxlength="11" pattern="([0-9]{11})" title="Digitar telefone com DDD e não usar caracteres especiais">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label style="margin-left: 90px;" for="cep">CEP</label> &nbsp; <i class="fas fa-map" style="font-size: 26px; color: #d1ca18"></i>
                            <input type="text" class="form-control" id="cep" name="cep" style="text-align: center" value="" size="10" maxlength="9">
                        </div>
                        <div class="form-group col-md-8">
                            <label style="margin-left: 185px;" for="endereco">Endereço</label> &nbsp; <i class="fas fa-map-marked-alt" style="font-size: 25px; color: #27b75f"></i>
                            <input style="text-align: center;" type="text" class="form-control" id="rua" name="rua" readonly>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label style="margin-left: 85px;" for="bairro">Bairro</label> &nbsp; <i class="fas  fa-home" style="font-size: 25px; color: #d11818;"></i>
                            <input style="text-align: center;" type="text" class="form-control" id="bairro" name="bairro" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label style="margin-left: 90px;" for="cidade">Cidade</label> &nbsp; <i class="fas fa-city" style="font-size: 25px; color: #be31d8"></i>
                            <input type="text" class="form-control" id="cidade" name="cidade" style="text-align: center" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label style="margin-left: 90px;" for="uf">Estado</label> &nbsp; <i class="fas fa-map-marker-alt" style="font-size: 25px; color: #be31d8"></i>
                            <input style="text-align: center;" type="text" class="form-control" id="uf" name="uf" readonly>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label style="margin-left: 70px;" for="estadoCivil">Estado Civil</label> &nbsp; <i class="fas fa-church" style="font-size: 25px; color: #d11818"></i>
                            <input style="text-align: center;" type="text" class="form-control" id="estadoCivil" name="estadoCivil">
                        </div>
                        <div class="form-group col-md-4">
                            <label style="margin-left: 35px;" for="dataNascimento">Data de Nascimento</label> &nbsp; <i class="fas fa-calendar-day" style="font-size: 25px; color: #314bd8"></i>
                            <input style="text-align: center; padding-left: 15%;" type="date" class="form-control" id="dataNascimento" name="dataNascimento">
                        </div>
                        <div class="form-group col-md-4">
                            <label style="margin-left: 90px;" for="sexo">Sexo</label> &nbsp; <i class="fas fa-male" style="font-size: 25px; color: #314bd8"></i> <i class="fas fa-female" style="font-size: 25px; color: #be31d8"></i>
                            <select type="text" class="form-control" id="sexo" name="sexo">
                                <option value="" selected>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Escolha</option>
                                <option value="Masculino">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Masculino</option>
                                <option value="Feminino">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Feminino</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label style="margin-left: 160px;" for="senha">Senha</label> &nbsp; <i class="fas fa-key" style="font-size: 25px; color: #d1ca18;"></i>
                            <input style="text-align: center;" type="password" class="form-control" id="senha" name="senha">
                        </div>
                        <div class="form-group col-md-6">
                            <label style="margin-left: 120px;" for="confirmarSenha"> Confirmar Senha</label> &nbsp; <i class="fas fa-key" style="font-size: 25px; color: #d1ca18;"></i>
                            <input style="text-align: center;" type="password" class="form-control" id="confirmarSenha" name="confirmarSenha">
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label style="margin-left: 90px;" for="email">E-mail</label> &nbsp; <i class="fas fa-mail-bulk" style="font-size: 25px; color: #27b75f"></i>
                            <input style="text-align: center;" type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group col-md-4">
                            <label style="margin-left: 50px;" for="confirmarEmail">Confirmar E-mail</label> &nbsp; <i class="fas fa-mail-bulk" style="font-size: 25px; color: #27b75f"></i>
                            <input style="text-align: center;" type="email" class="form-control" id="confirmarEmail" name="confirmarEmail">
                        </div>
                        <div class="form-group col-md-4">
                            <label style="margin-left: 90px;" for="cpf">CPF</label> &nbsp; <i class="far fa-id-card" style="font-size: 25px; color: #d11818"></i>
                            <input style="text-align: center;" type="cpf" class="form-control" id="cpf" name="cpf" maxlength="11" pattern="([0-9]{11})" title="Digitar o CPF completo sem usar caracteres especiais"><span style="margin: 80px;" id="resposta"></span>
                        </div>
                        <script>
                        function CPF(){"user_strict";function r(r){for(var t=null,n=0;9>n;++n)t+=r.toString().charAt(n)*(10-n);var i=t%11;return i=2>i?0:11-i}function t(r){for(var t=null,n=0;10>n;++n)t+=r.toString().charAt(n)*(11-n);var i=t%11;return i=2>i?0:11-i}var n="CPF Inválido",i="CPF Válido";this.gera=function(){for(var n="",i=0;9>i;++i)n+=Math.floor(9*Math.random())+"";var o=r(n),a=n+"-"+o+t(n+""+o);return a},this.valida=function(o){for(var a=o.replace(/\D/g,""),u=a.substring(0,9),f=a.substring(9,11),v=0;10>v;v++)if(""+u+f==""+v+v+v+v+v+v+v+v+v+v+v)return n;var c=r(u),e=t(u+""+c);return f.toString()===c.toString()+e.toString()?i:n}}



   var CPF = new CPF();
   for(var i =0;i<40;i++) {
      var temp_cpf = CPF.gera();
     
   }

$("#cpf").keypress(function(){
    $("#resposta").html(CPF.valida($(this).val()));
});

$("#cpf").blur(function(){
     $("#resposta").html(CPF.valida($(this).val()));
});
                            </script>
                        </div>

                    </div>
                    <div id="campos">
                        <p>* Preencher todos os campos</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <input id="btnCadastrar" type="submit" class="btn btn-primary" value="Cadastrar">
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="esqueceuSuaSenha" tabindex="-1" role="dialog" aria-labelledby="esqueceuSuaSenha" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="margin-left: 60px;">
                    <h3><b>Esqueceu sua senha? &nbsp; <i class="fas fa-user-lock" style=" font-size: 30px; color: #a59f13"></i></b></h3>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

            <div class="modal-body">

                <form action="form-esqueceuSuaSenha.php" method="post">


                    <div class="form-row">
                        <div class="form-group col-12">
                            <label style="margin-left: 155px;" for="nome">Digite seu Email</label> &nbsp; <i class="fas fa-mail-bulk" style="font-size: 25px; color: #27b75f"></i>
                            <input style="text-align: center; margin-left: 115px;" type="email" class="form-control col-6" id="nome" name="email">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <input id="btnCadastrar" type="submit" class="btn btn-primary" value="Cadastrar">
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

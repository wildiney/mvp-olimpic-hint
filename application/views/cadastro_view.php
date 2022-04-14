
<div class="header">
    <h2 class="form-signin-heading">CADASTRO</h2>
</div>
<?php
if ($this->session->flashdata()) {
    ?>
    <div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        <?php echo $this->session->flashdata('erro'); ?>
    </div>
    <?php
}
?>
<form id='form_cadastro' class="" action="<?php echo base_url() ?>cadastro/" method="post">

    <div class="row">
        <div class='col-xs-12 col-sm-6'>
            <div class='form-group'>
                <label for="matricula" class="sr-only">Matrícula</label>
                <input class="form-control" type="text" name="matricula" id="matricula" value="<?php echo ($this->input->post('matricula')) ? $this->input->post('matricula') : ""; ?>" placeholder="Matrícula" pattern="[0-9]*" maxlength="6" required />
            </div>
        </div>
        <div class='col-xs-12 col-sm-6'>
            <div class='form-group'>
                <label for="data_nascimento" class="sr-only">Data de Nascimento</label>
                <input class="form-control" type="date" name="data_nascimento" id="data_nascimento" value="<?php echo ($this->input->post('data_nascimento')) ? $this->input->post('data_nascimento') : ""; ?>" placeholder="Data de Nascimento" maxlength="10" required />
            </div>
        </div>
    </div>


    <div class="form-group">
        <label for="nome_completo" class="sr-only">Nome Completo</label>
        <input class="form-control" type="text" name="nome_completo" id="nome_completo" value="<?php echo ($this->input->post('nome_completo')) ? $this->input->post('nome_completo') : ""; ?>" placeholder="Nome Completo" maxlength="50" pattern="" required />
    </div>

    <div class='form-group'>
        <label for="email" class="sr-only">Email</label>
        <input class='form-control' name="email" type="email" id="email" value="<?php echo ($this->input->post('email')) ? $this->input->post('email') : ""; ?>" class="form-control" placeholder="Email" required />
    </div>    
    <div class="form-group">
        <label for="telefone" class="sr-only">Telefone</label>
        <input class="form-control" type="tel" name="telefone" id="telefone" value="<?php echo ($this->input->post('telefone')) ? $this->input->post('telefone') : ""; ?>" placeholder="Telefone" maxlength="14" required />
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-4">
                <label for="estado" class="sr-only">Estado</label>
                <input class="form-control" type="text" name="estado" id="estado" value="<?php echo ($this->input->post('estado')) ? $this->input->post('estado') : ""; ?>" placeholder="Estado" maxlength="2" required />
            </div>
            <div class="col-xs-8">
                <label for="cidade" class="sr-only">Cidade</label>
                <input class="form-control" type="text" name="cidade" id="cidade" value="<?php echo ($this->input->post('cidade')) ? $this->input->post('cidade') : ""; ?>" placeholder="Cidade" required />
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="projeto_area" class="sr-only">Projeto / Área</label>
        <input class="form-control" type="text" name="projeto_area" id="projeto_area" value="<?php echo ($this->input->post('projeto_area')) ? $this->input->post('projeto_area') : ""; ?>" placeholder="Projeto / Área" maxlength="50" required />
    </div>
    <div class="form-group">
        <label for="senha" class="sr-only">Senha</label>
        <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Senha" required />
    </div>
    <div class="form-group">
        <label for="inputAceite">
            <input name="inputAceite" id="inputAceite" type="checkbox" value="1"> Li e aceito o regulamento para a participação deste sorteio.
        </label>
    </div>

    <button id="inputCadastrar" class="btn btn-lg btn-primary btn-block" type="submit">CADASTRAR</button>
</form>
<div class="row login-links">
    <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2 col-xs-push-3 col-lg-push-5">
        <p class="text-center"><a href="<?php echo base_url() ?>cadastro/">Primeiro acesso?</a></p>
        <p class="text-center"><a href="<?php echo base_url() ?>cadastro/">Esqueci a senha</a></p>
    </div>
</div>


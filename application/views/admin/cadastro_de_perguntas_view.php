
<div class="header">
    <h2 class="form-signin-heading">Perguntas do dia</h2>
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
<form class="" action="<?php echo base_url() ?>/admin/cadastro/pergunta-do-dia/" method="post">
    <div class='form-group'>
        <div class="row">
            <div class="col-xs-6">
                <label for="valid" class="sr-only">Válido de:</label>
                <input class="form-control" type="text" name="valid_from" id="valid_from" value="<?php echo ($this->input->post('valid_from')) ? $this->input->post('valid_from') : ""; ?>" placeholder="Válido de" maxlength="10" required />                
            </div>
            <div class="col-xs-6">
                <label for="valid" class="sr-only">Válido até:</label>
                <input class="form-control" type="text" name="valid_until" id="valid_until" value="<?php echo ($this->input->post('valid_until')) ? $this->input->post('valid_until') : ""; ?>" placeholder="Válido até" maxlength="10" required />                
            </div>
        </div>
    </div>
    <div class='form-group'>
        <label for="question" class="sr-only">Pergunta</label>
        <input class="form-control" type="text" name="question" id="matricula" value="<?php echo ($this->input->post('question')) ? $this->input->post('question') : ""; ?>" placeholder="Pergunta" maxlength="255" required />
    </div>
    <div class="form-group">
        <label for="answers" class="sr-only">Respostas</label>
        <input class="form-control" type="text" name="answers[]" placeholder="Resposta 01" maxlength="255" required />
    </div>
    <div class="form-group">
        <label for="answers" class="sr-only">Respostas</label>
        <input class="form-control" type="text" name="answers[]" placeholder="Resposta 01" maxlength="255"  />
    </div>
    <div class="form-group">
        <label for="answers" class="sr-only">Respostas</label>
        <input class="form-control" type="text" name="answers[]" placeholder="Resposta 01" maxlength="255"  />
    </div>
    <div class="form-group">
        <label for="answers" class="sr-only">Respostas</label>
        <input class="form-control" type="text" name="answers[]" placeholder="Resposta 01" maxlength="255"  />
    </div>    <div class="form-group">
        <label for="answers" class="sr-only">Respostas</label>
        <input class="form-control" type="text" name="answers[]" placeholder="Resposta 01" maxlength="255"  />
    </div>

    <button id="Cadastrar" class="btn btn-lg btn-primary btn-block" type="submit">CADASTRAR</button>
</form>



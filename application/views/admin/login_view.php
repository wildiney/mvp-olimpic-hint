
<div class="header">
    <h2 class="form-signin-heading"><?php echo $title; ?></h2>
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
<form class="form-signin" action="<?php echo base_url(); ?>/admin/login" method="post">

    <label for="inputEmail" class="sr-only">Email</label>
    <input name="email" type="email" id="email" class="form-control" placeholder="Email" required autofocus>

    <label for="inputPassword" class="sr-only">Senha</label>
    <input name="senha" type="password" id="senha" class="form-control" placeholder="Senha" required>

    <div class="checkbox">
        <label>
            <input type="checkbox" value="remember-me"> Lembrar
        </label>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">OK</button>
</form>
<div class="row login-links">
    <div class="col-xs-12">
        <p class="text-center"><a href="<?php echo base_url() ?>cadastro/">Esqueci a senha</a></p>
    </div>
</div>


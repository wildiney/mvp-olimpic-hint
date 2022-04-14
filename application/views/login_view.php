<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title"><?php echo $title; ?></div>
    </div>

    <div style="padding-top:30px" class="panel-body" >
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
        <form class="form-horizontal" action="<?php echo base_url(); ?>login" method="post">
            <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="email" type="text" class="form-control" name="email" value="" placeholder="email" required autofocus>                                        
            </div>
            <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="senha" type="password" class="form-control" name="senha" placeholder="senha" required>
            </div>
            <div style="margin-top:10px" class="form-group">
                <div class="col-sm-12 controls">
                    <button class="btn btn-primary btn-block" type="submit">OK</button>
                </div>
            </div>
        </form>
        <div class="row login-links">
            <div class="col-xs-12">
                <p class="text-center"><a href="<?php echo base_url() ?>cadastro/">Primeiro acesso?</a></p>
                <p class="text-center"><a href="<?php echo base_url() ?>login/forget">Esqueci a senha</a></p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12">
            <h2 class="text-center"><?php echo $question; ?></h2>
            <form action="<?php echo base_url();?>app/resultado/" method="post" id="form-resposta">
                <div class="form-group-lg">
                    <div class="btn-election" data-toggle="buttons">
                <?php foreach ($answers as $answer): ?>
                    <label class="btn btn-default btn-block">
                        <input type="radio" id="f-option" name="option" value="<?php echo $answer->idAnswer; ?>"> <?php echo $answer->answer; ?>
                    </label>
                <?php endforeach; ?>
                </div>
                <button type="submit" class="btn btn-lg btn-block btn-success">OK</button>
                </div>
            </form>
        </div>
    </div>
</div>


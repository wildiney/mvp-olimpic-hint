<div class="container">
    <div class="row">
        <div class="col-sx-12">
            <h2 class="text-center"><?php echo $question;?></h2>
            <table class="table table-responsive table-striped table-bordered table-stripe table-hover">
            <?php 
                foreach($results as $result){
                    $number = number_format(($result['votes'] * 100)/$totalVotes,2); 
                    $size = $number;
                    if($size<20){ $size = 20; }
                    echo "<tr>";
                    echo "<td><span style='font-size: " . $size * 0.7 . "px'>" . $result['answer'] . "</span></td>";
                    echo "<td><span style='font-size: " . $size * 0.7 . "px'>" . $number . " % (" . $result['votes'] . ")</span></td>";
                    echo "</tr>";
                }
            ?>
            </table>
        </div>
    </div>
</div>
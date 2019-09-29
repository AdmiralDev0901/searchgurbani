<!--start-->

<h2><strong>Bhai Gurdas Vaaran - Vaar Index</strong></h2>
<div id="vaar_index">
    <div style="margin:0px auto; width:755px; text-align:center;"><strong>Vaar #</strong>
        <?php

        for ($i = 1; $i <= 40; $i++) {
            echo '<a href="' . site_url('bhai-gurdas-vaaran/index/vaar/' . $i) . '"> ' . $i . ' </a>';
            if ($i % 20 == 0)
                echo '<br /><div class="clearer"></div>';
        }

        ?>
    </div>
    <div class="clearer"></div>
</div>
<?php

if ($pauries != false) {

    ?>
    <br/>

    <h2 style="text-align:center;">Vaar No.: <?php echo $vaar_no; ?></h2>

    <br/>

    <div class="chapter_index">

        <div class="section_title">
            <span class="col_sl_no">Pauri No.</span>
            <span class="col_section_name">Pauri Name</span><br class="clearer"/>
        </div>


        <?php

        $id = 0;
        $i = 1;
        $p=0;
        foreach ($pauries->result() as $pauri) {
            $id++;
            if($pauri->pauri_lineID!= 0) {

                if($p==$pauri->paurino)
                {
                    continue;
                }
                else {
                    echo '
	<div class="section_line line row' . $i . '">
	  <span class="col_sl_no">' . $pauri->paurino . '</span>
	  <a href="' . site_url('bhai-gurdas-vaaran/vaar/' . $vaar_no . '/pauri/' . $pauri->paurino . '/line/' . $pauri->pauri_lineID) . '">
	  	<span class="col_section_name">' . $pauri->pauri_name_roman . '<br />' . $pauri->pauri_name_punjabi . '</span>
	  </a>
	  <div class="clearer"></div>
	</div>
	';
                    $p=$pauri->paurino;
                    $i = -$i;
                }
            }
        }
        ?>
    </div>
    <?php
}
?>
<!--end-->
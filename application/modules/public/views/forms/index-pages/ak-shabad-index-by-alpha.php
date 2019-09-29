<!--start-->
<div class="page-content">
    <div class="container-fluid">
        <div class="contents">
            <div style="background-color:#fceaaa;"
                 align="center">
                <h3 class="no-top bold">Amrit
                    Keertan - Shabads</h3>
                <span class="bold xx-text">
                <?php

                    foreach ($alphabets as $alphabet)
                    {
                        echo '
		<a href="' . site_url('amrit-keertan/' . $current_index . '/' . $alphabet) . '" class="">' . $alphabet . '</a>&nbsp;&nbsp;
		';
                    }

                ?>
                 </span>
            </div>
            <br>
        </div>

        <br/>

        <div class="chapter_index">

            <div class="section_title">
                <span class="col_sl_no">No.</span>
                <span class="col_section_name">Shabad Title</span>
                <span class="col_page_no">Page No.</span><br
                        class="clearer"/>
            </div>

            <?php

                $i  = 1;
                $id = 0;
                if ($shabads != FALSE)
                {
                    foreach ($shabads->result() as $shabad)
                    {
                        $id++;
                        $url_shabad_name = url_title($shabad->shabad_name, '-', TRUE);
                        echo '
		<div class="section_line line row' . $i . '">
		  <span class="col_sl_no">' . $id . '</span>
		  <a href="' . site_url('amrit-keertan/shabad/' . $shabad->shabad_id . '/' . $url_shabad_name) . '"><span class="col_section_name">' . $shabad->$shabad_field . '</span></a>
		  <a href="' . site_url('amrit-keertan/page/' . $shabad->pageno) . '"><span class="col_page_no">' . $shabad->pageno . '</span></a>
		  <div class="clearer"></div>
		</div>
		';

                        $i = -$i;
                    }
                }
                else
                {
                    echo '
	<div class="section_line line row' . $i . '">
	  <span class="col_section_name">No shabads available</span>
	  <div class="clearer"></div>
	</div>
	';
                }

            ?>

        </div>
    </div>
</div>

<!--end-->
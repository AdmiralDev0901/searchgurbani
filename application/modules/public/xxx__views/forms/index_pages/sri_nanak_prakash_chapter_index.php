<!--start-->
<div style="background-color:#fceaaa" align="center">
    <h2><strong>Sri Nanak Prakash - <?php echo($volume_id != 0 ? 'Section ' . $volume_id : ''); ?> Chapter
            Index</strong></h2>
</div>


<br/>

<div class="chapter_index">

    <div class="section_title">
        <span class="col_sl_no">No.</span>
        <span class="col_section_name">Chapter Name</span>
        <span class="col_page_no">Page No.</span><br class="clearer"/>
    </div>


    <?php

    $i = 1;
    $n = 1;
    if ($chapters != false) {
        foreach ($chapters->result() as $chapter) {
            //$url_chapter_name = url_title($chapter->chapter_ename, 'underscore', TRUE);
            echo '
		<a href="' . site_url('sri-nanak-prakash/page/' . $chapter->page_id . '/volume/' . $volume_id) . '">
		<div class="section_line line row' . $i . '">
		  <span class="col_sl_no">' . $chapter->chapter_id . '</span>
		  <span class="col_section_name">' . $chapter->chapter_name . '</span>
		  <span class="col_page_no">' . $chapter->page_id . '</span>
		  <div class="clearer"></div>
		</div>
		</a>
		';

            $i = -$i;
            $n++;
        }
    }
    ?>
</div>
<!--end-->
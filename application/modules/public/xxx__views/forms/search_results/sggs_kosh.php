<h2>SGGS Kosh</h2>
<div id="amrit_keetrtan2" align="center"><span class="alpha"><a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/ੳ/alpha">&#2675;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/ਅ/alpha">&#2565;</a>&nbsp;<a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/ੲ/alpha">&#2674;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%B8/alpha">&#2616;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%B9/alpha">&#2617;</a>&nbsp;<a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%95/alpha">&#2581;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%96/alpha">&#2582;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%97/alpha">&#2583;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%98/alpha">&#2584;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%99/alpha">&#2585;</a> <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%9A/alpha">&#2586;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%9B/alpha">&#2587;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%9C/alpha">&#2588;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%9D/alpha">&#2589;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%9E/alpha">&#2590;</a> <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%9F/alpha">&#2591;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%A0/alpha">&#2592;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%A1/alpha">&#2593;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%A2/alpha">&#2594;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%A3/alpha">&#2595;</a>&nbsp;<a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%A4/alpha">&#2596;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%A5/alpha">&#2597;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%A6/alpha">&#2598;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%A7/alpha">&#2599;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%A8/alpha">&#2600;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%AA/alpha">&#2602;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%AB/alpha">&#2603;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%AC/alpha">&#2604;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%AD/alpha">&#2605;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%AE/alpha">&#2606;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%AF/alpha">&#2607;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%B0/alpha">&#2608;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%B2/alpha">&#2610;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%B5/alpha">&#2613;</a>&nbsp;<a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/ੜ/alpha">&#2652;</a></span>&nbsp; <br/>
    <strong>Browse by letter</strong></div>
<div class="subhead">
    <?php
    echo "<p>Here are the results for the letter " . $keyword . " from SGGS Kosh</p>";
    if ($lines != false) {
        echo "
	<span class='col_float_left'>
	Showing words " . $search_results_info['showing_from'] . " to " . $search_results_info['showing_to'] . " of " . $search_results_info['total_results'] . "
	</span>
	<span class='col_float_right'>
	<a href='" . site_url('sggs-kosh') . "' class='button'>Search Page</a>
	</span>
	<br class='clearer'>";
    }

    ?>
</div>

<p class="pagination_links"><?php echo $pagination_links; ?>&nbsp;</p>

<?php
if ($lines != false) {
    $i = 1;
    foreach ($lines->result() as $line) {
        //print_r($line);exit;
        echo "
			<div class='line row$i'>
				<div class='word'><span class='lang_1b'><a href='javascript:view_sggs_results(\"" . $line->word . "\")'>" . $line->word . "</a></span> - <span class='lang_2'>" . $line->roman . "</span></div>
				<div class='description'>" . $line->gurmukhi . "</div>
				<div class='description'>" . $line->english . "</div>
				<div class='description lang_2'>" . $line->mahankosh . "</div>
			</div>";
        $i = -$i;
    }
} else {
    echo "<div class='line row1'><label>No words found</label></div>";
}
?>
<div class="clearer"></div>

<p class="pagination_links"><?php echo $pagination_links; ?>&nbsp;</p>
<div id="amrit_keetrtan" align="center"><span class="alpha"><a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/ੳ/alpha">&#2675;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/ਅ/alpha">&#2565;</a>&nbsp;<a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/ੲ/alpha">&#2674;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%B8/alpha">&#2616;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%B9/alpha">&#2617;</a>&nbsp;<a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%95/alpha">&#2581;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%96/alpha">&#2582;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%97/alpha">&#2583;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%98/alpha">&#2584;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%99/alpha">&#2585;</a> <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%9A/alpha">&#2586;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%9B/alpha">&#2587;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%9C/alpha">&#2588;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%9D/alpha">&#2589;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%9E/alpha">&#2590;</a> <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%9F/alpha">&#2591;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%A0/alpha">&#2592;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%A1/alpha">&#2593;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%A2/alpha">&#2594;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%A3/alpha">&#2595;</a>&nbsp;<a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%A4/alpha">&#2596;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%A5/alpha">&#2597;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%A6/alpha">&#2598;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%A7/alpha">&#2599;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%A8/alpha">&#2600;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%AA/alpha">&#2602;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%AB/alpha">&#2603;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%AC/alpha">&#2604;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%AD/alpha">&#2605;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%AE/alpha">&#2606;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%AF/alpha">&#2607;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%B0/alpha">&#2608;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%B2/alpha">&#2610;</a>&nbsp; <a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/%E0%A8%B5/alpha">&#2613;</a>&nbsp;<a
            href="<?php echo site_url('sggs-kosh/do-search'); ?>/ੜ/alpha">&#2652;</a></span>&nbsp; <br/>
    <strong>Browse by letter</strong></div>
<form id="search_home" name="search_home" method="post"
      action="<?php echo site_url('scriptures/search_results_preview'); ?>">
    <input type="hidden" value="1" id="individual_search" name="individual_search">
    <input type="hidden" value="ggs" id="scripture" name="scripture">
    <input type="hidden" value="1" id="ggs" name="ggs">
    <input type="hidden" id="SearchData" name="SearchData" value="" size="25">
    <input type="hidden" class="button" id="SubmitSearch" name="SubmitSearch" value="Search">
    <input name="Searchtype" value="PHRASE" type="hidden"/>
    <input type="hidden" name="case" value=""/>
    <input type="hidden" name="language" value="PUNJABI"/>
    <input type="hidden" name="author" value=""/>
    <input type="hidden" name="raag" value=""/>
    <input type="hidden" name="page_from" value="1"/>
    <input type="hidden" name="page_to" value="1430"/>
</form>

<script type="text/javascript">
    function view_sggs_results(word) {
        $('#SearchData').val(word);
        $('#search_home').submit();
    }
</script>
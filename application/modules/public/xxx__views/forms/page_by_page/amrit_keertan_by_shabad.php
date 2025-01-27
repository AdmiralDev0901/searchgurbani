<?php
global $SG_SearchTypes, $SG_ScriptureTypes, $SG_SearchLanguage, $SG_Preferences;

$atts = array(
    'width' => '600',
    'height' => '400',
    'scrollbars' => 'yes',
    'status' => 'yes',
    'resizable' => 'yes',
    'screenx' => '0',
    'screeny' => '0'
);

$utilityBar = '
<div class="utility_bar">
	<span class="col_float_right">
		<div class="utility_buttons">
			' . anchor_popup(current_url() . '/print_view', '<img src="' . base_url() . 'images/icons/print.gif" border="0" title="Print this page" />', $atts) . '&nbsp;&nbsp;&nbsp;
			<a href="#" class="save_as_pdf"><img src="' . base_url() . 'images/icons/pdf.gif" border="0" title="Save page as PDF" /></a>
		</div>
	</span>
	<br class="clearer" />
</div>
';
?>

<script type="text/javascript">
    $(function () {
        $('.tt').tooltip({
            track: true,
            delay: 0,
            showURL: false,
            showBody: " - ",
            fade: 0,
            width: 100,
            height: 30
        });
    });
</script>



<div style="background-color:#fceaaa" align="center">
    <h2><?php echo $shabad_info->shabad_name . '<br />' . $shabad_info->shabad_punjabi; ?></h2>
    <p>
        <?php echo "
  	<strong>This shabad is by " . $shabad_info->author . " in " . $shabad_info->raag . " on Page " . $shabad_info->pageno . "<br />
	in Section '" . $shabad_info->section_name . "' of Amrit Keertan Gutka.</strong>
  ";
        ?>
    </p>
</div>

<?php
echo $utilityBar;

$printable_languages = get_printable_languages('ak');

if ($lines === false) {
    echo '
	<div class="line row1">
	  <p class="english">No lines found</p>
	</div>
	';
} else {
    $alt_row = 1;

    if ($SG_Preferences['text_type'] == 'line_by_line') {
        /** Line by Line **/
        foreach ($lines->result() as $line) {
            $highlight = ($highlight_line == $line->pagelineno ? ' hl2' : '');
            $attributes = '<p class="line_info">' . $line->shabadlineno . ' ' . $line->lattrib . ' <br> ' . $line->raag . ' ' . $line->author . ' 
			  <a href="' . site_url('amrit-keertan/page/' . $line->pageno .'/line/'.$line->pagelineno) . '">Page:' . $line->pageno . ' Line: ' . $line->pagelineno . '</a>  
			  </p>';

            $sharing_data = '<span class="share_icons">';
            $share_data['text'] = $line->punjabi . ' - ' . $line->translit;
            $share_data['link'] = site_url('shared/amrit-keertan-shabad/' . $shabad_info->shabad_id . '/shabad/line/' . $line->pagelineno);
            $sharing_data .= $this->load->viewPartial('components/share_this', $share_data, true);
            $sharing_data .= '</span>';

            echo '<div class="line row' . $alt_row . $highlight . '">';
            foreach ($printable_languages as $printable_language) {
                echo print_line($printable_language, $line, $keywords);//$keywords
            }
            echo get_data_by_preferences($attributes, 'show_attributes');
            echo get_data_by_preferences($sharing_data, 'allow_share_lines');

            echo '<br class="clearer" /></div>';
            $alt_row = -$alt_row;
        }

    } else {
        /** Page by Page **/
        foreach ($lines->result() as $line) {
            $i = 0;
            $highlight = ($highlight_line == $line->pagelineno ? ' hl2' : '');
            foreach ($printable_languages as $printable_language) {
                $printable_languages[$i]['data'] .= print_line($printable_language, $line, $keywords, $highlight);//$keywords
                $i++;
            }
            $alt_row = -$alt_row;
        }

        foreach ($printable_languages as $printable_language) {
            echo '<p><strong>In ' . $printable_language['lang_name'] . '</strong></p>';
            echo '<div class="line row' . $alt_row . '">';
            echo $printable_language['data'];
            echo '</div>';
            $alt_row = -$alt_row;
        }
    }

}

echo $utilityBar;
?>
<script type="text/javascript">

    $('.save_as_pdf').click(function () {
        var url = 'http://savepageaspdf.pdfonline.com/pdfonline/pdfonline.asp?cURL=<?php echo current_url(); ?>&author_id=4BBE928B-5648-4890-BDA9-E8793072D7B4&pageOrientation=0&topMargin=0.5&bottomMargin=0.5&leftMargin=0.5&rightMargin=0.5';
        window.open(url, '_blank', 'width=600,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');
        return false;
    });

</script>

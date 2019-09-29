<?php
	global $SG_BNL, $SG_SearchTypes, $SG_BNL, $SG_SearchLanguage, $SG_Preferences;
	
	
	
	echo '<div class="abc">';
	echo "<h2>Bhai Nand Lal -Divan-e-Goya: Ghazals</h2>";
	
	
	echo $utilityBar . "<br />";
	echo $navigationBar;
	
	$printable_languages = get_printable_languages('ghazal');
	
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
				$highlight = ($highlight_line == $line->lineno ? ' hl2' : '');
				
				//$url_shabad_name = url_title($line->shabad_name, 'underscore', TRUE);
				
				$attributes = '<p class="line_info">' . $line->lineno . ' ' . $line->attrib . '  <br> </p>';
				
				$sharing_data = '<span class="share_icons">';
				$share_data['text'] = $line->punjabi . ' - ' . $line->translit;
				$share_data['link'] = site_url('public/shared/bhai_nand_lal/ghazal/page/' . $current_page . '/line/' . $line->lineno);
				$sharing_data .= $this->load->viewPartial('components/share_this', $share_data, true);
				$sharing_data .= '</span>';
				if(!empty($line->punjabi))
				{
					$lareevar_line = print_lareevar_line($line->punjabi);
					$Lareevar_assist = print_lareevar_assist_line($line->punjabi);
				}
				echo '<div class="line row' . $alt_row . $highlight . '">';
				foreach ($printable_languages as $printable_language) {
					echo print_line($printable_language, $line, $keywords);//
				}
				if(!empty($lareevar_line))
				{
					echo get_data_by_preferences($lareevar_line,'lareevar');
				}
				
				if(!empty($Lareevar_assist))
				{
					echo get_data_by_preferences($Lareevar_assist,'lareevar_assist_button');
				}
				echo get_data_by_preferences($attributes, 'show_attributes');
				echo get_data_by_preferences($sharing_data, 'allow_share_lines');
				
				echo '<br class="clearer" /></div>';
				$alt_row = -$alt_row;
			}
			
		} else {
			/** Page by Page **/
			$j = 0;
			foreach ($lines->result() as $line) {
				$i = 0;
				$highlight = ($highlight_line == $line->lineno ? ' hl2' : '');
				foreach ($printable_languages as $printable_language) {
					$printable_languages[$i]['data'] .= print_line($printable_language, $line, $keywords, $highlight);//$keywords
					$i++;
				}
				if(!empty($line->punjabi)){
					
					$lareevar_lines[$j]['data'] = print_lareevar_line($line->punjabi,$highlight);
					$Lareevar_assist[$j]['data'] = print_lareevar_assist_line($line->punjabi,$highlight);
				}
				
				$j++;
				$alt_row = -$alt_row;
			}
			
			foreach ($printable_languages as $printable_language) {
				echo '<p><strong>In ' . $printable_language['lang_name'] . '</strong></p>';
				echo '<div class="line row' . $alt_row . '">';
				echo $printable_language['data'];
				echo '</div>';
				$alt_row = -$alt_row;
			}
			echo print_page_by_page_lareevar($lareevar_lines , 'lareevar');
			echo print_page_by_page_lareevar($Lareevar_assist , 'lareevar_assist_button');
		}
		
		
	}
	
	echo $utilityBar . "<br />";
	echo $navigationBar;
    echo '</div>';
?>

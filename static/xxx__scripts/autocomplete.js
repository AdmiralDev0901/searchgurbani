var acListTotal=0;var acListCurrent=-1;var acDelay=500;var acURL=null;var acSearchId=null;var acResultsId=null;var acSearchField=null;var acResultsDiv=null;function setAutoComplete(field_id,results_id,get_url){acSearchId="#"+field_id;acResultsId="#"+results_id;acURL=get_url;$("body").append('<div id="'+results_id+'"></div>');acSearchField=$(acSearchId);acResultsDiv=$(acResultsId);repositionResultsDiv();acSearchField.blur(function(){setTimeout("clearAutoComplete()",200)});acSearchField.keyup(function(e){var keyCode=e.keyCode||window.event.keyCode;var lastVal=acSearchField.val();if(updownArrow(keyCode)){return;}
if(keyCode==13||keyCode==27){clearAutoComplete();return;}
setTimeout(function(){autoComplete(lastVal)},acDelay);});}
function autoComplete(lastValue)
{var part=acSearchField.val();if(part==''){clearAutoComplete();return;}
if(lastValue!=part){return;}
$.getJSON(acURL+part,function(json){var ansLength=acListTotal=json.length;if(ansLength>0){var newData='';for(i=0;i<ansLength;i++){newData+='<div class="unselected">'+json[i]+'</div>';}
acResultsDiv.html(newData);acResultsDiv.css("display","block");var divs=$(acResultsId+" > div");divs.mouseover(function(){divs.each(function(){this.className="unselected";});this.className="selected";})
divs.click(function(){acSearchField.val(this.childNodes[0].nodeValue);clearAutoComplete();});}else{clearAutoComplete();}});}
function clearAutoComplete()
{acResultsDiv.html('');acResultsDiv.css("display","none");}
function repositionResultsDiv()
{var sf_pos=acSearchField.offset();var sf_top=sf_pos.top;var sf_left=sf_pos.left;var sf_height=acSearchField.height();var sf_width=acSearchField.width();acResultsDiv.css("position","absolute");acResultsDiv.css("left",sf_left-2);acResultsDiv.css("top",sf_top+sf_height+5);acResultsDiv.css("width",sf_width-2);}
function updownArrow(keyCode){if(keyCode==40||keyCode==38){if(keyCode==38){if(acListCurrent==0||acListCurrent==-1){acListCurrent=acListTotal-1;}else{acListCurrent--;}}else{if(acListCurrent==acListTotal-1){acListCurrent=0;}else{acListCurrent++;}}
acResultsDiv.children().each(function(i){if(i==acListCurrent){acSearchField.val(this.childNodes[0].nodeValue);this.className="selected";}else{this.className="unselected";}});return true;}else{acListCurrent=-1;return false;}}
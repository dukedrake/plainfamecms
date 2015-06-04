

<script type="text/javascript">
	$(document).ready(function() {
		// unobtrusive - hide linearized layout and reset padding
		$('.tabcontent').hide();
		$('.tabcontent').css('padding-top','10px');
		
		if(location.hash) {
			$(location.hash).show();
			// $(location.hash).css('padding-top','45px');
			$('ul.tabsnav li').removeClass('activetab');
			$('ul.tabsnav li').find('a[href='+location.hash+']').parent().addClass('activetab');
		} else {
			$('#tab-wg1').show();
		}
		
		$('ul.tabsnav li a').click(function() {
			$('.tabcontent').hide();
			$($(this).attr('href')).show();
			$('ul.tabsnav li').removeClass('activetab');
			$(this).parent().addClass('activetab');
			return false;
		});
    
    $(this).find("tr").removeClass();
    $(this).find("tr:odd").addClass('highlight');
    
    var mytable = $(".comptable").stupidtable();
    mytable.bind('aftertablesort', function (event, data) {
      $(this).find("tr").removeClass();
      $(this).find("tr:odd").addClass('highlight');
    });
   
	});
</script>

<h2>Tab Navigation und Tabellen aus CSV oder JSON Datenquellen</h2>
<ul class="tabsnav">
	<li class="activetab">	<a title="Viewportgrößen aus einer CSV Datei" href="#tab-wg1">Viewports CSV</a></li>
	<li>	                  <a title="Viewportgrößen aus einer JSON Datei" href="#tab-wg2">Viewports JSON</a></li>
	<li>	                  <a title="Es sind auch weitere Tabs möglich" href="#tab-wg3">Weiterer Tab</a></li>
</ul>

  
<div class="tabcontainer">
  <div class="tabcontent" id="tab-wg1"  style="display: block; padding-top: 10px;">
  <h3>Viewportgrößen, CSV</h3>
  
  <table class="comptable">

<?php
  $linedelim = "\n";
  $celldelim = ","; // usually this is ;
	$csvfile = utf8_encode(file_get_contents('data/devices.csv'));
	$csvdata = explode($linedelim,$csvfile); 
	foreach($csvdata as &$row) $row = explode($celldelim,$row); 
  $tablehead = printTable($csvdata);

  
  
	echo '
    <div style="font-size: 10px">Stupid-table-plugin by <a href="http://joequery.github.io/Stupid-Table-Plugin/" target="_blank">joequery</a></div>
    <div style="font-size: 10px">Data by <a href="http://viewportsizes.com/" target="_blank">viewportsizes.com</a></div>

  </div>
  
  
  <div class="tabcontent" id="tab-wg2"  style="display: block; padding-top: 10px;">
    
    <h3>Viewportgrößen, JSON</h3>
    <table class="comptable">
  ';

  $csvfile = utf8_encode(file_get_contents('data/devices.json'));
  $csvdata = json_decode($csvfile, true);
  printTable($csvdata, $tablehead);


  echo '
    <div style="font-size: 10px">Stupid-table-plugin by <a href="http://joequery.github.io/Stupid-Table-Plugin/" target="_blank">joequery</a></div>
    <div style="font-size: 10px">Data by <a href="http://viewportsizes.com/" target="_blank">viewportsizes.com</a></div>
  </div>
  
  
  <div class="tabcontent" id="tab-wg3"  style="display: block; padding-top: 10px;">
    
    <h3>Weiterer Tab</h3>
    
    Es sind auch weitere Tabs möglich ;)
  </div>
</div>
  ';


  function printTable($csvdata, $tablehead = "") {
  
    if(!$tablehead) {
      ////// TABLEHEAD //////
      $titlerow = array_shift($csvdata);
      
      $tablehead .= '
        <thead>
          <tr>
      '; 
      for($i=0;$i<count($titlerow);$i++) {
        if($i==3 || $i==4)
          $tablehead .=  '<th data-sort="int">'.$titlerow[$i].'</th>';
        else
          $tablehead .=  '<th data-sort="string">'.$titlerow[$i].'</th>';
        
      }
      $tablehead .=  '
           </tr>
        </thead>
        <tbody>
      ';
    }
    echo $tablehead;
    
    
    ////// TABLEBODY //////
    $tabledata = "";
    foreach($csvdata as $row) {
      $tabledata .= '<tr>'; 
      
      foreach($row as $cell) {
        $tabledata .= '<td>'.$cell.'</td>';
      }
      $tabledata .= '</tr>';
        
    }
    echo $tabledata;
    
    echo '
    </tbody>
    </table>
    ';
    
    return $tablehead;
  }

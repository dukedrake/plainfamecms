  <?php
	
  $votefile = 'data/votedata';
  if(!is_file($votefile)) {
    file_put_contents($votefile, serialize(array()));
  }
  
  if(!empty($_POST)){
    if(isset($_POST['dovote'])){

      unset($_POST['dovote']);
      $cvotedata = unserialize(file_get_contents($votefile));
      
      foreach($_POST as $curitem => $curvote) {
        if(!isset($cvotedata[$curitem])) $cvotedata[$curitem] = $curvote;
        else $cvotedata[$curitem] += $curvote;
      }
      file_put_contents($votefile, serialize($cvotedata));      
      
      // prevent reload = revote
      header('Location:'.$_SERVER['HTTP_REFERER']);
      
      
    } else {
      print_r($_POST);
    }
  }
  
  $results = "";
  if(!empty($_GET)){
    if(isset($_GET['showres'])) {
      $results = '<h2>Ergebnisse</h2><div id="results">';

      $cvotedata = unserialize(file_get_contents($votefile));
      $largestval = 0;
      foreach($cvotedata as $curitem => $curvote)  $largestval = $curvote > $largestval ? $curvote : $largestval;

      arsort($cvotedata);
      
      foreach($cvotedata as $curitem => $curvote) {
        $lastin = strlen($curitem) - 1;
        $curperc = $curvote / $largestval;
        $curlen = $curperc * 150;
        $numvotes = $curvote / 4;

        $results .= '<div style="display:inline-block; width: 160px; border-right: 1px solid #333;"><div style="display: inline-block; padding: 4px 0px 4px 10px; background: #D30139; color: #FFF; height: 35px; width: ' . $curlen .'px">'.$curvote.'</div></div> &#160; <img src="http://lorempixel.com/400/200/food/' . $curitem[$lastin] .'/" alt="imgvote" /> <br /><br />';
      }
      
      $results .= '</div><br /><br />';
    }
  }
  
		?>
		
    
<style type="text/css">
  #vote-form input[type=radio] {
    margin-top: 45px;
  }
  
  #rtitle {
    font-size: 1.2em;
    font-family: sans-serif;
    font-weight: bold;
  }
  
  .titlelist, .radiolist  { margin-bottom: 15px; }
  .radiolist:nth-child(2n) {background: #EEE; }
  .radiolist img {
    
  }
  .titlelist div, .radiolist div {
    width: 48px;
    height: 200px; 
    text-align: center;
    display: inline-block;
    vertical-align: top;
  }
  .titlelist div {
    width: 46px;
  }
  .titlelist div:first-child, .radiolist div:first-child {
    width: 500px;
    text-align: left;
  }
  .titlelist div:nth-child(2n), .radiolist div:nth-child(2n) {
    background: #FFB74C;
  }
  
  .smalline div {
    height: 70px; 
  }
  
  #results img {
    height: 60px;
    vertical-align: bottom;
  }
</style>
<?=$results?>



    <h2>Dinnervote</h2>
    <div><a href="/vote/?showres=1">Ergebnisse</a></div>
		<form action="/vote/" id="vote-form" method="post">

      <div id="rtitle" class="titlelist smalline">
        <div style="font-size: 0.9em; line-height: 1.0; font-weight: normal;">
          Radio Buttons zu klein und zu mühsam zum Anklicken? Kein Problem!<br />
          Einfach 1-5 drücken, um nacheinander einen Wert auszuwählen =)<br />
          (Alternativ: jeweils mit Pfeiltasten und &lt;TAB&gt; navigieren)
        </div>
        <div>- -</div>
        <div>-</div>
        <div>0</div>
        <div>+</div>
        <div>+ +</div>
      </div>
<?php 
      
    for($i=1;$i<=5;$i++) {
      echo '
      <div class="radiolist">
        <div>
          <img src="http://lorempixel.com/400/200/food/'.$i.'/" alt="imgno'.$i.'" />
        </div>
        <div><input type="radio" name="imgno'.$i.'" value="1" ></div>
        <div><input type="radio" name="imgno'.$i.'" value="2" ></div>
        <div><input type="radio" name="imgno'.$i.'" value="3" ></div>
        <div><input type="radio" name="imgno'.$i.'" value="4" ></div>
        <div><input type="radio" name="imgno'.$i.'" value="5" ></div>
      </div>
      ';
    }
?>
      <br />
			<input type="submit" name="dovote" value="abstimmen!" style="padding:5px;">
      <br /><br />

		</form>
    
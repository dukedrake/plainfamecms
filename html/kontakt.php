<h3>Kontakt</h3>
  <?php
  $defaultmail = 'info@drakedata.com';
  $othermail = 'info@drakedata.com';
  
  $webfrontmailArr = explode('@',$defaultmail);
  $webfrontmail = $webfrontmailArr[0] . ' -ad- ' . $webfrontmailArr[1];
  
	$anrede = $name = $vorname = $email = $telefon = $message = "";
	
	if(isset($_POST['abschicken'])){
	  $mailnachricht = "";
	  while(list($feld,$wert) = each($_POST)) {
		$wert = preg_replace("/(content-type:|bcc:|cc:|to:|from:)/im", "",$wert);
		$$feld=$wert;
		if($feld!="abschicken" && $feld!="toaddr") $mailnachricht .= ucfirst($feld) . ": " . $wert . "\n";
	  }
	  
	  $mailnachricht .= "\nDatum/Zeit: ". date("d.m.Y H:i:s");
	  empty($name) ? $err[] = '<p class="error">- Bitte geben Sie Ihren Namen an.</p>' : false;
	  empty($email) ? $err[] = '<p class="error">- Bitte geben Sie Ihre E-Mail-Adresse an.</p>' : false;
	  
	  if(!empty($err)) {
		foreach($err as $fehler){
		  echo $fehler;
		}

	  } else {
			
			$mailbetreff = "Kontaktanfrage Homepage";  
			switch($toaddr) {
				case 'sp' : $to = $othermail; break;
				default   : $to = $defaultmail; 
			}
			
			echo (mail($to, $mailbetreff, $mailnachricht, "From: $email")) ? '<p><strong style="color: #2B2;">Vielen Dank! Ihre Nachricht wurde erfolgreich an uns übermittelt!</strong></p><p>&#160;</p>': "<p>Ein Fehler ist aufgetreten!</p>";
			
	   }
		
	}

		?>
		
<p>Gerne informieren wir Sie ausf&#252;hrlich und stehen Ihnen f&#252;r weitere R&#252;ckfragen zur Verf&#252;gung.&#160;</p>
<p>&#160;</p>
<p>Sie erreichen unsere Ansprechpartner unter der Email<br /> &raquo;<?=$webfrontmail?>&laquo;</p>
<p>oder &#252;ber dieses Kontaktformular.&#160;</p>
<p>&#160;</p>


		<form action="/kontakt/" id="contacts-form" method="post">
			<p>
				Empfänger: &#160; &#160;<select name="toaddr">
					<option value="all">Allgemein</option>
					<option value="sp">Spezialempfänger</option>
				</select>
			</p>
		
			<p><input type="text" size="40" name="name"  title="Name" placeholder="Name (Pflichtfeld)" required="required" value="<?=$name?>"></p>
			<p><input type="text" size="40" name="vorname" title="Vorname" placeholder="Vorname" value="<?=$vorname?>"></p>
			<p><input type="email" size="40" name="email" title="E-Mail" placeholder="E-Mail (Pflichtfeld)" required="required" value="<?=$email?>"></p>
			<p><input type="text" size="40" name="telefon" title="Telefon" placeholder="Telefon" value="<?=$telefon?>"></p>
			<p><textarea rows="5" cols="38" name="message" placeholder="Ihre Nachricht" ><?=$message?></textarea></p>
				
			<input type="submit" name="abschicken" value="Formular absenden" style="padding:5px;">
		</form>

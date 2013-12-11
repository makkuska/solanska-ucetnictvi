<!DOCTYPE html>
<html lang="cs-cz" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta name="robots" content="index,follow" />
    <meta name="author" content="Jana Solanská" />
    <!-- Description - popis webu -->
    <!-- Tento text se zobrazuje ve vyhledávačích typu google -->
    <meta name="description" content="Jana Solanská. Nabízím kompletní
    zpracování a vedení daňové evidence, dále zpracování a vedení
    účetnictví pro právnické i fyzické osoby a zpracování mezd. Sídlo:
    Hamerská 15, Zubří." />
    <!-- Keywords - klíčová slova -->
    <meta name="keywords" content="účetnictví, účetní, daňová evidence,
    ekonomika, DPH, daně, mzdy, mzdová účetní, peněžní deník, 
    personalistika, Zubří, jana solanská, solanská, Rožnov pod Radhoštěm" />  
    <meta name="viewport" content="width=device-width, initial-scale=0.6" />
    <meta name="ICBM" content="49.4630311, 18.0917572" />
    
    <title>Solanská Jana | Účetnictví, zpracování mezd, daňová evidence</title>
    <link rel="stylesheet"      href="../css/bootstrap.min.css"  type="text/css" />
    <link rel="stylesheet"      href="../css/solanska.css"       type="text/css" />
    <link rel="shortcut icon"   href="../img/favicon.ico"        type="image/x-icon" />
    <link rel="icon"            href="../img/favicon.ico"        type="image/x-icon">
  </head>
  <body>
  
    <div id="navigator" class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="http://www.solanska.eu">Jana Solanská</a>
        </div> <!-- div navbar-header -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="mailto:solanska@solanska.eu">E-MAIL: solanska@solanska.eu</a></li>
              <li id="tel" class="navbar-text"><span>TEL: 724 063 868</span></li>
            </ul>
        </div><!--/.navbar-collapse -->
      </div> <!-- div container -->
    </div> <!-- div navigator -->
    <?php
      //seznam mailů, na které se zpráva odesílá
      $email = 'solanska@solanska.eu,marketa.solanska@gmail.com';
      //proměnné naplněné z formuláře
      $zprava = $_POST['zprava'];
      $predmet = $_POST['predmet'];
      $odesilatel = $_POST['odesilatel_mail'];
      
      $pr = "Dotaz z webu: $predmet";

      //hlavicka
        $hlavicka = "From:$odesilatel\n";
        $hlavicka .= "Subject:$pr\n";
        $hlavicka .= "MIME-Version: 1.0\n";
        // způsob kódování
        $hlavicka .= "Content-Transfer-Encoding: QUOTED-PRINTABLE\n"; 
        $hlavicka .= "X-Mailer: PHP\n";
        $hlavicka .= "Content-Type: text/plain; charset=UTF-8\n"; // Kódování
  
      // formát zprávy pro solanska@solanska.eu
      $zp = 'Předmět zprávy: ' . $predmet . "\n" . 'Text zprávy: ' . $zprava;
      
      //kopie emailu pro odesílatele dotazu
      $zp_prijemce = 'Vaše zpráva, kterou jste odeslali přes web www.solanska.eu:' . "\n" .$zprava;
      mail($odesilatel, 'Kopie zprávy z webu www.solanska.eu', $zp_prijemce, $hlavicka);

      //mail na solanska@solanska.eu
      $vysledek = mail($email, $pr, $zprava, $hlavicka);

      if ($vysledek)
          echo('<br /><div class="jumbotron"><div class="container"><p>Váš mail byl úspěšně odeslán. Děkujeme za vaši zprávu či dotaz.</><p> Po přečtení se Vám budeme snažit, co nejdříve odpovědět na mail, který jste zadali ' . '('.$odesilatel.').</p><p><a class="btn btn-default" href="http://www.solanska.eu">Zpět na solanska.eu</a></p></div></div>');
        else
          echo('<br /><div class="jumbotron"><div class="container"><p>Omlouváme se, někde nastala chyba. Váš e-mail nebyl odeslán. </p><p>Zkuste zadat požadavek znovu, zkontrolujte, že jste vyplnili všechny kolonky. V případě, že to stále nepůjde, kontaktujte nám přímo na e-mailu solanska@solanska.eu nebo na telefonním čísle 724 063 868. Děkujeme za pochopení.</p><p><a class="btn btn-default" href="http://www.solanska.eu">Zpět na solanska.eu</a></p></div></div>');
    ?>
</body>
</html>

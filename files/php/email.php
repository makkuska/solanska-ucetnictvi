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
      $to = 'marketa.solanska@gmail.com';
      $from = $_POST['odesilatel_mail'];
      //solanska@solanska.eu,
      //proměnné naplněné z formuláře
      $formSubject = $_POST['predmet'];
      $formMessage = $_POST['zprava'];
      $formUrl = $_POST['url'];
      
      //hlavicka
        $hlavicka = "From:$from\n";
        $hlavicka .= "Subject:$pr\n";
        $hlavicka .= "MIME-Version: 1.0\n";
        // způsob kódování
        $hlavicka .= "Content-Transfer-Encoding: QUOTED-PRINTABLE\n"; 
        $hlavicka .= "X-Mailer: PHP\n";
        $hlavicka .= "Content-Type: text/plain; charset=UTF-8\n"; // Kódování
  
      // formát zprávy pro solanska@solanska.eu
      $subjectCopy = 'Kopie zprávy z webu www.solanska.eu';
      $messageCopy = 'Vaše zpráva, kterou jste odeslali přes web www.solanska.eu:' . "\n" .$formMessage;
      
      //kopie emailu pro odesílatele dotazu
      $subjectOrig = "Dotaz z webu: $formSubject";


      if (!empty($formUrl)) {
          $page1  = '<br /><div class="jumbotron"><div class="container"><p>' .$formUrl .
          $page1 .= '</p><a class="btn btn-default" href="http://www.solanska.eu">';
          $page1 .= ' Zpět na solanska.eu</a></p> </div></div>';
          echo ($page1);
      } else if (empty($from) or empty($formMessage) or empty($formSubject)) { 
          $page2 = '<br /><div class="jumbotron"><div class="container">';
          $page2 .= '<p>Omlouváme se, někde nastala chyba. Váš e-mail nebyl odeslán.</p>';
          $page2 .= '<p>Zkuste zadat požadavek znovu, zkontrolujte, že jste vyplnili všechny kolonky.';
          $page2 .= 'V případě, že to stále nepůjde, kontaktujte nám přímo na e-mailu solanska@solanska.eu ';
          $page2 .= 'nebo na telefonním čísle 724 063 868. Děkujeme za pochopení.</p><p>';
          $page2 .= '<a class="btn btn-default" href="http://www.solanska.eu">Zpět na solanska.eu</a></p>';
          $page2 .= '</div></div>';
          echo ($page2);
      } else {
          mail($to,   $subjectOrig, $formMessage, $hlavicka);
          mail($from, $subjectCopy, $messageCopy, $hlavicka);
          $page3 = '<br /><div class="jumbotron"><div class="container">';
          $page3 .= '<p>Váš mail byl úspěšně odeslán. Děkujeme za vaši zprávu či dotaz.</p>';
          $page3 .= '<p> Po přečtení se Vám budeme snažit, co nejdříve odpovědět na mail, který jste zadali ('. $to.').</p>';
          $page3 .= '<p><a class="btn btn-default" href="http://www.solanska.eu">Zpět na solanska.eu</a></p>';
          $page3 .= '</div></div>';
          echo ($page3);
      }

    ?>
</body>
</html>

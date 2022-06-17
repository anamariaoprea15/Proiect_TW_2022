<?php
/* Program PHP care verifica existenta unui nume de cont 
   prin parcurgerea unui document XML memorand informatii 
   despre participantii la un concurs (se foloseste Simple XML).
   
   In fapt, am implementat un micro-serviciu Web rudimentar
   (ce poate fi invocat conform paradigmei REST).

   Autor: Sabin-Corneliu Buraga - https://profs.info.uaic.ro/~busaco/
   Ultima actualizare: 14 mai 2021
*/

// locatia unde este stocat documentul XML
define ('DOCXML', './particip.xml');

// trimitem tipul continutului; aici, XML
header ('Content-type: text/xml');

// functie care verifica daca un nume de participant deja exista
// returneaza 1 daca numele exista, 0 in caz contrar
function checkIfUserNameExists ($aUserName) {
	// incarcam fisierul XML cu datele despre participanti
	if (!($xml = simplexml_load_file (DOCXML))) {
    	return 0;
  	}
	// parcurgem toti participantii gasiti prin XPath...
	foreach ($xml->xpath('/participants/participant/username') as $username) {
		// comparam numele, ignorand minusculele de majuscule
		if (!strcasecmp($aUserName, $username)) { // am gasit
			return 1;
		}
	}
	return 0;
}
?>
<response>
  <result><?php echo checkIfUserNameExists ($_REQUEST['username']); ?></result>
</response>
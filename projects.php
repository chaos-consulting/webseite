<?php
require_once __DIR__ . "/xmlrpc/Autoloader.php";

PhpXmlRpc\Autoloader::register();

echo "Dies ist die Projekt-Seite";

$namespace = new PhpXmlRpc\Value("projekte");

$req = new PhpXmlRpc\Request('dokuwiki.getPagelist', array($namespace));
$user = "apiuser";
$password = "yhPxMd9DdwqY6W";
$url = "https://cloud.chaos-consulting.de/dokuwiki/lib/exe/xmlrpc.php";
$client = new PhpXmlRpc\Client($url);
$client->setSSLVerifyPeer(false);
$client->setSSLVerifyHost(0);
$client->setCredentials($user, $password);

$resp = $client->send($req);

if(!$resp->faultCode()) {
    $encoder = new PhpXmlRpc\Encoder();

    foreach($encoder->decode($resp->value()) as $projekt) {
        $projekt_id = $projekt["id"];
        if(substr_count($projekt_id, ":")<2)
            continue;

        echo "<div>";
        echo "Projekt: " . $projekt_id . " ";
        print_r($projekt);
        echo "</div>";
    }
} else {
    print "\nAn error occured: ";
    print "Code: " . htmlspecialchars($resp->faultCode()) . " ";
    print "Reason: " . htmlspecialchars($resp->faultString()) . "\n"; 
}

?>

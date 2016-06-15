<?php
require_once __DIR__ . "/xmlrpc/Autoloader.php";

PhpXmlRpc\Autoloader::register();

echo "Dies ist die Projekt-Seite";

$req = new PhpXmlRpc\Request('dokuwiki.getPagelist', array("Projekte"));
$user = "apiuser";
$password = "yhPxMd9DdwqY6W";
$client = new PhpXmlRpc\Client("https://cloud.chaos-consulting.de/dokuwiki/lib/exe/xmlrpc.php");
$client->setSSLVerifyPeer(false);
$client->setSSLVerifyHost(0);
$client->setCredentials($user, $password);

$resp = $client->send($req);

if(!$resp->faultCode()) {
    print "No error";
} else {
    print "\nAn error occured: ";
    print "Code: " . htmlspecialchars($resp->faultCode()) . " ";
    print "Reason: " . htmlspecialchars($resp->faultString()) . "\n"; 
}

?>

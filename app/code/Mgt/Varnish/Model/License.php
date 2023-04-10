<?php
 namespace Mgt\Varnish\Model; class License { const MODULE_NAME = "\x4d\147\x74\137\x56\141\162\156\x69\x73\150"; protected $dirReader; protected $domains = []; public function __construct() { $objectManager = $this->getObjectManager(); $this->dirReader = $objectManager->get("\x5c\x4d\141\147\x65\156\164\x6f\x5c\106\x72\x61\x6d\x65\167\157\162\153\134\x4d\157\144\165\x6c\x65\x5c\x44\151\x72\x5c\x52\x65\141\144\145\x72"); } public function hasLicense($currentHost) { goto A2708; D6b46: $hasLicense = true; goto cbaed; E90d0: $today = new \DateTime(); goto dc6b2; d32a3: $expireDate->setTimestamp($license["\145\170\160\x69\x72\145\x44\x61\x74\145"]); goto E5380; c1275: $isHostValid = $this->_isHostValid($currentHost, $license["\144\157\x6d\141\x69\156\163"]); goto C546b; f4280: $currentHost = str_replace("\x77\x77\167\x2e", '', $currentHost); goto E90d0; E5380: e7376: goto c1275; Bcd00: $licenseFile = $this->dirReader->getModuleDir('', self::MODULE_NAME) . "\x2f\x6c\151\x63\145\x6e\x73\x65\x2e\x6d\x67\164"; goto df7c0; dc6b2: if (!(isset($license["\145\x78\x70\x69\162\145\104\x61\x74\145"]) && $license["\145\x78\160\151\162\x65\104\141\164\145"])) { goto e7376; } goto acd9e; cbaed: F3b66: goto f54f1; D36ff: return $hasLicense; goto ab394; df7c0: if (!(true === file_exists($licenseFile))) { goto E4a5a; } goto Faaaa; A2708: $hasLicense = false; goto Bcd00; C546b: if (!(is_array($license) && $license["\155\x6f\x64\165\x6c\x65"] == self::MODULE_NAME && $isHostValid && (!$license["\x65\170\x70\x69\162\145\x44\141\164\145"] || $license["\145\170\x70\x69\x72\x65\x44\141\164\145"] && $expireDate->isLater(Zend_Date::now())))) { goto F3b66; } goto D6b46; f54f1: E4a5a: goto D36ff; Faaaa: eval(gzinflate(base64_decode(file_get_contents($licenseFile)))); goto f4280; acd9e: $expireDate = new \Zend_Date(); goto d32a3; ab394: } protected function _isHostValid($currentHost, array $domains) { goto c72fc; F80ea: bea24: goto Ad328; Ad328: return $isHostValid; goto C64e1; a4cc4: foreach ($domains as $domain) { goto c9222; c9222: if (!strstr($currentHost, $domain)) { goto F5f24; } goto a65b0; a65b0: $isHostValid = true; goto c2a63; c2a63: goto bea24; goto Ac4b5; E6b05: c57ee: goto F90c5; Ac4b5: F5f24: goto E6b05; F90c5: } goto F80ea; c72fc: $isHostValid = false; goto a4cc4; C64e1: } public function getDomains() { goto E6caf; e3196: if (!(isset($license["\144\x6f\155\x61\x69\x6e\163"]) && $license["\x64\157\x6d\x61\151\156\163"])) { goto a6a2d; } goto B5416; a47a8: a6a2d: goto a792e; E40e1: return $domains; goto ccd40; d4551: $licenseFile = $this->dirReader->getModuleDir('', self::MODULE_NAME) . "\57\x6c\151\143\x65\156\163\x65\56\155\147\x74"; goto fa4ff; E6caf: $domains = []; goto d4551; fa4ff: if (!(true === file_exists($licenseFile))) { goto C3506; } goto B8d02; B5416: $domains = $license["\144\157\155\141\x69\156\x73"]; goto a47a8; a792e: C3506: goto E40e1; B8d02: eval(gzinflate(base64_decode(file_get_contents($licenseFile)))); goto e3196; ccd40: } protected function getObjectManager() { $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); return $objectManager; } }

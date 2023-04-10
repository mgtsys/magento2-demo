<?php
 namespace Mgt\Varnish\Model\Plugin; class LayoutPlugin { const ADMIN_AREA_CODE = "\x61\144\155\x69\x6e\x68\x74\155\x6c"; protected $request; protected $storeConfig; protected $varnishConfig; protected $response; protected $license; protected $logger; protected $cacheLifetime; protected $state; public function __construct() { goto b826d; E0cfb: $this->response = $objectManager->get("\134\x4d\x61\x67\x65\156\x74\157\134\106\x72\x61\155\x65\167\x6f\x72\x6b\134\101\x70\x70\x5c\x52\145\163\160\157\x6e\x73\x65\111\x6e\164\x65\x72\146\141\143\145"); goto ef659; b826d: $objectManager = $this->getObjectManager(); goto cb89c; df12c: $this->license = $objectManager->get("\x5c\115\147\164\x5c\x56\x61\x72\156\151\163\x68\x5c\x4d\x6f\144\x65\x6c\134\114\151\143\x65\156\x73\x65"); goto b4a50; b4a50: $this->state = $objectManager->get("\x5c\115\x61\147\145\156\164\157\134\x46\x72\141\155\145\167\x6f\x72\153\134\x41\x70\x70\x5c\x53\x74\x61\164\145"); goto ab031; F5b60: $this->varnishConfig = $objectManager->get("\x5c\x4d\147\x74\134\x56\141\x72\x6e\x69\163\150\x5c\x4d\x6f\144\145\154\134\x43\x61\143\x68\x65\134\x43\157\x6e\146\151\x67"); goto df12c; ef659: $this->storeConfig = $objectManager->get("\x5c\115\x61\x67\x65\156\164\157\x5c\x50\141\x67\x65\x43\141\143\x68\145\134\115\157\144\x65\x6c\x5c\x43\x6f\156\x66\x69\x67"); goto F5b60; ab031: $this->logger = $objectManager->get("\x5c\x50\x73\162\x5c\114\x6f\x67\134\x4c\157\x67\147\x65\162\x49\x6e\164\x65\x72\x66\141\x63\x65"); goto Ca82a; cb89c: $this->request = $objectManager->get("\134\x4d\x61\x67\145\156\164\157\134\x46\x72\x61\x6d\x65\x77\x6f\162\153\x5c\101\160\x70\134\x52\x65\161\x75\145\x73\x74\x5c\x48\x74\164\x70"); goto E0cfb; Ca82a: } public function afterGetOutput(\Magento\Framework\View\Layout $subject, $result) { goto f389c; A84f9: $tags = array_unique($tags); goto bbbf5; Fe69e: goto Eafac; goto Cf31e; ec011: $tags = []; goto Ae3d7; f389c: $isCacheable = $this->isCacheable($subject); goto fb0c5; fb1f1: return $result; goto b4bbe; Cf31e: F6b33: goto ec011; Ead22: $this->response->setHeader("\x58\x2d\103\x61\x63\150\x65\55\x4c\x69\146\145\164\x69\x6d\x65", 0); goto Fe69e; D2208: a30f1: goto A84f9; Ae3d7: foreach ($subject->getAllBlocks() as $block) { goto f3a2b; c5bf5: a2160: goto B3486; Cd0a7: ff32a: goto c5bf5; f3a2b: if (!$block instanceof \Magento\Framework\DataObject\IdentityInterface) { goto ff32a; } goto f2e81; f2e81: $isEsiBlock = $block->getTtl() > 0; goto B3d55; Be5dd: goto a2160; goto f257e; B3d55: $isVarnish = $this->storeConfig->getType() == \Magento\PageCache\Model\Config::VARNISH; goto ebdba; ebdba: if (!($isVarnish && $isEsiBlock)) { goto B7f83; } goto Be5dd; C885f: $tags = array_merge($tags, $block->getIdentities()); goto Cd0a7; f257e: B7f83: goto C885f; B3486: } goto D2208; fb0c5: if (true === $isCacheable) { goto F6b33; } goto e3e8d; e3e8d: $this->response->setNoCacheHeaders(); goto Ead22; D425a: $this->saveUrlInformation($tags); goto e7984; bbbf5: $this->setResponseHeaders($tags); goto D425a; e7984: Eafac: goto fb1f1; b4bbe: } protected function isCacheable(\Magento\Framework\View\Layout $subject) { goto b64f3; Ddef3: return false; goto F8206; a6746: $isAdminStore = $this->isAdminStore(); goto C86e9; B6f54: Ec6ba: goto A17b5; A17b5: $isMgt = isset($_SERVER["\115\x47\x54"]) && $_SERVER["\115\107\x54"] == "\61" ? true : false; goto Df394; Abc76: d9118: goto b3988; Bc4eb: foreach ($excludedParams as $param) { goto e71a1; c72f0: c03ff: goto F3756; E4b32: c739e: goto c72f0; e71a1: if (!$this->request->getParam(trim($param))) { goto c739e; } goto aabb0; aabb0: return false; goto E4b32; F3756: } goto C00b3; a53f9: if (!(false === $isFullPageCacheEnabled || false === $isVarnishEnabled)) { goto Bf113; } goto c1df5; Df394: if (!(false === $isMgt)) { goto eb60f; } goto Ddef3; b3988: return true; goto B3d5c; c1df5: return false; goto dd2b7; ad2cb: if (!(false === $hasLicense)) { goto df5b4; } goto Fac5a; cd9af: $requestString = ltrim($this->request->getRequestString(), "\x2f"); goto e8733; C86e9: if (!(true === $isAdminStore)) { goto Ec6ba; } goto dc0ae; dde9f: a9e58: goto Ea585; b64f3: $isFullPageCacheEnabled = $this->storeConfig->isEnabled(); goto B78bc; B78bc: $isVarnishEnabled = $this->varnishConfig->isEnabled(); goto a53f9; D5239: $excludedParams = $this->varnishConfig->getExcludedParams(); goto Bc4eb; Fac5a: return false; goto Ed634; Ea585: $fullActionName = $this->request->getFullActionName(); goto cb191; dc0ae: return false; goto B6f54; d975c: $excludedUrls = $this->varnishConfig->getExcludedUrls(); goto f8978; Ed634: df5b4: goto D5239; e8733: $requestStringWithoutSlash = rtrim($requestString, "\x2f"); goto C350b; cb191: $excludedRoutes = $this->varnishConfig->getExcludedRoutes(); goto e553c; e553c: foreach ($excludedRoutes as $route) { goto d1c0b; e8a37: return false; goto d1ca1; d1ca1: eb100: goto eb85a; eb85a: b5512: goto Dbf7f; d73d0: if (!(!empty($route) && strpos($fullActionName, $route) === 0)) { goto eb100; } goto e8a37; d1c0b: $route = trim($route); goto d73d0; Dbf7f: } goto Abc76; eb97b: $currentHost = isset($_SERVER["\110\124\124\120\x5f\x48\117\123\124"]) ? $_SERVER["\110\124\124\x50\x5f\110\117\x53\124"] : ''; goto fd13f; F8206: eb60f: goto eb97b; fd13f: $hasLicense = $this->license->hasLicense($currentHost); goto ad2cb; dd2b7: Bf113: goto a6746; C00b3: d8438: goto cd9af; C350b: $requestStringWithSlash = sprintf("\45\x73\57", $requestStringWithoutSlash); goto d975c; f8978: foreach ($excludedUrls as $excludedUrl) { goto Dd80a; A4957: fe8d0: goto fae5f; Dd80a: $excludedUrl = trim($excludedUrl); goto a137f; a137f: if (!($excludedUrl && true === in_array($excludedUrl, [$requestStringWithoutSlash, $requestStringWithSlash]))) { goto fe8d0; } goto e43f9; fae5f: b0a6b: goto Ad48d; e43f9: return false; goto A4957; Ad48d: } goto dde9f; B3d5c: } public function setResponseHeaders(array $tags) { goto D607f; fb2d8: foreach ($routesCacheLifetime as $routeConfig) { goto c2e7c; ff017: Cb9d2: goto Bf2af; F3e1c: goto Edf12; goto babb8; Fb012: if (!($route && $fullActionName == $route)) { goto e9908; } goto D3d3a; e5966: $routeCacheLifetime = isset($routeConfig["\146\151\x65\x6c\x64\x32"]) ? $routeConfig["\146\x69\145\154\144\x32"] : ''; goto Fb012; c2e7c: $route = isset($routeConfig["\x66\151\x65\x6c\144\61"]) ? trim($routeConfig["\146\151\145\154\x64\61"]) : ''; goto e5966; babb8: e9908: goto ff017; D3d3a: $this->cacheLifetime = $routeCacheLifetime; goto F3e1c; Bf2af: } goto c5c5c; d9136: $this->response->setPublicHeaders($this->cacheLifetime); goto B9650; e08b7: $this->response->setHeader("\x58\x2d\103\x61\143\x68\145\x2d\104\x65\142\165\x67", 1); goto F999a; bd670: $this->response->setHeader("\130\x2d\x4d\141\x67\145\156\x74\157\55\124\x61\x67\163", implode("\54", $tags)); goto d9136; Ed0c4: D3774: goto bfa90; a8a77: if (!($routesCacheLifetime && count($routesCacheLifetime))) { goto D3774; } goto fb2d8; a4b09: $fullActionName = $this->request->getFullActionName(); goto d5e73; B3fa5: $isDebugModeEnabled = $this->varnishConfig->isDebugModeEnabled(); goto a4b09; d5e73: $routesCacheLifetime = $this->varnishConfig->getRoutesCacheLifetime(); goto a8a77; D607f: $this->cacheLifetime = $this->varnishConfig->getDefaultCacheLifetime(); goto B3fa5; c5c5c: Edf12: goto Ed0c4; B9650: $this->response->setHeader("\130\55\x43\x61\143\x68\x65\x2d\x4c\151\146\x65\164\151\155\145", $this->cacheLifetime); goto e68c7; F999a: $this->response->setHeader("\130\55\115\x61\147\145\x6e\x74\x6f\x2d\122\x6f\165\164\x65", $fullActionName); goto F333c; F333c: f4069: goto bd670; bfa90: if (!(true === $isDebugModeEnabled)) { goto f4069; } goto e08b7; e68c7: } protected function saveUrlInformation(array $tags) { goto cad71; cad71: $canSaveUrlInformation = $this->canSaveUrlInformation(); goto Edd19; Edd19: if (!(true === $canSaveUrlInformation)) { goto b4e17; } goto ef1c7; ef1c7: try { goto f811e; E8812: $storeBaseUri = new \Zend\Uri\Uri($store->getBaseUrl()); goto aa5d4; Cf0bc: $url->loadByStoreIdAndPath($storeId, $path); goto D780d; cdbc5: $url = $objectManager->create("\x4d\x67\164\134\x56\x61\162\156\151\x73\x68\x5c\x4d\x6f\144\145\x6c\134\125\162\154"); goto Cf0bc; f4342: $cacheExpiredAt = $cacheExpiredAt->format("\131\x2d\155\x2d\144\40\x48\x3a\x69\x3a\x73"); goto C93d1; C93d1: $url->setStoreId($storeId); goto b5931; Fd6f4: $storeId = $store->getStoreId(); goto E8812; cfd24: $cacheExpiredAt = new \DateTime("\156\157\167", new \DateTimeZone("\x55\124\x43")); goto B18ea; aa5d4: $path = $this->request->getRequestUri(); goto b5810; D5ddd: $url->setTags($tags); goto C421c; C421c: $url->setCacheLifetime($this->cacheLifetime); goto Fa40e; E5cb2: $storeManager = $objectManager->get("\x5c\x4d\x61\147\145\x6e\164\157\x5c\123\164\x6f\162\145\x5c\115\x6f\x64\x65\154\134\x53\x74\x6f\x72\x65\115\x61\x6e\x61\147\145\x72\111\156\x74\145\x72\x66\141\143\145"); goto abec4; Bc532: $url = $objectManager->create("\x4d\147\x74\134\x56\141\x72\x6e\x69\x73\150\134\115\x6f\144\x65\154\x5c\x55\x72\x6c"); goto B1d2d; B7666: $url->delete(); goto Bc532; Ed391: $url->save(); goto afdcd; abec4: $store = $storeManager->getStore(); goto Fd6f4; ea245: F9c63: goto cdbc5; b5810: if (!($storeBaseUri->getPath() != "\x2f")) { goto F9c63; } goto F7ba1; F7ba1: $path = "\57" . substr($path, strlen($storeBaseUri->getPath())); goto ea245; Fa40e: $url->setCacheExpiredAt($cacheExpiredAt); goto Ed391; B1d2d: c64c2: goto cfd24; B18ea: $cacheExpiredAt->add(new \DateInterval(sprintf("\120\124\x25\163\123", $this->cacheLifetime))); goto f4342; f811e: $objectManager = $this->getObjectManager(); goto E5cb2; b5931: $url->setPath($path); goto D5ddd; D780d: if (!$url->getId()) { goto c64c2; } goto B7666; afdcd: } catch (\Exception $e) { $this->logger->critical($e); } goto Cebf0; Cebf0: b4e17: goto bf37f; bf37f: } protected function canSaveUrlInformation() { goto A9296; e4f14: $cacheWarmerRoutes = $this->varnishConfig->getCacheWarmerRoutes(); goto db0b3; a2f5a: return true; goto Dc192; d371f: if (!(false === $cacheWarmerRouteFound)) { goto B289b; } goto ab196; ddb73: adb5e: goto d371f; Cb933: return false; goto c190c; f2ec0: return false; goto f358f; C7d5d: B289b: goto a2f5a; c34c0: $cacheWarmerRouteFound = false; goto cef12; fdc58: if (!(false === $isCacheWarmerEnabled)) { goto Df61b; } goto f2ec0; B9ea9: if (!(true === $isAdminStore)) { goto B36c6; } goto A2f49; f5155: $requestParams = (array) $this->request->getQuery(); goto C398d; fe4e6: $isCacheWarmerEnabled = $this->varnishConfig->isCacheWarmerEnabled(); goto fdc58; cef12: $fullActionName = $this->request->getFullActionName(); goto e4f14; c190c: Ce3f9: goto c34c0; A2f49: return false; goto Df4b3; C398d: if (!count($requestParams)) { goto Ce3f9; } goto Cb933; f358f: Df61b: goto f5155; db0b3: foreach ($cacheWarmerRoutes as $cacheWarmerRoute) { goto a9e28; e0db2: $cacheWarmerRouteFound = true; goto d3b23; F6a56: b6f15: goto D6525; D6525: ed50f: goto A78ac; a9e28: if (!($cacheWarmerRoute == $fullActionName)) { goto b6f15; } goto e0db2; d3b23: goto adb5e; goto F6a56; A78ac: } goto ddb73; ab196: return false; goto C7d5d; A9296: $isAdminStore = $this->isAdminStore(); goto B9ea9; Df4b3: B36c6: goto fe4e6; Dc192: } protected function isAdminStore() { $isAdminStore = $this->state->getAreaCode() == self::ADMIN_AREA_CODE; return $isAdminStore; } protected function getObjectManager() { $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); return $objectManager; } }
<?php
 namespace Mgt\Varnish\Model\Cache\ResourceModel\Grid; class Collection extends \Magento\Backend\Model\Cache\ResourceModel\Grid\Collection { public function __construct(\Magento\Framework\Data\Collection\EntityFactory $entityFactory, \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList) { parent::__construct($entityFactory, $cacheTypeList); } public function loadData($printQuery = false, $logQuery = false) { goto Ded86; bd646: foreach ($cacheTypes as $type) { $this->addItem($type); f7c37: } goto D6719; D6719: de983: goto Af02f; Baa9e: $cacheTypes = $this->prepareCacheTypes($cacheTypes); goto bd646; Ded86: if ($this->isLoaded()) { goto C9fae; } goto Fd4ab; Fd4ab: $cacheTypes = $this->_cacheTypeList->getTypes(); goto Baa9e; Ef10d: return $this; goto b8a17; d8eaf: C9fae: goto Ef10d; Af02f: $this->_setIsLoaded(true); goto d8eaf; b8a17: } protected function prepareCacheTypes(array $cacheTypes) { goto F214d; F214d: $cacheTypes["\146\165\154\154\x5f\160\141\x67\145"]->setCacheType("\x4d\107\124\x20\126\141\162\156\151\x73\150\40\103\x61\143\150\145"); goto b94e3; b94e3: $cacheTypes["\146\165\154\154\x5f\x70\x61\x67\145"]->setDescription("\126\x61\x72\x6e\x69\x73\x68\x20\x43\x61\143\150\x65\40\x70\x72\157\x76\151\144\145\x64\40\142\x79\x20\x4d\x47\124\55\x43\x4f\115\115\x45\x52\103\x45"); goto e447d; e447d: return $cacheTypes; goto Bf1a5; Bf1a5: } }
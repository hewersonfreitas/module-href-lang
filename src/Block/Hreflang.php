<?php

namespace Href\Lang\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\Locale\Resolver;
use \Magento\Cms\Model\Page;

class Hreflang extends \Magento\Framework\View\Element\Template
{
    protected $_storeManager;
    /**
     * @var Resolver
     */
    protected $_locale;

    /**
     * @var Page
     */
    protected $_cmsPage;

    /**
     * Hreflang constructor.
     * @param Template\Context $context
     * @param Resolver $locale
     * @param Page $page
     * @param array $data
     */
    public function __construct(Template\Context $context, Resolver $locale, Page $cmsPage, array $data = [])
    {
        $this->_storeManager = $context->getStoreManager();
        $this->_locale = $locale;
        $this->_cmsPage = $cmsPage;
        parent::__construct($context, $data);
    }

    /**
     * get locale and conver format country-lang
     * @return string
     */
    public function getLanguageStore()
    {
        return strtolower(str_replace("_", "-", $this->_locale->getLocale()));
    }

    /**
     * Count and check is multi-store
     * @return bool
     */
    public function isCmsPageMultiStore()
    {
        $storesCms = $this->_cmsPage->getStores();
        return ($storesCms[0] == 0 || count($storesCms) > 1) ?? false;
    }

    /**
     * Get current url cms page concat with indentifier
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getCurrentUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl() . $this->_cmsPage->getIdentifier();
    }

    /**
     * return html from meta-tag
     * @return string
     */
    public function getMetaTagHrefLanguage()
    {
        // if multi-store display meta-tag
        if (self::isCmsPageMultiStore())
            return sprintf('<link rel="alternate" hreflang="%s" href="%s">', self::getLanguageStore(), self::getCurrentUrl());

        return __("");
    }
}

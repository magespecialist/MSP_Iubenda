<?php
/**
 * MageSpecialist
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to info@magespecialist.it so we can send you a copy immediately.
 *
 * @copyright  Copyright (c) 2018 Skeeller srl (http://www.magespecialist.it)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace MSP\Iubenda\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config
{

    const XML_PATH_ENABLED = 'msp_iubenda/general/enabled';
    const XML_PATH_POLICY_ID = 'msp_iubenda/general/policy_id';
    const XML_PATH_TEXT_AFTER_LINK = 'msp_iubenda/general/text_after_link';
    const XML_PATH_TEXT_BEFORE_LINK = 'msp_iubenda/general/text_before_link';
    const XML_PATH_TEXT_LINK = 'msp_iubenda/general/text_link';

    private $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig
    )
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_ENABLED, ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return string
     */
    public function getTextAfterLink()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_TEXT_AFTER_LINK, ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return string
     */
    public function getTextBeforeLink()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_TEXT_BEFORE_LINK, ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return string
     */
    public function getLinkText()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_TEXT_LINK, ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return string
     */
    public function getPolicyId()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_POLICY_ID, ScopeInterface::SCOPE_STORE);
    }

}

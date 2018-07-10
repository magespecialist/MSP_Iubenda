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
 * @copyright  Copyright (c) 2017 Skeeller srl (http://www.magespecialist.it)
 *
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace MSP\Iubenda\Block;

class Iubenda extends \Magento\Framework\View\Element\Template
{
    const XML_PATH_ENABLED = 'msp_iubenda/general/enabled';
    const XML_PATH_POLICY_ID = 'msp_iubenda/general/policy_id';
    const XML_PATH_TEXT_AFTER_LINK = 'msp_iubenda/general/text_after_link';
    const XML_PATH_TEXT_BEFORE_LINK = 'msp_iubenda/general/text_before_link';
    const XML_PATH_TEXT_LINK = 'msp_iubenda/general/text_link';

    /**
     * @var boolean
     */
    private $isEnabled;

    /**
     * @var integer
     */
    private $policyId;

    /**
     * @var string
     */
    private $textAfterLink;

    /**
     * @var string
     */
    private $textBeforeLink;

    /**
     * @var string
     */
    private $textLink;
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    private $scopeConfigInterface;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        $this->scopeConfigInterface = $context->getScopeConfig();

        $this->isEnabled = (boolean)$this->scopeConfigInterface->getValue(self::XML_PATH_ENABLED);
        $this->policyId = (integer)$this->scopeConfigInterface->getValue(self::XML_PATH_POLICY_ID);
        $this->textAfterLink = (string)$this->scopeConfigInterface->getValue(self::XML_PATH_TEXT_AFTER_LINK);
        $this->textBeforeLink = (string)$this->scopeConfigInterface->getValue(self::XML_PATH_TEXT_BEFORE_LINK);
        $this->textLink = (string)$this->scopeConfigInterface->getValue(self::XML_PATH_TEXT_LINK);

        parent::__construct(
            $context,
            $data
        );
    }

    /**
     * @return bool
     */
    public function exist()
    {
        return $this->isEnabled && $this->policyId;
    }

    /**
     * @return int
     */
    public function getPolicyId()
    {
        return $this->policyId;
    }

    /**
     * @return string
     */
    public function getTextAfterLink()
    {
        return $this->textAfterLink;
    }

    /**
     * @return string
     */
    public function getTextBeforeLink()
    {
        return $this->textBeforeLink;
    }

    /**
     * @return string
     */
    public function getTextLink()
    {
        return $this->textLink;
    }
}

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

use MSP\Iubenda\Model\Config;

class Iubenda extends \Magento\Framework\View\Element\Template
{

    private $config;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        Config $config,
        array $data = []
    ) {

        $this->config = $config;
        parent::__construct($context, $data);
    }

    /**
     * @return bool
     */
    public function exist()
    {
        return $this->config->isEnabled() && !empty($this->getPolicyId());
    }

    /**
     * @return int
     */
    public function getPolicyId()
    {
        return $this->config->getPolicyId();
    }

    /**
     * @return string
     */
    public function getTextAfterLink()
    {
        return $this->config->getTextAfterLink();
    }

    /**
     * @return string
     */
    public function getTextBeforeLink()
    {
        return $this->config->getTextBeforeLink();
    }

    /**
     * @return string
     */
    public function getTextLink()
    {
        return $this->config->getLinkText();
    }
}

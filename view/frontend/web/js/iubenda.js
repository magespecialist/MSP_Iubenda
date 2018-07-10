/*
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

define([
    "jquery",
    'jquery/jquery.cookie'
], function($){
    return function (config) {

        var check_cookie = $.cookie('msp_iubenda');

        if (!check_cookie) {
            $("#iubenda-container").slideDown();

            $("#iubenda-container .close").click(function () {
                var date = new Date();
                date.setTime(date.getTime() + (365 * 24 * 60 * 60 * 1000));
                $.cookie('msp_iubenda', 'ok', {expires: date});
                $("#iubenda-container").slideUp();
            });
            $(window).scroll(function(){
                $("#iubenda-container").slideUp();
            });
        }

    }
});

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
    var give_consent = function() {
        if (check_cookie()) return;
        var date = new Date();
        date.setTime(date.getTime() + (365 * 24 * 60 * 60 * 1000));
        $.cookie('msp_iubenda', 'ok', {expires: date});
    }

    var check_cookie = function() {
        return $.cookie('msp_iubenda');
    }

    var close_container = function() {
        $("#iubenda-container").slideUp();
    }

    var open_container = function() {
        $("#iubenda-container").slideDown();
    }

    return function (config) {

        if (!check_cookie()) {
            open_container();

            $("#iubenda-container .close").click(function () {
                give_consent();
                close_container();

            });
            $(window).scroll(function(){
                give_consent();
                close_container();
            });
            $(document).click(function(event) {
               if (!$(event.target).closest("#iubenda-container").length) {
                   give_consent();
                   close_container();
               }
            });
        }

    }
});

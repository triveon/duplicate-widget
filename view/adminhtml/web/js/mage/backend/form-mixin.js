define(['jquery'], function ($) {
    'use strict';

    var formWidgetMixin = {
        options: {
            handlersData: {
                saveAndDuplicate: {
                    action: {
                        args: {
                            back: 'duplicate'
                        }
                    }
                }
            }
        }
    };

    return function (formWidget) {
        $.widget('mage.form', formWidget, formWidgetMixin);

        return $.mage.form;
    };
});

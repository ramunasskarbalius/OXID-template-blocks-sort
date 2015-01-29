(function ($) {
    saveBlocks = {

        options: {
            formId: "#blocksList"
        },
        _create: function () {

            var self = this;
            $(self.options.formId + " input[type=submit]").click(function (e) {
                $(self.options.formId).animate({
                    opacity: 0.2
                });

                e.preventDefault();

                self._saveBlocks(self._getBlocks($(this).parent(), "enabled"), self._getBlocks($(this).parent(), "disabled"));
            });

        },

        /**
         * Save blocks information
         * @param {Array} enabled
         * @param {Array} disabled
         * @private
         */
        _saveBlocks: function (enabled, disabled) {
            var self = this;
            $.post("", {enabled: enabled, disabled: disabled}, function (data) {
                $(self.options.formId).animate({
                    opacity: 1.0
                });
            });
        },

        /**
         * To get blocks modules ids by type
         * @param parent
         * @param blockType
         * @returns {Array}
         * @private
         */
        _getBlocks: function (parent, blockType) {
            var blocks = [];


            parent.find("input[name='sort[" + parent.find("ul").attr('class').split(" ")[0] + "][" + blockType + "][]']").each(function () {
                blocks.push($(this).val());
            });
            return blocks;
        }
    }

    $.widget("ui.saveBlocks", saveBlocks);

})(jQuery);
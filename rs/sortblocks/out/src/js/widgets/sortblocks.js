(function ($) {
    sortBlocks = {

        options: {
            enabledBlocks: "",
            disabledBlocks: "",
            connectWith: "",
            disabledStyle: "ui-state-highlight",
            enabledStyle: "ui-state-default"
        },

        _create: function () {

            var self = this,
                listas = $(self.options.enabledBlocks + ", " + self.options.disabledBlocks).sortable({
                    connectWith: self.options.connectWith,
                    stop: function () {
                        listas.each(function () {
                            self._updateBlocksStatus($(this))
                        });

                    }
                }).disableSelection();
        },

        /**
         * Update blocks status
         * @param blocksContainer
         * @private
         */
        _updateBlocksStatus: function (blocksContainer) {

            var self = this,
                needsDisable = blocksContainer.attr("class").indexOf("_el1")

            blocksContainer.find("li").each(function () {
                if (needsDisable <= 0) {
                    self._disableBlock($(this));
                } else {
                    self._enableBlock($(this));
                }
            });
        },

        /**
         * Handle block on disable
         * @param blockContainer
         * @private
         */
        _disableBlock: function (blockContainer) {
            var self = this,
                inputEl = blockContainer.find("input");

            inputEl.attr("name", inputEl.attr("name").replace("enabled", "disabled"));
            blockContainer.addClass(self.options.disabledStyle);
        },

        /**
         * Handle block on enable
         * @param blockContainer
         * @private
         */
        _enableBlock: function (blockContainer) {
            var self = this,
                inputEl = blockContainer.find("input");

            inputEl.attr("name", inputEl.attr("name").replace("disabled", "enabled"));
            blockContainer.removeClass(self.options.disabledStyle).addClass(self.options.enabledStyle);
        }
    }

    $.widget("ui.sortBlocks", sortBlocks);

})
(jQuery);
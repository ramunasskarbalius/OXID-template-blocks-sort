<?php

class RsSortBlocks extends oxAdminView
{
    /**
     * Active template
     * @var string
     */
    protected $_sThisTemplate = "rssortblocks.tpl";

    /**
     * Loaded blocks list
     * @var array
     */
    protected $list = null;

    /**
     * Render view
     *
     * @return string
     */
    public function render()
    {
        $enabled = oxRegistry::getConfig()->getRequestParameter("enabled");
        if ($enabled !== null && count($enabled) > 0) {
            foreach ($enabled as $position => $block) {
                $blockObject = oxNew("rsOxBlock");
                $blockObject->load($block);
                $blockObject->setOxActive(1);
                $blockObject->setOxPos($position);
                $blockObject->save();
            }
        }

        $disabled = oxRegistry::getConfig()->getRequestParameter("disabled");

        if ($disabled !== null && count($disabled) > 0) {

            foreach ($disabled as $block) {
                $blockObject = oxNew("rsOxBlock");
                $blockObject->load($block);
                $blockObject->setOxActive(0);
                $blockObject->save();
            }
        }

        return parent::render();
    }

    /**
     * To get blocks list
     *
     * @return array()
     */
    public function getBlocksList()
    {
        if ($this->list === null) {
            $list = oxNew("RsOxBlocksList");
            $list->setSorting("OXBLOCKNAME ASC, OXPOS ASC");
            $list->load();
            $list->groupByBlockName();
            $this->list = $list->getGroupedList();;
        }

        return $this->list;
    }
}
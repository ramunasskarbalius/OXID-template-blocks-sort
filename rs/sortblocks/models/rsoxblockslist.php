<?php

class RsOxBlocksList
{
    protected $sortBy = "OXID ASC";
    protected $list = array();
    protected $groupedList = array();

    /**
     * To load all blocks
     */
    public function load()
    {
        $db = oxDb::getDb(oxDb::FETCH_MODE_ASSOC);
        $query = "SELECT * FROM oxtplblocks order by " . $this->sortBy;
        $result = $db->getAll($query);

        foreach ($result as $blockData) {
            $block = oxNew("rsOxBlock");
            $block->assign($blockData);
            $this->appendToList($block);
        }
    }

    /**
     * To set sorting
     *
     * @param string $sortBy
     */
    public function setSorting($sortBy)
    {
        $this->sortBy = $sortBy;
    }

    /**
     * To get loaded list
     * @return array
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * Add new element to list
     *
     * @param rsOxBlock $element
     */
    public function appendToList($element)
    {
        $this->list[] = $element;
    }

    /**
     * To group blocks by name
     */
    public function groupByBlockName()
    {
        foreach ($this->list as $block) {
            if (!isset($this->groupedList[$block->getOxBlockName()])) {
                $this->groupedList[$block->getOxBlockName()] = array($block);
            } else {
                array_push($this->groupedList[$block->getOxBlockName()], $block);
            }
        }
    }

    /**
     * To get grouped blocks list
     *
     * @return array
     */
    public function getGroupedList()
    {
        return $this->groupedList;
    }
}
<?php

class RsOxBlock
{
    protected $oxid = "";
    protected $oxActive = "";
    protected $oxShopId = "";
    protected $oxTemplate = "";
    protected $oxBlockName = "";
    protected $oxPos = "";
    protected $oxFile = "";
    protected $oxmodule = "";
    protected $oxTimeStamp = "";

    /**
     * Load block using OXID
     *
     * @param string $blockId
     */
    public function load($blockId)
    {
        $db = oxDb::getDb(oxDb::FETCH_MODE_ASSOC);
        $query = "select * from oxtplblocks where OXID='" . $blockId . "'";
        $this->assign($db->getRow($query));
    }

    /**
     * To save block information
     */
    public function save()
    {
        if ($this->getOxid() != "") {
            $query = "UPDATE oxtplblocks set
              OXACTIVE='" . $this->getOxActive() . "',
              OXPOS='" . $this->getOxPos() . "'
              WHERE OXID='" . $this->getOxid() . "'";
            $db = oxDb::getDb(oxDb::FETCH_MODE_ASSOC);
            $db->execute($query);
        }
    }

    /**
     * To set OXID
     * @param string $oxid
     */
    public function setOxid($oxid)
    {
        $this->oxid = $oxid;
    }

    /**
     * To get OXID id
     *
     * @return string
     */
    public function getOxid()
    {
        return $this->oxid;
    }

    /**
     * To set module status is active or not
     *
     * @param int $oxActive
     */
    public function setOxActive($oxActive)
    {
        $this->oxActive = $oxActive;
    }

    /**
     * To get module status is active or not
     *
     * @return string
     */
    public function getOxActive()
    {
        return $this->oxActive;
    }

    /**
     * To set shop id
     *
     * @param int $oxShopId
     */
    public function setOxShopId($oxShopId)
    {
        $this->oxShopId = $oxShopId;
    }

    /**
     * To get shop id
     *
     * @return string
     */
    public function getOxShopId()
    {
        return $this->oxShopId;
    }

    /**
     * To set template path
     *
     * @param string $oxTemplate
     */
    public function setOxTemplate($oxTemplate)
    {
        $this->oxTemplate = $oxTemplate;
    }

    /**
     * To get template name
     *
     * @return string
     */
    public function getOxTemplate()
    {
        return $this->oxTemplate;
    }

    /**
     * To set oxblock name
     *
     * @param string $oxBlockName
     */
    public function setOxBlockName($oxBlockName)
    {
        $this->oxBlockName = $oxBlockName;
    }

    /**
     * To get oxblock name
     *
     * @return string
     */
    public function getOxBlockName()
    {
        return $this->oxBlockName;
    }

    /**
     * To set oxPost
     *
     * @param string $oxPos
     */
    public function setOxPos($oxPos)
    {
        $this->oxPos = $oxPos;
    }

    /**
     * To get oxPos
     * @return string
     */
    public function getOxPos()
    {
        return $this->oxPos;
    }

    /**
     * To set oxfile
     *
     * @param string $oxFile
     */
    public function setOxFile($oxFile)
    {
        $this->oxFile = $oxFile;
    }

    /**
     * To get oxFile
     *
     * @return string
     */
    public function getOxFile()
    {
        return $this->oxFile;
    }

    /**
     * To set module name
     *
     * @param string $oxModule module name
     */
    public function setOxModule($oxModule)
    {
        $this->oxmodule = $oxModule;
    }

    /**
     * To get module name
     *
     * @return string
     */
    public function getOxModule()
    {
        return $this->oxmodule;
    }

    /**
     * To set oxTimeStamp
     *
     * @param string $oxTimeStamp
     */
    public function setOxTimeStamp($oxTimeStamp)
    {
        $this->oxTimeStamp = $oxTimeStamp;
    }

    /**
     * To get oxTimeStamp
     * @return string
     */
    public function getOxTimeStamp()
    {
        return $this->oxTimeStamp;
    }

    /**
     * To assign block information
     *
     * @param array $data
     */
    public function assign($data)
    {
        $this->setOxid($data["OXID"]);
        $this->setOxActive($data["OXACTIVE"]);
        $this->setOxShopId($data["OXSHOPID"]);
        $this->setOxTemplate($data["OXTEMPLATE"]);
        $this->setOxBlockName($data["OXBLOCKNAME"]);
        $this->setOxPos($data["OXPOS"]);
        $this->setOxFile($data["OXFILE"]);
        $this->setOXMODULE($data["OXMODULE"]);
        $this->setOxTimeStamp($data["OXTIMESTAMP"]);
    }
}
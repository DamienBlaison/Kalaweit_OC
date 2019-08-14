<?php
namespace Model;

/**
 *
 */

class Asso_donation
{
    protected $don_id       = "";
    protected $brk_id       = "";
    protected $cli_id       = "";
    protected $cau_id       = "";
    protected $spo_id       = "";
    protected $don_desc     = "";
    protected $don_ts       = "";
    protected $don_status   = "";
    protected $don_mnt      = "";
    protected $ptyp_id      = "";
    protected $don_support  = "";

    /**
     * Get the value of Don Id
     *
     * @return mixed
     */
    public function getDonId()
    {
        return $this->don_id;
    }

    /**
     * Set the value of Don Id
     *
     * @param mixed don_id
     *
     * @return self
     */
    public function setDonId($don_id)
    {
        $this->don_id = $don_id;

        return $this;
    }

    /**
     * Get the value of Brk Id
     *
     * @return mixed
     */
    public function getBrkId()
    {
        return $this->brk_id;
    }

    /**
     * Set the value of Brk Id
     *
     * @param mixed brk_id
     *
     * @return self
     */
    public function setBrkId($brk_id)
    {
        $this->brk_id = $brk_id;

        return $this;
    }

    /**
     * Get the value of Cli Id
     *
     * @return mixed
     */
    public function getCliId()
    {
        return $this->cli_id;
    }

    /**
     * Set the value of Cli Id
     *
     * @param mixed cli_id
     *
     * @return self
     */
    public function setCliId($cli_id)
    {
        $this->cli_id = $cli_id;

        return $this;
    }

    /**
     * Get the value of Cau Id
     *
     * @return mixed
     */
    public function getCauId()
    {
        return $this->cau_id;
    }

    /**
     * Set the value of Cau Id
     *
     * @param mixed cau_id
     *
     * @return self
     */
    public function setCauId($cau_id)
    {
        $this->cau_id = $cau_id;

        return $this;
    }

    /**
     * Get the value of Spo Id
     *
     * @return mixed
     */
    public function getSpoId()
    {
        return $this->spo_id;
    }

    /**
     * Set the value of Spo Id
     *
     * @param mixed spo_id
     *
     * @return self
     */
    public function setSpoId($spo_id)
    {
        $this->spo_id = $spo_id;

        return $this;
    }

    /**
     * Get the value of Don Desc
     *
     * @return mixed
     */
    public function getDonDesc()
    {
        return $this->don_desc;
    }

    /**
     * Set the value of Don Desc
     *
     * @param mixed don_desc
     *
     * @return self
     */
    public function setDonDesc($don_desc)
    {
        $this->don_desc = $don_desc;

        return $this;
    }

    /**
     * Get the value of Don Ts
     *
     * @return mixed
     */
    public function getDonTs()
    {
        return $this->don_ts;
    }

    /**
     * Set the value of Don Ts
     *
     * @param mixed don_ts
     *
     * @return self
     */
    public function setDonTs($don_ts)
    {
        $this->don_ts = $don_ts;

        return $this;
    }

    /**
     * Get the value of Don Status
     *
     * @return mixed
     */
    public function getDonStatus()
    {
        return $this->don_status;
    }

    /**
     * Set the value of Don Status
     *
     * @param mixed don_status
     *
     * @return self
     */
    public function setDonStatus($don_status)
    {
        $this->don_status = $don_status;

        return $this;
    }

    /**
     * Get the value of Don Mnt
     *
     * @return mixed
     */
    public function getDonMnt()
    {
        return $this->don_mnt;
    }

    /**
     * Set the value of Don Mnt
     *
     * @param mixed don_mnt
     *
     * @return self
     */
    public function setDonMnt($don_mnt)
    {
        $this->don_mnt = $don_mnt;

        return $this;
    }

    /**
     * Get the value of Ptyp Id
     *
     * @return mixed
     */
    public function getPtypId()
    {
        return $this->ptyp_id;
    }

    /**
     * Set the value of Ptyp Id
     *
     * @param mixed ptyp_id
     *
     * @return self
     */
    public function setPtypId($ptyp_id)
    {
        $this->ptyp_id = $ptyp_id;

        return $this;
    }

    /**
     * Get the value of Don Support
     *
     * @return mixed
     */
    public function getDonSupport()
    {
        return $this->don_support;
    }

    /**
     * Set the value of Don Support
     *
     * @param mixed don_support
     *
     * @return self
     */
    public function setDonSupport($don_support)
    {
        $this->don_support = $don_support;

        return $this;
    }

}

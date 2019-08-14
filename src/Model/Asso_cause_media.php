<?php
namespace Model;

/**
 *
 * @author jeromeklam
 *
 */
class Asso_cause_media
{

    public function __construct($p_media_type = null, $p_media_type_detail = null)
    {
        $this->media_type        = $p_media_type;
        $this->media_type_detail = $p_media_type_detail;
    }
}

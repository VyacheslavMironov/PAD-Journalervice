<?php

namespace app\DTO;

class UserGroupShowIsNotDTO
{
    public int $organization_id;
    public int $filial_id;
    public int $group_id;

    public function __construct($organization_id, $filial_id, $group_id)
    {
        $this->organization_id = $organization_id;
        $this->filial_id = $filial_id;
        $this->group_id = $group_id;
    }
}

<?php

namespace app\DTO;

class GroupListDTO
{
    public int $organization_id;
    public int|null $filial_id;

    public function __construct($organization_id, $filial_id)
    {
        $this->organization_id = $organization_id;
        $this->filial_id = $filial_id;
    }
}

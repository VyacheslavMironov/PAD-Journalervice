<?php

namespace app\DTO;

class GroupCreateDTO
{
    public int $organization_id;
    public int $filial_id;
    public string $name;
    public string $created_at;

    public function __construct($organization_id, $filial_id, $name, $created_at)
    {
        $this->organization_id = $organization_id;
        $this->filial_id = $filial_id;
        $this->name = $name;
        $this->created_at = $created_at;
    }
}

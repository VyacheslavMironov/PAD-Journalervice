<?php

namespace app\DTO;

class UserGroupRemoveDTO
{
    public int $organization_id;
    public int $filial_id;
    public int $user_id;
    public int $group_id;

    public function __construct($organization_id, $filial_id, $user_id, $group_id)
    {
        $this->organization_id = $organization_id;
        $this->filial_id = $filial_id;
        $this->user_id = $user_id;
        $this->group_id = $group_id;
    }
}

<?php

namespace app\Service;

use ErrorException;
use app\DTO\GroupCreateDTO;
use app\Repository\GroupCreateRepository;

class GroupCreateService
{
    public function create($request)
    {
        if (is_null($request->post('organization_id')))
        {
            throw new ErrorException('Укажите ID организации!');
        } 
        elseif (is_null($request->post('filial_id')))
        {
            throw new ErrorException('Укажите ID филиала!');
        }
        elseif (is_null($request->post('name')))
        {
            throw new ErrorException('Укажите название группы!');
        }
        else {
            $repository = new GroupCreateRepository();
            // Тут в принцепе ошибки быть не может
            return $repository->create(
                new GroupCreateDTO(
                    $request->post('organization_id'),
                    $request->post('filial_id'),
                    $request->post('name'),
                    date('Y/m/d h:i:s', time())
                )
            );
        }
    }
}
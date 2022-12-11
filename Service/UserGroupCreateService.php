<?php

namespace app\Service;

use ErrorException;
use app\DTO\UserGroupCreateDTO;
use app\Repository\UserGroupCreateRepository;

class UserGroupCreateService
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
        elseif (is_null($request->post('user_id')))
        {
            throw new ErrorException('Укажите ID студента!');
        }
        elseif (is_null($request->post('group_id')))
        {
            throw new ErrorException('Укажите ID группы!');
        }
        else {
            $repository = new UserGroupCreateRepository();
            // Тут в принцепе ошибки быть не может
            return $repository->create(
                new UserGroupCreateDTO(
                    $request->post('organization_id'),
                    $request->post('filial_id'),
                    $request->post('user_id'),
                    $request->post('group_id'),
                    date('Y/m/d h:i:s', time())
                )
            );
        }
    }
}
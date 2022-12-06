<?php

namespace app\Service;

use ErrorException;
use app\DTO\UserGroupRemoveDTO;
use app\Repository\UserGroupRemoveRepository;

class UserGroupRemoveService
{
    public function remove($request)
    {
        if (is_null($request->get('organization_id')))
        {
            throw new ErrorException('Укажите ID организации!');
        }
        elseif (is_null($request->get('filial_id')))
        {
            throw new ErrorException('Укажите ID филиала!');
        }
        elseif (is_null($request->get('user_id')))
        {
            throw new ErrorException('Укажите ID студента который состоит в этой группе!');
        }
        elseif (is_null($request->get('group_id')))
        {
            throw new ErrorException('Укажите ID группы!');
        }
        else {
            $repository = new UserGroupRemoveRepository();
            // Тут в принцепе ошибки быть не может
            return $repository->remove(
                new UserGroupRemoveDTO(
                    $request->get('organization_id'),
                    $request->get('filial_id'),
                    $request->get('user_id'),
                    $request->get('group_id')
                )
            );
        }
    }
}
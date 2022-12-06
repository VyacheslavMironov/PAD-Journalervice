<?php

namespace app\Service;

use ErrorException;
use app\DTO\UserGroupShowDTO;
use app\Repository\UserGroupShowRepository;

class UserGroupShowService
{
    public function show($request)
    {
        if (is_null($request->get('organization_id')))
        {
            throw new ErrorException('Укажите ID организации!');
        }
        elseif (is_null($request->get('filial_id')))
        {
            throw new ErrorException('Укажите ID филиала!');
        }
        elseif (is_null($request->get('group_id')))
        {
            throw new ErrorException('Укажите ID группы!');
        }
        else {
            $repository = new UserGroupShowRepository();
            // Тут в принцепе ошибки быть не может
            return $repository->show(
                new UserGroupShowDTO(
                    $request->get('organization_id'),
                    $request->get('filial_id'),
                    $request->get('group_id')
                )
            );
        }
    }
}
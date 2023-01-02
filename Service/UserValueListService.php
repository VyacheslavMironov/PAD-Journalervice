<?php

namespace app\Service;

use ErrorException;
use app\DTO\UserValueListDTO;
use app\Repository\UserValueListRepository;

class UserValueListService
{
    public function show($request)
    {
        if (is_null($request->get('organization_id')))
        {
            throw new ErrorException('Укажите ID организации!');
        }
        elseif (is_null($request->get('user_id')))
        {
            throw new ErrorException('Укажите ID студента!');
        }
        elseif (is_null($request->get('month')))
        {
            throw new ErrorException('Укажите месяц!');
        }
        elseif (is_null($request->get('year')))
        {
            throw new ErrorException('Укажите год!');
        }
        else {
            $repository = new UserValueListRepository();
            // Тут в принцепе ошибки быть не может
            return$repository->show(
                new UserValueListDTO(
                    $request->get('organization_id'),
                    $request->get('user_id'),
                    $request->get('month'),
                    $request->get('year')
                )
            );
        }
    }
}

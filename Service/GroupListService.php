<?php

namespace app\Service;

use ErrorException;
use app\DTO\GroupListDTO;
use app\Repository\GroupListRepository;

class GroupListService
{
    public function list($request)
    {
        if (is_null($request->get('organization_id')))
        {
            throw new ErrorException('Укажите ID организации!');
        } 
        else {
            $repository = new GroupListRepository();
            // Тут в принцепе ошибки быть не может
            return $repository->list(
                new GroupListDTO(
                    $request->get('organization_id'),
                    $request->get('filial_id')
                )
            );
        }
    }
}
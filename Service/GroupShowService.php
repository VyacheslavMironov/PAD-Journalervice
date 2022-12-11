<?php

namespace app\Service;

use ErrorException;
use app\DTO\GroupShowDTO;
use app\Repository\GroupShowRepository;

class GroupShowService
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
        elseif (is_null($request->get('id')))
        {
            throw new ErrorException('Укажите ID группы!');
        }
        else {
            $repository = new GroupShowRepository();
            // Тут в принцепе ошибки быть не может
            return $repository->show(
                new GroupShowDTO(
                    $request->get('organization_id'),
                    $request->get('filial_id'),
                    $request->get('id')
                )
            );
        }
    }
}
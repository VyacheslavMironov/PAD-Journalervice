<?php

namespace app\Service;

use ErrorException;
use app\DTO\GroupDeleteDTO;
use app\Repository\GroupDeleteRepository;

class GroupDeleteService
{
    public function delete($request)
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
            $repository = new GroupDeleteRepository();
            // Тут в принцепе ошибки быть не может
            return $repository->delete(
                new GroupDeleteDTO(
                    $request->get('organization_id'),
                    $request->get('filial_id'),
                    $request->get('id')
                )
            );
        }
    }
}
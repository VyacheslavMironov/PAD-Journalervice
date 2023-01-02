<?php

namespace app\Service;

use ErrorException;
use app\DTO\StatementsListDTO;
use app\Repository\StatementsListRepository;

class StatementsListService
{
    public function list($request)
    {
        if (is_null($request->get('user_id')))
        {
            throw new ErrorException('Укажите ID студента!');
        } 
        elseif (is_null($request->get('lesson_id')))
        {
            throw new ErrorException('Укажите ID предмета!');
        }
        elseif (is_null($request->get('month')))
        {
            throw new ErrorException('Укажите номер месяца!');
        }
        elseif (is_null($request->get('year')))
        {
            throw new ErrorException('Укажите год!');
        }
        else {
            $repository = new StatementsListRepository();
            // Тут в принцепе ошибки быть не может
            return $repository->list(
                new StatementsListDTO(
                    $request->get('user_id'),
                    $request->get('lesson_id'),
                    $request->get('month'),
                    $request->get('year'),
                )
            );
        }
    }
}
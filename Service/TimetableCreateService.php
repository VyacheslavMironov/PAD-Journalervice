<?php

namespace app\Service;

use ErrorException;
use app\DTO\TimetableCreateDTO;
use app\Repository\TimetableCreateRepository;

class TimetableCreateService
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
        elseif (is_null($request->post('group_id')))
        {
            throw new ErrorException('Укажите ID группы!');
        }
        elseif (is_null($request->post('lesson_id')))
        {
            throw new ErrorException('Укажите ID предмета!');
        }
        elseif (is_null($request->post('teacher_id')))
        {
            throw new ErrorException('Укажите ID преподавателя!');
        }
        elseif (is_null($request->post('day_in')))
        {
            throw new ErrorException('Укажите день проведения предмета!');
        }
        elseif (is_null($request->post('time_to')))
        {
            throw new ErrorException('Укажите когда по времени начнётся предмет!');
        }
        elseif (is_null($request->post('time_end')))
        {
            throw new ErrorException('Укажите когда по времени закончится предмет!');
        }
        else {
            $repository = new TimetableCreateRepository();
            // Тут в принцепе ошибки быть не может
            return $repository->create(
                new TimetableCreateDTO(
                    $request->post('organization_id'),
                    $request->post('filial_id'),
                    $request->post('group_id'),
                    $request->post('lesson_id'),
                    $request->post('teacher_id'),
                    $request->post('day_in'),
                    $request->post('time_to'),
                    $request->post('time_end')
                )
            );
        }
    }
}
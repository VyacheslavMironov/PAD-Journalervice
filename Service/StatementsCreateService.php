<?php

namespace app\Service;

use ErrorException;
use app\DTO\StatementsCreateDTO;
use app\DTO\StatementsShowDTO;
use app\DTO\StatementsUpdateDTO;
use app\Repository\StatementsCreateRepository;
use app\Repository\StatementsShowRepository;
use app\Repository\StatementsUpdateRepository;

class StatementsCreateService
{
    public function show($request)
    {
        if (is_null($request->post('user_id')))
        {
            throw new ErrorException('Укажите ID студента!');
        } 
        elseif (is_null($request->post('lesson_id')))
        {
            throw new ErrorException('Укажите ID предмета!');
        }
        elseif (is_null($request->post('day')))
        {
            throw new ErrorException('Укажите день!');
        }
        elseif (is_null($request->post('month')))
        {
            throw new ErrorException('Укажите месяц!');
        }
        elseif (is_null($request->post('year')))
        {
            throw new ErrorException('Укажите год!');
        } else {
            $repository = new StatementsShowRepository();
            // Тут в принцепе ошибки быть не может
            return $repository->show(
                new StatementsShowDTO(
                    $request->post('user_id'),
                    $request->post('lesson_id'),
                    $request->post('day'),
                    $request->post('month'),
                    $request->post('year')
                )
            );
        }
    }

    public function update($request, $id)
    {
        if (is_null($id))
        {
            throw new ErrorException('Укажите ID записи!');
        } 
        elseif (is_null($request->post('user_from')))
        {
            throw new ErrorException('Укажите ID преподавателя или администратора!');
        }
        elseif (is_null($request->post('value')))
        {
            throw new ErrorException('Укажите оценочную единицу!');
        } else {
            $repository = new StatementsUpdateRepository();
            // Тут в принцепе ошибки быть не может
            return $repository->update(
                new StatementsUpdateDTO(
                    $id,
                    $request->post('user_from'),
                    $request->post('value'),
                    date('Y/m/d h:i:s', time()),   // updated_at
                )
            );
        }
    }

    public function create($request)
    {
        try
        {
            $show = $this->show($request);
            return $this->update($request, $show->id);
        } catch (ErrorException)
        {
            if (is_null($request->post('user_id')))
            {
                throw new ErrorException('Укажите ID студента!');
            } 
            elseif (is_null($request->post('lesson_id')))
            {
                throw new ErrorException('Укажите ID предмета!');
            }
            elseif (is_null($request->post('user_from')))
            {
                throw new ErrorException('Укажите ID преподавателя или администратора!');
            }
            elseif (is_null($request->post('evaluation_type')))
            {
                throw new ErrorException('Укажите тип оценочной единицы!');
            }
            elseif (is_null($request->post('value')))
            {
                throw new ErrorException('Укажите оценочную единицу!');
            }
            elseif (is_null($request->post('day')))
            {
                throw new ErrorException('Укажите день!');
            }
            elseif (is_null($request->post('month')))
            {
                throw new ErrorException('Укажите месяц!');
            }
            elseif (is_null($request->post('year')))
            {
                throw new ErrorException('Укажите год!');
            }
            else {
                $repository = new StatementsCreateRepository();
                // Тут в принцепе ошибки быть не может
                return $repository->create(
                    new StatementsCreateDTO(
                        $request->post('user_id'),
                        $request->post('lesson_id'),
                        $request->post('user_from'),
                        $request->post('evaluation_type'),
                        $request->post('value'),
                        $request->post('day'),
                        $request->post('month'),
                        $request->post('year'),
                        date('Y/m/d h:i:s', time()),   // created_at + updated_at
                    )
                );
            }
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Labels;
use App\Models\EntityLabels;
use App\Models\Entities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LabelsController extends Controller
{
    public function getLabels($entityId, $entityType)
    {
        // Проверяем, существует ли сущность с указанным типом и идентификатором
        $entity = Entities::where('type', $entityType)->find($entityId);

        // Если сущность не найдена, генерируем ошибку
        if (!$entity) {
            throw new \InvalidArgumentException('Сущность не найдена');
        }

        // Получаем все метки для найденной сущности
        $labels = $entity->labels()->get();

        // Возвращаем найденные метки
        return dd($labels->toArray());
    }

}

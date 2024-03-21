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
    {   // Пример в строке запроса http://127.0.0.1/labels/get/1/user

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

    public function updateLabels($entityId, $entityType, $labels)
    {
        // http://127.0.0.1/labels/update/1/user/rhkjf,rwerv,UYGUY6,POPERW

        // Проверяем существует ли сущность с указанным типом и идентификатором
        $entity = Entities::where('type', $entityType)->find($entityId);
        if (!$entity) {
            throw new \Exception('Сущность не найдена для типа ' . $entityType . ' и идентификатора ' . $entityId);
        }

        // Разбиваем строку $labels на массив лейблов
        $decodedLabels = explode(',', $labels);

        // Получаем все метки, привязанные к этой сущности
        $existingLabels = $entity->labels()->pluck('name')->toArray();

        // Удаляем метки, которые есть у сущности, но отсутствуют в переданных лейблах
        $labelsToDelete = array_diff($existingLabels, $decodedLabels);
        foreach ($labelsToDelete as $labelToDelete) {
            $label = Labels::where('name', $labelToDelete)->first();
            if ($label) {
                $entity->labels()->detach($label->id);
            }
        }

        // Добавляем новые метки, которых еще нет у сущности
        $labelsToAdd = array_diff($decodedLabels, $existingLabels);
        foreach ($labelsToAdd as $labelToAdd) {
            $label = Labels::firstOrCreate(['name' => $labelToAdd]);
            $entity->labels()->attach($label);
        }

        return $entity;
    }

    public function addLabels($entityId, $entityType, $labels)
    {
        // http://127.0.0.1/labels/update/1/user/rhnmbmceqwkjf,jhbter,UYGUY6,POPERW

        // Проверяем существует ли сущность с указанным типом и идентификатором
        $entity = Entities::where('type', $entityType)->find($entityId);
        if (!$entity) {
            throw new \Exception('Сущность не найдена');
        }

        // Преобразовываем строку с лейблами в массив
        $labelsArray = explode(',', $labels);

        foreach ($labelsArray as $label) {
            // Проверяем, существует ли метка в базе данных
            $existingLabel = Labels::where('name', $label)->first();

            if ($existingLabel) {
                // Если метка уже существует, проверяем, связана ли она с текущей сущностью
                if (!$entity->labels()->where('name', $label)->exists()) {
                    // Если метка не связана с текущей сущностью, связываем ее
                    $entity->labels()->attach($existingLabel);
                }
            } else {
                // Если метка не существует, создаем новую и связываем с текущей сущностью
                $newLabel = Labels::create(['name' => $label]);
                $entity->labels()->attach($newLabel);
            }
        }
    }



    public function deleteLabels($entityId, $entityType, $labels)
    {
        // http://127.0.0.1/labels/delete/1/user/ijtw,yebre

        // Проверяем существует ли сущность с указанным типом и идентификатором
        $entity = Entities::where('type', $entityType)->find($entityId);
        if (!$entity) {
            throw new \Exception('Сущность не найдена');
        }

        // Преобразовываем строку с лейблами в массив
        $labelsArray = explode(',', $labels);

        // Проверяем, существуют ли переданные лейблы у сущности
        foreach ($labelsArray as $label) {
            if (!$entity->labels()->where('name', $label)->exists()) {
                throw new \Exception("Метка '$label' не связана с сущностью");
            }
        }

        // Удаляем переданные лейблы из сущности
        $entity->labels()->detach(
            Labels::whereIn('name', $labelsArray)->pluck('id')->toArray()
        );

        return dd($entity->toArray());
    }

}

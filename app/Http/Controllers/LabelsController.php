<?php

namespace App\Http\Controllers;

use App\Models\Labels;
use App\Models\EntityLabels;
use App\Models\Entities;
use Illuminate\Http\Request;

class LabelsController extends Controller
{
    public function index()
    {
        $labels = Labels::all();
//        dd($labels);
//        dd($labels->toArray());
//        foreach ($labels as $label) {
//            dump($label->name);
//        };
        return view('labels.index', compact('labels'));
    }

    public function show()
    {
        $label = Labels::find(3);
        dd($label->toArray());
    }

    public function update()
    {
        $label = Labels::find(4);
        $label->update([
            'name' => 'K.O'
        ]);

        return 'Данные обновлены!';
    }

    public function create(): string
    {
        $labels =
            [
                'name' => 'n4,32m',
            ];

        Labels::create($labels);

        return 'Labels созданы!';
    }

    public function delete()
    {
        $label = Labels::find(4);
        $label->delete();

        return 'Данные удалены!';
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Labels;
use Illuminate\Http\Request;

class LabelsController extends Controller
{
    public function index()
    {

    }

    public function show()
    {

    }

    public function update($id_entity, $entity, $labels)
    {

    }

    public function create(): string
    {
        $labels =
            [
                'name' => 'QQQQ',
            ];

        Labels::create($labels);

        return 'Labels созданы!';
    }

    public function deleted()
    {

    }
}

<?php

namespace App;

use Datatables;
use Illuminate\Database\Eloquent\Model;

class ImageSetup extends Model
{
    protected $table = 'images';

    public static function getDatatables()
    {
        $model = static::select([
            '*',
        ]);

        return Datatables::eloquent($model)
            ->editColumn('image', function ($model) {
                return '<img src="'.url('/files/'.$model->image).'" width=200 height=200/>';
            })
            ->editColumn('status', 'images_setup.datatables.status')
            ->addColumn('action', 'images_setup.datatables.action')
            ->rawColumns(['status', 'action', 'image'])
            ->make(true);
    }
}

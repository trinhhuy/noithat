<?php

namespace App;

use Datatables;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function getDatatables()
    {
        $model = static::select([
            '*',
        ])->with('category');

        return Datatables::eloquent($model)
            ->editColumn('category_id', function ($model) {
                return $model->category ? $model->category->name : '';
            })
            ->editColumn('status', 'posts.datatables.status')
            ->addColumn('action', 'posts.datatables.action')
            ->rawColumns(['status', 'action'])
            ->make(true);
    }
}

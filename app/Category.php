<?php

namespace App;

use Datatables;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public static function getParentList()
    {
        return static::active()->where('parent_id', 0)->pluck('name', 'id')->all();
    }

    public static function getList()
    {
        return static::active()->pluck('name', 'id')->all();
    }

    public function parent()
    {
        return $this->belongsTo(static::class,'parent_id');
    }

    public function children() {
        return $this->hasMany(static::class, 'parent_id')->orderBy('name', 'asc');
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public static function getDatatables()
    {
        $model = static::select([
            'id', 'name', 'status',
        ])->with('parent', 'children');

        return Datatables::eloquent($model)
//            ->editColumn('parent_id', function ($model) {
//                return $model->parent ? $model->parent->name : $model->name;
//            })
            ->editColumn('status', 'categories.datatables.status')
            ->addColumn('action', 'categories.datatables.action')
            ->rawColumns(['status', 'action'])
            ->make(true);
    }
}

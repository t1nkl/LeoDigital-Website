<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\ArticleRequest as StoreRequest;
use App\Http\Requests\ArticleRequest as UpdateRequest;

class ArticleCrudController extends CrudController
{
    public function __construct()
    {
        parent::__construct();

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel("App\Models\Article");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/article');
        $this->crud->setEntityNameStrings('статью', 'статьи');

        /*
        |--------------------------------------------------------------------------
        | COLUMNS AND FIELDS
        |--------------------------------------------------------------------------
        */

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
                                'name' => 'title',
                                'label' => 'Название',
                            ]);
        $this->crud->addColumn([
                                'label' => 'Категория',
                                'type' => 'select',
                                'name' => 'category_id',
                                'entity' => 'category',
                                'attribute' => 'name',
                                'model' => "App\Models\Category",
                            ]);
        $this->crud->addColumn([
                                'name' => 'date',
                                'label' => 'Дата',
                                'type' => 'date',
                            ]);
        $this->crud->addColumn([
                                'name' => 'status',
                                'label' => 'Статус',
                            ]);

        // ------ CRUD FIELDS
        $this->crud->addField([
                                'name' => 'title',
                                'label' => 'Название',
                                'type' => 'text',
                                'wrapperAttributes' => [
                                    'class' => 'form-group col-md-9',
                                ],
                                'tab' => 'Контент'
                            ]);
        $this->crud->addField([
                                'name' => 'date',
                                'label' => 'Дата',
                                'type' => 'date',
                                'value' => date('Y-m-d'),
                                'wrapperAttributes' => [
                                    'class' => 'form-group col-md-3',
                                ],
                                'tab' => 'Контент'
                            ], 'create');
        $this->crud->addField([
                                'name' => 'date',
                                'label' => 'Дата',
                                'type' => 'date',
                                'wrapperAttributes' => [
                                    'class' => 'form-group col-md-3',
                                ],
                                'tab' => 'Контент'
                            ], 'update');
        $this->crud->addField([
                                'name' => 'slug',
                                'label' => 'Slug (URL)',
                                'type' => 'text',
                                'attributes' => ['readonly' => 'readonly'],
                                'tab' => 'Контент'
                            ], 'update');
        $this->crud->addField([
                                'name' => 'description',
                                'label' => 'Описание',
                                'type' => 'textarea',
                                'attributes' => ['rows' => 4],
                                'tab' => 'Контент'
                            ]);
        $this->crud->addField([
                                'name' => 'content',
                                'label' => 'Контент',
                                'type' => 'ckeditor',
                                'tab' => 'Контент'
                            ]);
        $this->crud->addField([
                                'label' => 'Категория',
                                'type' => 'select2',
                                'name' => 'category_id',
                                'entity' => 'category',
                                'attribute' => 'name',
                                'model' => "App\Models\Category",
                                'wrapperAttributes' => [
                                    'class' => 'form-group col-md-4',
                                ],
                                'tab' => 'Контент'
                            ]);
        $this->crud->addField([
                                'label' => 'Теги',
                                'type' => 'select2_multiple',
                                'name' => 'tags',
                                'entity' => 'tags',
                                'attribute' => 'name',
                                'model' => "App\Models\Tag",
                                'pivot' => true,
                                'wrapperAttributes' => [
                                    'class' => 'form-group col-md-4',
                                ],
                                'tab' => 'Контент'
                            ]);
        $this->crud->addField([
                                'name' => 'status',
                                'label' => 'Статус',
                                'type' => 'enum',
                                'wrapperAttributes' => [
                                    'class' => 'form-group col-md-4',
                                ],
                                'tab' => 'Контент'
                            ]);
        $this->crud->addField([
                                'name' => 'image',
                                'label' => 'Изображение',
                                'type' => 'text',
                                'tab' => 'Изображение'
                            ]);
        $this->crud->addField([
                                'name' => 'photos',
                                'label' => 'Изображениея',
                                'type' => 'textarea',
                                'tab' => 'Изображение'
                            ]);
        $this->crud->addField([
                                'name' => 'video',
                                'label' => 'Видео',
                                'type' => 'text',
                                'tab' => 'Видео'
                            ]);
        $this->crud->addField([
                                'name' => 'audio',
                                'label' => 'Аудио',
                                'type' => 'text',
                                'tab' => 'Аудио'
                            ]);

        $this->crud->enableAjaxTable();

    }

    public function store(StoreRequest $request)
    {
        return parent::storeCrud();
    }

    public function update(UpdateRequest $request)
    {
        return parent::updateCrud();
    }
}

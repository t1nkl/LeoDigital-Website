<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\ProjectRequest as StoreRequest;
use App\Http\Requests\ProjectRequest as UpdateRequest;

class ProjectCrudController extends CrudController {

	public function __construct() {

        parent::__construct();

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\Project");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/project');
        $this->crud->setEntityNameStrings('кейс', 'кейсы');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

        $this->crud->allowAccess('reorder');
        $this->crud->enableReorder('title', 1);
        $this->crud->orderBy('rgt');

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
                                'name' => 'title',
                                'label' => 'Название',
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
                                'count_down' => 190,
                                'attributes' => ['maxlength' => 190],
                                'wrapperAttributes' => [
                                    'class' => 'form-group col-md-9',
                                ],
                            ]);
        $this->crud->addField([
                                'name' => 'date',
                                'label' => 'Дата',
                                'type' => 'date',
                                'value' => date('Y-m-d'),
                                'wrapperAttributes' => [
                                    'class' => 'form-group col-md-3',
                                ],
                            ], 'create');
        $this->crud->addField([
                                'name' => 'date',
                                'label' => 'Дата',
                                'type' => 'date',
                                'wrapperAttributes' => [
                                    'class' => 'form-group col-md-3',
                                ],
                            ], 'update');
        $this->crud->addField([
                                'name' => 'slug',
                                'label' => 'Slug (URL)',
                                'type' => 'text',
                                'attributes' => ['readonly' => 'readonly'],
                            ], 'update');
        $this->crud->addField([
                                'name' => 'description',
                                'label' => 'Описание',
                                'type' => 'textarea',
                                'attributes' => ['rows' => 4],
                            ]);
        $this->crud->addField([
                                'label' => "Кейс в виде картинки (если есть)",
                                'name' => "keys_photo",
                                'type' => 'upload',
                            ]);
        $this->crud->addField([
                                'name' => 'content',
                                'label' => 'Текст',
                                'type' => 'ckeditor',
                                'extra_plugins' => ['oembed', 'widget', 'justify', 'preview', 'indent', 'indentblock', 'lineutils'],
                            ]);
        $this->crud->addField([
                                'label' => "Картинка",
                                'name' => "image",
                                'type' => 'image',
                                'upload' => true,
                                'crop' => true,
                                'aspect_ratio' => 1.496,
                                'hint' => 'Изображение для главной страницы сайта',
                            ]);
        $this->crud->addField([
                                'label' => "Баннер",
                                'name' => "banner",
                                'type' => 'image',
                                'upload' => true,
                                'crop' => true,
                                'aspect_ratio' => 1.787,
                                'hint' => 'Изображение которое будет выводится внутри страницы кейса',
                            ]);
        $this->crud->addField([
                                'label' => "PDF",
                                'name' => "pdf",
                                'type' => 'upload',
                            ]);
        $this->crud->addField([
                                'name' => 'status',
                                'label' => 'Статус',
                                'type' => 'enum',
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

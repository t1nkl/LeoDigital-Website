<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\PortfolioCategoryRequest as StoreRequest;
use App\Http\Requests\PortfolioCategoryRequest as UpdateRequest;

class PortfolioCategoryCrudController extends CrudController
{
    public function __construct()
    {
        parent::__construct();

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel("App\Models\PortfolioCategory");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/port_category');
        $this->crud->setEntityNameStrings('категорию', 'категории');

        /*
        |--------------------------------------------------------------------------
        | COLUMNS AND FIELDS
        |--------------------------------------------------------------------------
        */

        $this->crud->allowAccess('reorder');
        $this->crud->enableReorder('name', 1);
        $this->crud->orderBy('rgt');

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
                                'name' => 'name',
                                'label' => 'Название',
                            ]);

        // ------ CRUD FIELDS
        $this->crud->addField([
                                'name' => 'name',
                                'label' => 'Название',
                            ]);
        $this->crud->addField([
                                'name' => 'slug',
                                'label' => 'Slug (URL)',
                                'type' => 'text',
                                'attributes' => ['readonly' => 'readonly'],
                            ], 'update');
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

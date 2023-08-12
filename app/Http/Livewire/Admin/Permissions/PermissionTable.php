<?php

namespace App\Http\Livewire\Admin\Permissions;

use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Spatie\Permission\Models\Permission;


class PermissionTable extends LivewireDatatable
{
    protected $listeners = ['refreshTable' => '$refresh'];
    public $perPage = '25';

    public function builder()
    {
        return Permission::query();
    }

    public function columns()
    {

        return [
            NumberColumn::name('id')
                ->label('ID'),
            Column::name('name')
                ->defaultSort('asc')
                ->searchable()
                ->editable(),
            DateColumn::name('updated_at'),
        ];


    }
}

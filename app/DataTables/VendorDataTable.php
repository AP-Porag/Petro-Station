<?php

namespace App\DataTables;

use App\Models\Vendor;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendorDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($data) { // $data is data od current row in table
                //return view( 'admin.users.action', [ 'data' => $data ] ); // return view with objects (row) data parameters
                //return '<a class="btn btn-warning btn-sm" href="#">'.$data->id.'</a>'; // or simply return html here
                return '<div class="dropdown">
                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                </button>
                <div class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton">
                    <div class="text-center action_btn">
                        <a href="#" class="text-decoration-none text-info" data-toggle="modal" data-target=".edit-modal-lg">
                            <ul class="list-group">
                                <li class="d-flex align-items-center pl-3 pt-2 pb-2">
                                    <i class="fa fa-edit mr-3"><span class="ml-3">Edit '.$data->id.'</span></i>
                                </li>
                            </ul>
                        </a>
                    </div>
                    <div class="text-center action_btn">
                        <a href="" class="text-decoration-none text-danger">
                            <ul class="list-group">
                                <li class="d-flex align-items-center pl-3 pt-2 pb-2">
                                    <i class="fa fa-trash mr-3"><span class="ml-3">Delete '.$data->id.'</span></i>
                                </li>
                            </ul>
                        </a>
                    </div>
                </div>
            </div>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Vendor $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Vendor $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('vendor-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'company',
            'name',
            'email',
            'phone_number',
            'notes',
            Column::computed('action')
                ->exportable(FALSE)
                ->printable(FALSE)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Vendor_' . date('YmdHis');
    }

}

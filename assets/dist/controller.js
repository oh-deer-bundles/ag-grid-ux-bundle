import { Controller } from '@hotwired/stimulus';
import { createGrid }  from 'ag-grid-community';
import "@ag-grid-community/styles/ag-grid.min.css";
import "@ag-grid-community/styles/ag-theme-alpine.min.css";
import "@ag-grid-community/styles/ag-theme-material.min.css";
import "@ag-grid-community/styles/ag-theme-balham.min.css";
import "@ag-grid-community/styles/ag-theme-quartz.min.css";


class default_1 extends Controller {
    constructor() {
        super(...arguments);
        this.gridOptions = {};
        this.gridApi = null;
    }
    connect() {

        if (!this.optionsValue) {
            throw new Error('Invalid element, no options set');
        }

        if (this.element instanceof HTMLDivElement) {

            this.gridOptions = this.optionsValue;
            if(this.gridOptions.hasOwnProperty('columnDefs')) {
                this.gridOptions.columnDefs.forEach((columnDef, index)=> {
                    if(columnDef.valueFormatter) {
                        this.gridOptions.columnDefs[index].valueFormatter = eval(columnDef.valueFormatter);
                    }
                    if(columnDef.valueGetter) {
                        this.gridOptions.columnDefs[index].valueGetter = eval(columnDef.valueGetter);
                    }
                })
            }

            this.gridOptions.onCellValueChanged = this.cellValueChanged.bind(this);
            this.gridOptions.onRowValueChanged = this.rowValueChanged.bind(this);

            this.dispatchEvent('init', {
                gridOptions: this.gridOptions,
            });

            this.gridApi = createGrid(this.element, this.gridOptions);
            this.dispatchEvent('loaded', {agGridApi: this.gridApi});
        }
    }

    cellValueChanged(params) {
        this.dispatchEvent('cellValueChanged', {params: params});
    }

    rowValueChanged(params) {
        this.dispatchEvent('rowValueChanged', {params: params});
    }

    dispatchEvent(name, payload) {
        this.dispatch(name, { detail: payload, prefix: 'agGrid' });
    }
}
default_1.values = {
    options: Object,
};

export { default_1 as default };

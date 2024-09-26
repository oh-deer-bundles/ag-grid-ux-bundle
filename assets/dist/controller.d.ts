import { Controller } from '@hotwired/stimulus';
export default class extends Controller {
    readonly optionsValue: any;
    static values: {
        options: ObjectConstructor;
    };
    private gridOptions;
    private gridApi;
    connect(): void;
    private cellValueChanged;
    private rowValueChanged;
    private dispatchEvent;
}

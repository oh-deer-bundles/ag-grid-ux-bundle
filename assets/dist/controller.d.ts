import { Controller } from '@hotwired/stimulus';
export default class extends Controller {
    readonly optionsValue: any;
    static values: {
        options: ObjectConstructor;
    };
    private gridOptions;
    private gridApi;
    connect(): void;
    cellValueChanged(event: any): void;
    rowValueChanged(event: any): void;
    private dispatchEvent;
}

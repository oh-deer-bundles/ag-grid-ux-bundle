# ODB AG Grid UX Bundle

This Bundle helps to quickly implement [AG Grid Community js](https://www.npmjs.com/package/ag-grid-community) library in Symfony application. This bundle is a Symfony UX bundle. You can find more informations about [the Symfony UX initiative](https://ux.symfony.com/).

You can learn, show demo and more on [official Ag Grid website](https://www.ag-grid.com/)

## Installation

> /!\ caution
> Before you start, make sure you have `StimulusBundle configured in your app`.

Install the bundle using Composer and Symfony Flex:

```shell
composer require oh-deer-bundles/ag-grid-ux-bundle
```

If you're using WebpackEncore, install your assets and restart Encore (not
needed if you're using AssetMapper):

```shell
# with npm
npm install --force
npm run watch

# or use yarn
yarn install --force
yarn watch
```

## Usage

To use AG Grid Ux Bundle, inject the ``AgGridBuilderInterface`` service
and create agGrid in your app.

Tow way are possible, below the same examples for the same result

```php
 // ...
    use Odb\AgGridUxBundle\Builder\AgGridBuilderInterface;
    use Odb\AgGridUxBundle\Model\AgGrid;

    class HomeController extends AbstractController
    {
        #[Route('/', name: 'app_homepage')]
        public function index(AgGridBuilderInterface $agGridBuilder): Response
        {
            /** @var $agGrid AgGrid */
            $agGrid = $agGridBuilder->createAgGrid();
            
            // set the attributes of the div element itself
            $agGrid->setAttributes([ 'class' => 'ag-theme-alpine','style' => "height:500px"]);
            
            // set data
            $data = [
                ['make' => "Tesla", 'model' => "Model Y", 'price' => 64950, 'electric' => true ],
                ['make' => "Ford", 'model' => "F-Series", 'price' =>  33850, 'electric' => false ],
                [ 'make' => "Toyota", 'model' => "Corolla", 'price' => 29600, 'electric' => false ]
            ];
            $agGrid->setRowData($data);
            
            // default column definition
            $colDefaultDef = ['editable' => true];
            $agGrid->setDefaultColDef($colDefaultDef);
        
            // set column definitions
            $columnDefs = [
                ['field' => 'make', 'flex' => 2, 'cellEditor' => 'agSelectCellEditor', 'cellEditorParams' => ['values' => ["Tesla", "Ford", "Toyota", "Mercedes", "Fiat", "Nissan", "Vauxhall", "Volvo", "Jaguar",]] ],
                ['field' => 'model','filter' => true, 'flex' => 1],
                ['field' => 'price', 'flex' => 1, 'valueFormatter' => "p => p.value.toLocaleString() + ' €'"],
                ['field' => 'electric', 'flex' => 1, 'editable' => false],
            ];
            $agGrid->setColumnDefs($columnDefs);

            return $this->render('home/index.html.twig', [
                'agGrid' => $agGrid
            ]);
        }
    }
```
Same example with a syntaxe Object oriented.

```php
 // ...
    use Odb\AgGridUxBundle\Builder\AgGridBuilderInterface;
    use Odb\AgGridUxBundle\Model\AgGrid;
    use Odb\AgGridUxBundle\Model\ColumnDef;
    use Odb\AgGridUxBundle\Model\DefaultColumnDef;

    class HomeController extends AbstractController
    {
        #[Route('/', name: 'app_homepage')]
        public function index(AgGridBuilderInterface $agGridBuilder): Response
        {
            /** @var $agGrid AgGrid */
            $agGrid = $agGridBuilder->createAgGrid();
            
            // set the attributes of the div element itself
            $agGrid->setAttributes([ 'style' => "height:500px"]);
            $agGrid->setTheme('ag-theme-alpine');
            
            // set data
            $data = [
                ['make' => "Tesla", 'model' => "Model Y", 'price' => 64950, 'electric' => true ],
                ['make' => "Ford", 'model' => "F-Series", 'price' =>  33850, 'electric' => false ],
                [ 'make' => "Toyota", 'model' => "Corolla", 'price' => 29600, 'electric' => false ]
            ];
            $agGrid->setRowData($data);
            
            // default column definition
            $colDefaultDef = (new DefaultColumnDef())->setEditable(true);
            $agGrid->setDefaultColDef($colDefaultDef);
        
            // set column definitions
            $colDefMake = new ColumnDef();
            $colDefMake->setField('make');
            $colDefMake->setFlex(2);
            $colDefMake->setCellEditor('agSelectCellEditor');
            $colDefMake->setCellEditorParams(['values' => ["Tesla", "Ford", "Toyota", "Mercedes", "Fiat", "Nissan", "Vauxhall", "Volvo", "Jaguar",]]);
            $colDefModel = (new ColumnDef())->setField('model')->setFlex(1)->setFilter(true);
            $colDefPrice = (new ColumnDef())->setField('price')->setFlex(1)->setValueFormatter("p => p.value.toLocaleString() + ' €'");
            $colDefElectric = (new ColumnDef())->setField('electric')->setFlex(1)->setEditable(false);
    
            $agGrid->setColumnDefs([$colDefMake, $colDefModel, $colDefPrice, $colDefElectric]);

            return $this->render('home/index.html.twig', [
                'agGrid' => $agGrid
            ]);
        }
    }
```

The Object oriented syntaxe implements the major part of AG Grid API. You can read the [AG Grid documentation reference](https://www.ag-grid.com/react-data-grid/reference/)

> Keep in your mind, there two licenses for AG grid Library, this bundle implements only the ``Community Edition``.

Once created in PHP, the data grid can be displayed using Twig:

```html
    {{ render_ag_grid(agGrid) }}

    {# You can pass HTML attributes as a second argument to add them on the <div> tag if you need it #}
    {{ render_ag_grid(agGrid, {'id': 'my-data-grid'}) }}
```

# Extends the Stimulus controller

If you need you can extend the bundle Stimulus controller, to add your javascript.

```javascript
// mydatagrid_controller.js

import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    connect() {
        this.element.addEventListener('agGrid:init', this.agGridIniti);
        this.element.addEventListener('agGrid:loaded', this.agGridStarted);
        this.element.addEventListener('agGrid:cellValueChanged', this.cellValueChanged);
        this.element.addEventListener('agGrid:rowValueChanged', this.rowValueChanged);
    }

    disconnect() {
        // You should always remove listeners when the controller is disconnected to avoid side effects
        this.element.addEventListener('agGrid:init', this.agGridIniti);
        this.element.addEventListener('agGrid:loaded', this.agGridStarted);
        this.element.addEventListener('agGrid:cellValueChanged', this.cellValueChanged);
        this.element.addEventListener('agGrid:rowValueChanged', this.rowValueChanged);
    }

    agGridIniti(event) {
        // The AG Grid is not yet created
        // You can access the gridOptions that will be passed to "createGrid" function
        console.log(event.detail.gridOptions);
        
        // e.g. you want to add a class with a rules like this.
        event.detail.gridOptions.rowClassRules =  {
          // apply red to Ford cars
          'rag-red': params => params.data.make === 'Ford',
        }
    }

    agGridStarted(event) {
        // The AG Grid was just created and You can access the AG Grid instance using the event details
        console.log(event.detail.agGridApi);

        // For instance you can listen to additional events see https://www.ag-grid.com/javascript-data-grid/grid-events/
        event.detail.agGridApi.onPasteEnd = (event) => {
            /* ... */
        };
        event.detail.agGridApi.onUndoEnded = (event) => {
          /* 
            don't forget to activate undo/redo options  undoRedoCellEditing: true, undoRedoCellEditingLimit: 5, 
            ... 
          */
        };
    }

    cellValueChanged(event) {
        // the Ag Grid documentation "Value has changed after editing (this event will not fire if editing was cancelled, eg ESC was pressed) or if cell value has changed as a result of cut, paste, cell clear (pressing Delete key), fill handle, copy range down, undo and redo."
        console.log(event.detail.params);
    }
    
    rowValueChanged(event) {
        console.log(event.detail.params);
    }
    
}
```

Then in your render call, add your controller as an HTML attribute:
- in twig
```html
{{ render_ag_grid(agGrid, {'data-controller': 'mydatagrid'}) }}
```
- or in PHP
```php
$agGrid->setAttributes([ 'data-controller' => 'mydatagrid']);
```

## TODO

Features need to be implemented
- tests
- language selection

## Special thanks

The Symfony UX Bundle is largely inspired by the superb [Symfony UX chart.js](https://symfony.com/bundles/ux-chartjs/current/index.html) Bundle.
Thanks to [Fabien Potencier](https://github.com/fabpot) to create the best PHP framework
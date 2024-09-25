<?php

namespace Odb\AgGridUxBundle\Builder;

use Odb\AgGridUxBundle\Model\AgGrid;

class AgGridBuilder implements AgGridBuilderInterface
{

    public function createAgGrid(): AgGrid
    {
       return new AgGrid();
    }
}
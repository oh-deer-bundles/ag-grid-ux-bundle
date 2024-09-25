<?php

namespace Odb\AgGridUxBundle\Builder;

use Odb\AgGridUxBundle\Model\AgGrid;

interface AgGridBuilderInterface
{
    public function createAgGrid(): AgGrid;
}
<?php

namespace Odb\AgGridUxBundle\Model;

interface AgGridObjectInterface
{
    public function createView() : array;
}
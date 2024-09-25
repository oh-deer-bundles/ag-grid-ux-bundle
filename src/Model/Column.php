<?php

namespace Odb\AgGridUxBundle\Model;


class Column
{
    protected ?bool $editable = null;
    protected null|string|array $headerClass = null;
    protected ?bool $autoHeaderHeight = null;
    protected ?bool $autoHeight = null;
    protected ?int $width = null;
    protected ?int $initialWidth = null;
    protected ?int $minWidth = null;
    protected ?int $maxWidth = null;
    protected ?bool $resizable = null;
    protected ?bool $filter = null;
    protected ?bool $floatingFilter = null;
    protected ?bool $enableCellChangeFlash = null;
    protected ?bool $sortable = null;
    protected ?int $flex = null;

    public function isEditable(): ?bool
    {
        return $this->editable;
    }

    public function setEditable(?bool $editable): static
    {
        $this->editable = $editable;
        return $this;
    }

    public function getHeaderClass(): array|string|null
    {
        return $this->headerClass;
    }

    public function setHeaderClass(array|string|null $headerClass): static
    {
        $this->headerClass = $headerClass;
        return $this;
    }

    public function isAutoHeaderHeight(): ?bool
    {
        return $this->autoHeaderHeight;
    }

    public function setAutoHeaderHeight(?bool $autoHeaderHeight): static
    {
        $this->autoHeaderHeight = $autoHeaderHeight;
        return $this;
    }

    public function isAutoHeight(): ?bool
    {
        return $this->autoHeight;
    }

    public function setAutoHeight(?bool $autoHeight): static
    {
        $this->autoHeight = $autoHeight;
        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): static
    {
        $this->width = $width;
        return $this;
    }

    public function getInitialWidth(): ?int
    {
        return $this->initialWidth;
    }

    public function setInitialWidth(?int $initialWidth): static
    {
        $this->initialWidth = $initialWidth;
        return $this;
    }

    public function getMinWidth(): ?int
    {
        return $this->minWidth;
    }

    public function setMinWidth(?int $minWidth): static
    {
        $this->minWidth = $minWidth;
        return $this;
    }

    public function getMaxWidth(): ?int
    {
        return $this->maxWidth;
    }

    public function setMaxWidth(?int $maxWidth): static
    {
        $this->maxWidth = $maxWidth;
        return $this;
    }

    public function isResizable(): ?bool
    {
        return $this->resizable;
    }

    public function setResizable(?bool $resizable): static
    {
        $this->resizable = $resizable;
        return $this;
    }

    public function isFilter(): ?bool
    {
        return $this->filter;
    }

    public function setFilter(?bool $filter): static
    {
        $this->filter = $filter;
        return $this;
    }

    public function isFloatingFilter(): ?bool
    {
        return $this->floatingFilter;
    }

    public function setFloatingFilter(?bool $floatingFilter): static
    {
        $this->floatingFilter = $floatingFilter;
        return $this;
    }

    public function isEnableCellChangeFlash(): ?bool
    {
        return $this->enableCellChangeFlash;
    }

    public function setEnableCellChangeFlash(?bool $enableCellChangeFlash): static
    {
        $this->enableCellChangeFlash = $enableCellChangeFlash;
        return $this;
    }

    public function isSortable(): ?bool
    {
        return $this->sortable;
    }

    public function setSortable(?bool $sortable): static
    {
        $this->sortable = $sortable;
        return $this;
    }

    public function getFlex(): ?int
    {
        return $this->flex;
    }

    public function setFlex(?int $flex): static
    {
        $this->flex = $flex;
        return $this;
    }


    
    
}
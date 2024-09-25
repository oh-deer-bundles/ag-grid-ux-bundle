<?php

namespace Odb\AgGridUxBundle\Model;


class AgGrid implements AgGridObjectInterface
{
    use ViewCreator;
    /** Attribute off element */
    private array $attributes = [];
    /** Default column definition */
    private null|array|DefaultColumnDef $defaultColDef = null;

    /** Data and row options */
    private ?array $rowData ;
    private ?array $sortingOrder = null;
    private ?bool $suppressRowTransform = null;
    private ?array $pinnedTopRowData = null;
    private ?array $pinnedBottomRowData = null;
    private ?int $rowHeight = null;
    private ?array $rowStyle = null;
    private ?string $rowClass = null;
    private ?array $rowClassRules = null;
    private ?bool $suppressRowHoverHighlight = null;
    private ?bool $columnHoverHighlight = null;
    private ?string $rowSelection = null;
    private ?string $rowMultiSelectWithClick = null;
    private ?string $getRowId = null;

    /** Columns definition  */
    /**
     * @var array|ColumnDef[]|null
     */
    private null|array $columnDefs = null;
    private ?array $columnTypes = null;

    /** Editing options */
    private ?string $editType = null;
    private ?bool $undoRedoCellEditing = null;
    private ?int $undoRedoCellEditingLimit = null;
    private ?bool $singleClickEdit = null;
    private ?bool $suppressClickEdit = null;
    private ?bool $stopEditingWhenCellsLoseFocus = null;
    private ?bool $enterNavigatesVertically = null;
    private ?bool $enterNavigatesVerticallyAfterEdit = null;
    private ?bool $enableCellEditingOnBackspace = null;
    private ?bool $readOnlyEdit = null;

    /** locale */
    private ?string $localeText = null;
    private ?bool $enableRtl = null;

    /** Other options  */
    private ?string $theme = null;
    private ?bool $pagination = null;
    private ?bool $suppressMenuHide = null;

    /** Infinite Row Model */
    private ?string  $rowModelType = null;
    private ?int $cacheBlockSize = null;
    private ?int $cacheOverflowSize = null;
    private ?int $maxConcurrentDatasourceRequests = null;
    private ?int $infiniteInitialRowCount = null;
    private ?int $maxBlocksInCache = null;


    public function getAttributes(): array
    {
        if($this->getTheme()) {
            array_key_exists('class', $this->attributes) ? $this->attributes['class'] .= ' '.$this->getTheme() : $this->attributes['class'] = $this->getTheme();
        }
        return $this->attributes;
    }

    public function setAttributes(array $attributes): static
    {
        $this->attributes = $attributes;
        return $this;
    }

    public function getDataController(): ?string
    {
        return $this->attributes['data-controller'] ?? null;
    }


    public function getDefaultColDef(): DefaultColumnDef|array|null
    {
        return $this->defaultColDef;
    }

    public function setDefaultColDef(DefaultColumnDef|array|null $defaultColDef): static
    {
        $this->defaultColDef = $defaultColDef;
        return $this;
    }

    public function getRowData(): ?array
    {
        return $this->rowData;
    }

    public function setRowData(?array $rowData): static
    {
        $this->rowData = $rowData;
        return $this;
    }

    public function getSortingOrder(): ?array
    {
        return $this->sortingOrder;
    }

    public function setSortingOrder(?array $sortingOrder): static
    {
        $this->sortingOrder = $sortingOrder;
        return $this;
    }

    public function isSuppressRowTransform(): ?bool
    {
        return $this->suppressRowTransform;
    }

    public function setSuppressRowTransform(?bool $suppressRowTransform): static
    {
        $this->suppressRowTransform = $suppressRowTransform;
        return $this;
    }

    public function getPinnedTopRowData(): ?array
    {
        return $this->pinnedTopRowData;
    }

    public function setPinnedTopRowData(?array $pinnedTopRowData): static
    {
        $this->pinnedTopRowData = $pinnedTopRowData;
        return $this;
    }

    public function getPinnedBottomRowData(): ?array
    {
        return $this->pinnedBottomRowData;
    }

    public function setPinnedBottomRowData(?array $pinnedBottomRowData): static
    {
        $this->pinnedBottomRowData = $pinnedBottomRowData;
        return $this;
    }

    public function getRowHeight(): ?int
    {
        return $this->rowHeight;
    }

    public function setRowHeight(?int $rowHeight): static
    {
        $this->rowHeight = $rowHeight;
        return $this;
    }

    public function getRowStyle(): ?array
    {
        return $this->rowStyle;
    }

    public function setRowStyle(?array $rowStyle): static
    {
        $this->rowStyle = $rowStyle;
        return $this;
    }

    public function getRowClass(): ?string
    {
        return $this->rowClass;
    }

    public function setRowClass(?string $rowClass): static
    {
        $this->rowClass = $rowClass;
        return $this;
    }

    public function getRowClassRules(): ?array
    {
        return $this->rowClassRules;
    }

    public function setRowClassRules(?array $rowClassRules): static
    {
        $this->rowClassRules = $rowClassRules;
        return $this;
    }

    public function isSuppressRowHoverHighlight(): ?bool
    {
        return $this->suppressRowHoverHighlight;
    }

    public function setSuppressRowHoverHighlight(?bool $suppressRowHoverHighlight): static
    {
        $this->suppressRowHoverHighlight = $suppressRowHoverHighlight;
        return $this;
    }

    public function isColumnHoverHighlight(): ?bool
    {
        return $this->columnHoverHighlight;
    }

    public function setColumnHoverHighlight(?bool $columnHoverHighlight): static
    {
        $this->columnHoverHighlight = $columnHoverHighlight;
        return $this;
    }

    public function getRowSelection(): ?string
    {
        return $this->rowSelection;
    }

    public function setRowSelection(?string $rowSelection): static
    {
        $this->rowSelection = $rowSelection;
        return $this;
    }

    public function getRowMultiSelectWithClick(): ?string
    {
        return $this->rowMultiSelectWithClick;
    }

    public function setRowMultiSelectWithClick(?string $rowMultiSelectWithClick): static
    {
        $this->rowMultiSelectWithClick = $rowMultiSelectWithClick;
        return $this;
    }

    public function getGetRowId(): ?string
    {
        return $this->getRowId;
    }

    public function setGetRowId(?string $getRowId): static
    {
        $this->getRowId = $getRowId;
        return $this;
    }

    public function getColumnDefs(): array|null
    {
        return $this->columnDefs;
    }

    /**
     * @param array|null|ColumnDef[] $columnDefs
     * @return $this
     */
    public function setColumnDefs(array|null $columnDefs): static
    {
        $this->columnDefs = $columnDefs;
        return $this;
    }

    public function getEditType(): ?string
    {
        return $this->editType;
    }

    public function setEditType(?string $editType): static
    {
        $this->editType = $editType;
        return $this;
    }

    public function isUndoRedoCellEditing(): ?bool
    {
        return $this->undoRedoCellEditing;
    }

    public function setUndoRedoCellEditing(?bool $undoRedoCellEditing): static
    {
        $this->undoRedoCellEditing = $undoRedoCellEditing;
        return $this;
    }

    public function getUndoRedoCellEditingLimit(): ?int
    {
        return $this->undoRedoCellEditingLimit;
    }

    public function setUndoRedoCellEditingLimit(?int $undoRedoCellEditingLimit): static
    {
        $this->undoRedoCellEditingLimit = $undoRedoCellEditingLimit;
        return $this;
    }

    public function isSingleClickEdit(): ?bool
    {
        return $this->singleClickEdit;
    }

    public function setSingleClickEdit(?bool $singleClickEdit): static
    {
        $this->singleClickEdit = $singleClickEdit;
        return $this;
    }

    public function isSuppressClickEdit(): ?bool
    {
        return $this->suppressClickEdit;
    }

    public function setSuppressClickEdit(?bool $suppressClickEdit): static
    {
        $this->suppressClickEdit = $suppressClickEdit;
        return $this;
    }

    public function isStopEditingWhenCellsLoseFocus(): ?bool
    {
        return $this->stopEditingWhenCellsLoseFocus;
    }

    public function setStopEditingWhenCellsLoseFocus(?bool $stopEditingWhenCellsLoseFocus): static
    {
        $this->stopEditingWhenCellsLoseFocus = $stopEditingWhenCellsLoseFocus;
        return $this;
    }

    public function isEnterNavigatesVertically(): ?bool
    {
        return $this->enterNavigatesVertically;
    }

    public function setEnterNavigatesVertically(?bool $enterNavigatesVertically): static
    {
        $this->enterNavigatesVertically = $enterNavigatesVertically;
        return $this;
    }

    public function isEnterNavigatesVerticallyAfterEdit(): ?bool
    {
        return $this->enterNavigatesVerticallyAfterEdit;
    }

    public function setEnterNavigatesVerticallyAfterEdit(?bool $enterNavigatesVerticallyAfterEdit): static
    {
        $this->enterNavigatesVerticallyAfterEdit = $enterNavigatesVerticallyAfterEdit;
        return $this;
    }

    public function isEnableCellEditingOnBackspace(): ?bool
    {
        return $this->enableCellEditingOnBackspace;
    }

    public function setEnableCellEditingOnBackspace(?bool $enableCellEditingOnBackspace): static
    {
        $this->enableCellEditingOnBackspace = $enableCellEditingOnBackspace;
        return $this;
    }

    public function isReadOnlyEdit(): ?bool
    {
        return $this->readOnlyEdit;
    }

    public function setReadOnlyEdit(?bool $readOnlyEdit): static
    {
        $this->readOnlyEdit = $readOnlyEdit;
        return $this;
    }

    public function getLocaleText(): ?string
    {
        return $this->localeText;
    }

    public function setLocaleText(?string $localeText): static
    {
        $this->localeText = $localeText;
        return $this;
    }

    public function isEnableRtl(): ?bool
    {
        return $this->enableRtl;
    }

    public function setEnableRtl(?bool $enableRtl): static
    {
        $this->enableRtl = $enableRtl;
        return $this;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(?string $theme): static
    {
        $this->theme = $theme;
        return $this;
    }

    public function isPagination(): ?bool
    {
        return $this->pagination;
    }

    public function setPagination(?bool $pagination): static
    {
        $this->pagination = $pagination;
        return $this;
    }

    public function isSuppressMenuHide(): ?bool
    {
        return $this->suppressMenuHide;
    }

    public function setSuppressMenuHide(?bool $suppressMenuHide): static
    {
        $this->suppressMenuHide = $suppressMenuHide;
        return $this;
    }

    public function getRowModelType(): ?string
    {
        return $this->rowModelType;
    }

    public function setRowModelType(?string $rowModelType): static
    {
        $this->rowModelType = $rowModelType;
        return $this;
    }

    public function getCacheBlockSize(): ?int
    {
        return $this->cacheBlockSize;
    }

    public function setCacheBlockSize(?int $cacheBlockSize): static
    {
        $this->cacheBlockSize = $cacheBlockSize;
        return $this;
    }

    public function getCacheOverflowSize(): ?int
    {
        return $this->cacheOverflowSize;
    }

    public function setCacheOverflowSize(?int $cacheOverflowSize): static
    {
        $this->cacheOverflowSize = $cacheOverflowSize;
        return $this;
    }

    public function getMaxConcurrentDatasourceRequests(): ?int
    {
        return $this->maxConcurrentDatasourceRequests;
    }

    public function setMaxConcurrentDatasourceRequests(?int $maxConcurrentDatasourceRequests): static
    {
        $this->maxConcurrentDatasourceRequests = $maxConcurrentDatasourceRequests;
        return $this;
    }

    public function getInfiniteInitialRowCount(): ?int
    {
        return $this->infiniteInitialRowCount;
    }

    public function setInfiniteInitialRowCount(?int $infiniteInitialRowCount): static
    {
        $this->infiniteInitialRowCount = $infiniteInitialRowCount;
        return $this;
    }

    public function getMaxBlocksInCache(): ?int
    {
        return $this->maxBlocksInCache;
    }

    public function setMaxBlocksInCache(?int $maxBlocksInCache): static
    {
        $this->maxBlocksInCache = $maxBlocksInCache;
        return $this;
    }

}
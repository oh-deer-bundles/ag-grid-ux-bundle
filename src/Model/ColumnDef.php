<?php

namespace Odb\AgGridUxBundle\Model;


class ColumnDef extends Column  implements AgGridObjectInterface
{
    use ViewCreator;
    private ?string $field = null;
    private ?string $colId = null;
    private ?string $type = null;
    private null|string|bool $cellDataType = null;
    private ?string $valueGetter = null;
    private ?string $valueFormatter = null;
    private ?string $refData = null;
    private ?bool $checkboxSelection = null;
    private ?bool $showDisabledCheckboxes = null;
    private null|string|array $toolPanelClass = null;
    private ?bool $suppressColumnsToolPanel = null;
    private ?string $icons = null;
    private ?bool $hide = null;
    private ?bool $initialHide = null;
    private ?bool $lockVisible = null;
    private null|string|bool $lockPosition = null;
    private ?bool $suppressMovable = null;
    private ?bool $useValueFormatterForExport = null;
    private ?bool $singleClickEdit = null;
    private ?bool $useValueParserForImport = null;
    private ?bool $suppressFiltersToolPanel = null;
    private ?bool $headerName = null;
    private ?string $headerValueGetter = null;
    private ?string $headerTooltip = null;
    private ?string $headerCheckboxSelection = null;
    private ?bool $headerCheckboxSelectionFilteredOnly = null;
    private ?bool $headerCheckboxSelectionCurrentPageOnly = null;
    private null|bool|string $pinned = null;
    private null|bool|string $initialPinned = null;
    private ?bool $lockPinned = null;
    private ?bool $pivot = null;
    private ?bool $initialPivot = null;
    private ?int $pivotIndex = null;
    private ?int $initialPivotIndex = null;
    private ?bool $enablePivot = null;

    private ?bool $wrapText = null;

    private ?string $sort = null;
    private ?string $initialSort = null;
    private ?int $sortIndex = null;
    private ?int $initialSortIndex = null;
    private ?bool $unSortIcon = null;
    private ?int $initialFlex = null;
    private ?bool $suppressSizeToFit = null;
    private ?bool $suppressAutoSize = null;

    private ?string $cellEditor = null;

    private ?array $cellEditorParams = null;

    public function getField(): ?string
    {
        return $this->field;
    }

    public function setField(?string $field): static
    {
        $this->field = $field;
        return $this;
    }

    public function getColId(): ?string
    {
        return $this->colId;
    }

    public function setColId(?string $colId): static
    {
        $this->colId = $colId;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function getCellDataType(): bool|string|null
    {
        return $this->cellDataType;
    }

    public function setCellDataType(bool|string|null $cellDataType): static
    {
        $this->cellDataType = $cellDataType;
        return $this;
    }

    public function getValueGetter(): ?string
    {
        return $this->valueGetter;
    }

    public function setValueGetter(?string $valueGetter): static
    {
        $this->valueGetter = $valueGetter;
        return $this;
    }

    public function getValueFormatter(): ?string
    {
        return $this->valueFormatter;
    }

    public function setValueFormatter(?string $valueFormatter): static
    {
        $this->valueFormatter = $valueFormatter;
        return $this;
    }

    public function getRefData(): ?string
    {
        return $this->refData;
    }

    public function setRefData(?string $refData): static
    {
        $this->refData = $refData;
        return $this;
    }

    public function isCheckboxSelection(): ?bool
    {
        return $this->checkboxSelection;
    }

    public function setCheckboxSelection(?bool $checkboxSelection): static
    {
        $this->checkboxSelection = $checkboxSelection;
        return $this;
    }

    public function isShowDisabledCheckboxes(): ?bool
    {
        return $this->showDisabledCheckboxes;
    }

    public function setShowDisabledCheckboxes(?bool $showDisabledCheckboxes): static
    {
        $this->showDisabledCheckboxes = $showDisabledCheckboxes;
        return $this;
    }

    public function getToolPanelClass(): array|string|null
    {
        return $this->toolPanelClass;
    }

    public function setToolPanelClass(array|string|null $toolPanelClass): static
    {
        $this->toolPanelClass = $toolPanelClass;
        return $this;
    }

    public function isSuppressColumnsToolPanel(): ?bool
    {
        return $this->suppressColumnsToolPanel;
    }

    public function setSuppressColumnsToolPanel(?bool $suppressColumnsToolPanel): static
    {
        $this->suppressColumnsToolPanel = $suppressColumnsToolPanel;
        return $this;
    }

    public function getIcons(): ?string
    {
        return $this->icons;
    }

    public function setIcons(?string $icons): static
    {
        $this->icons = $icons;
        return $this;
    }

    public function isHide(): ?bool
    {
        return $this->hide;
    }

    public function setHide(?bool $hide): static
    {
        $this->hide = $hide;
        return $this;
    }

    public function isInitialHide(): ?bool
    {
        return $this->initialHide;
    }

    public function setInitialHide(?bool $initialHide): static
    {
        $this->initialHide = $initialHide;
        return $this;
    }

    public function isLockVisible(): ?bool
    {
        return $this->lockVisible;
    }

    public function setLockVisible(?bool $lockVisible): static
    {
        $this->lockVisible = $lockVisible;
        return $this;
    }

    public function getLockPosition(): bool|string|null
    {
        return $this->lockPosition;
    }

    public function setLockPosition(bool|string|null $lockPosition): static
    {
        $this->lockPosition = $lockPosition;
        return $this;
    }

    public function isSuppressMovable(): ?bool
    {
        return $this->suppressMovable;
    }

    public function setSuppressMovable(?bool $suppressMovable): static
    {
        $this->suppressMovable = $suppressMovable;
        return $this;
    }

    public function isUseValueFormatterForExport(): ?bool
    {
        return $this->useValueFormatterForExport;
    }

    public function setUseValueFormatterForExport(?bool $useValueFormatterForExport): static
    {
        $this->useValueFormatterForExport = $useValueFormatterForExport;
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

    public function isUseValueParserForImport(): ?bool
    {
        return $this->useValueParserForImport;
    }

    public function setUseValueParserForImport(?bool $useValueParserForImport): static
    {
        $this->useValueParserForImport = $useValueParserForImport;
        return $this;
    }

    public function isSuppressFiltersToolPanel(): ?bool
    {
        return $this->suppressFiltersToolPanel;
    }

    public function setSuppressFiltersToolPanel(?bool $suppressFiltersToolPanel): static
    {
        $this->suppressFiltersToolPanel = $suppressFiltersToolPanel;
        return $this;
    }

    public function isHeaderName(): ?bool
    {
        return $this->headerName;
    }

    public function setHeaderName(?bool $headerName): static
    {
        $this->headerName = $headerName;
        return $this;
    }

    public function getHeaderValueGetter(): ?string
    {
        return $this->headerValueGetter;
    }

    public function setHeaderValueGetter(?string $headerValueGetter): static
    {
        $this->headerValueGetter = $headerValueGetter;
        return $this;
    }

    public function getHeaderTooltip(): ?string
    {
        return $this->headerTooltip;
    }

    public function setHeaderTooltip(?string $headerTooltip): static
    {
        $this->headerTooltip = $headerTooltip;
        return $this;
    }

    public function getHeaderCheckboxSelection(): ?string
    {
        return $this->headerCheckboxSelection;
    }

    public function setHeaderCheckboxSelection(?string $headerCheckboxSelection): static
    {
        $this->headerCheckboxSelection = $headerCheckboxSelection;
        return $this;
    }

    public function isHeaderCheckboxSelectionFilteredOnly(): ?bool
    {
        return $this->headerCheckboxSelectionFilteredOnly;
    }

    public function setHeaderCheckboxSelectionFilteredOnly(?bool $headerCheckboxSelectionFilteredOnly): static
    {
        $this->headerCheckboxSelectionFilteredOnly = $headerCheckboxSelectionFilteredOnly;
        return $this;
    }

    public function isHeaderCheckboxSelectionCurrentPageOnly(): ?bool
    {
        return $this->headerCheckboxSelectionCurrentPageOnly;
    }

    public function setHeaderCheckboxSelectionCurrentPageOnly(?bool $headerCheckboxSelectionCurrentPageOnly): static
    {
        $this->headerCheckboxSelectionCurrentPageOnly = $headerCheckboxSelectionCurrentPageOnly;
        return $this;
    }

    public function getPinned(): bool|string|null
    {
        return $this->pinned;
    }

    public function setPinned(bool|string|null $pinned): static
    {
        $this->pinned = $pinned;
        return $this;
    }

    public function getInitialPinned(): bool|string|null
    {
        return $this->initialPinned;
    }

    public function setInitialPinned(bool|string|null $initialPinned): static
    {
        $this->initialPinned = $initialPinned;
        return $this;
    }

    public function isLockPinned(): ?bool
    {
        return $this->lockPinned;
    }

    public function setLockPinned(?bool $lockPinned): static
    {
        $this->lockPinned = $lockPinned;
        return $this;
    }

    public function isPivot(): ?bool
    {
        return $this->pivot;
    }

    public function setPivot(?bool $pivot): static
    {
        $this->pivot = $pivot;
        return $this;
    }

    public function isInitialPivot(): ?bool
    {
        return $this->initialPivot;
    }

    public function setInitialPivot(?bool $initialPivot): static
    {
        $this->initialPivot = $initialPivot;
        return $this;
    }

    public function getPivotIndex(): ?int
    {
        return $this->pivotIndex;
    }

    public function setPivotIndex(?int $pivotIndex): static
    {
        $this->pivotIndex = $pivotIndex;
        return $this;
    }

    public function getInitialPivotIndex(): ?int
    {
        return $this->initialPivotIndex;
    }

    public function setInitialPivotIndex(?int $initialPivotIndex): static
    {
        $this->initialPivotIndex = $initialPivotIndex;
        return $this;
    }

    public function isEnablePivot(): ?bool
    {
        return $this->enablePivot;
    }

    public function setEnablePivot(?bool $enablePivot): static
    {
        $this->enablePivot = $enablePivot;
        return $this;
    }

    public function isWrapText(): ?bool
    {
        return $this->wrapText;
    }

    public function setWrapText(?bool $wrapText): static
    {
        $this->wrapText = $wrapText;
        return $this;
    }

    public function getSort(): ?string
    {
        return $this->sort;
    }

    public function setSort(?string $sort): static
    {
        $this->sort = $sort;
        return $this;
    }

    public function getInitialSort(): ?string
    {
        return $this->initialSort;
    }

    public function setInitialSort(?string $initialSort): static
    {
        $this->initialSort = $initialSort;
        return $this;
    }

    public function getSortIndex(): ?int
    {
        return $this->sortIndex;
    }

    public function setSortIndex(?int $sortIndex): static
    {
        $this->sortIndex = $sortIndex;
        return $this;
    }

    public function getInitialSortIndex(): ?int
    {
        return $this->initialSortIndex;
    }

    public function setInitialSortIndex(?int $initialSortIndex): static
    {
        $this->initialSortIndex = $initialSortIndex;
        return $this;
    }

    public function isUnSortIcon(): ?bool
    {
        return $this->unSortIcon;
    }

    public function setUnSortIcon(?bool $unSortIcon): static
    {
        $this->unSortIcon = $unSortIcon;
        return $this;
    }

    public function getInitialFlex(): ?int
    {
        return $this->initialFlex;
    }

    public function setInitialFlex(?int $initialFlex): static
    {
        $this->initialFlex = $initialFlex;
        return $this;
    }

    public function isSuppressSizeToFit(): ?bool
    {
        return $this->suppressSizeToFit;
    }

    public function setSuppressSizeToFit(?bool $suppressSizeToFit): static
    {
        $this->suppressSizeToFit = $suppressSizeToFit;
        return $this;
    }

    public function isSuppressAutoSize(): ?bool
    {
        return $this->suppressAutoSize;
    }

    public function setSuppressAutoSize(?bool $suppressAutoSize): static
    {
        $this->suppressAutoSize = $suppressAutoSize;
        return $this;
    }

    public function getCellEditor(): ?string
    {
        return $this->cellEditor;
    }

    public function setCellEditor(?string $cellEditor): static
    {
        $this->cellEditor = $cellEditor;
        return $this;
    }

    public function getCellEditorParams(): ?array
    {
        return $this->cellEditorParams;
    }

    public function setCellEditorParams(?array $cellEditorParams): static
    {
        $this->cellEditorParams = $cellEditorParams;
        return $this;
    }



}
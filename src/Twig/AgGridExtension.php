<?php

namespace Odb\AgGridUxBundle\Twig;

use Odb\AgGridUxBundle\Model\AgGrid;
use Symfony\UX\StimulusBundle\Helper\StimulusHelper;
use Symfony\WebpackEncoreBundle\Twig\StimulusTwigExtension;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AgGridExtension  extends AbstractExtension
{
    private $stimulus;


    public function __construct(StimulusHelper|StimulusTwigExtension $stimulus)
    {
        if ($stimulus instanceof StimulusTwigExtension) {
            $stimulus = new StimulusHelper(null);
        }

        $this->stimulus = $stimulus;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('render_ag_grid', [$this, 'renderAgGrid'], ['is_safe' => ['html']]),
        ];
    }

    public function renderAgGrid(AgGrid $agGrid, array $attributes = []): string
    {
        $agGrid->setAttributes(array_merge($agGrid->getAttributes(), $attributes));

        $controllers = [];
        if ($agGrid->getDataController()) {
            $controllers[$agGrid->getDataController()] = [];
        }
        $controllers['@oh-deer-bundles/ag-grid-ux-bundle/ag-grid'] = ['options' => $agGrid->createView()];

        $stimulusAttributes = $this->stimulus->createStimulusAttributes();
        foreach ($controllers as $name => $controllerValues) {
            $stimulusAttributes->addController($name, $controllerValues);
        }

        foreach ($agGrid->getAttributes() as $name => $value) {
            if ('data-controller' === $name) {
                continue;
            }

            if (true === $value) {
                $stimulusAttributes->addAttribute($name, $name);
            } elseif (false !== $value) {
                $stimulusAttributes->addAttribute($name, $value);
            }
        }

        return \sprintf('<div %s></div>', $stimulusAttributes);
    }
}
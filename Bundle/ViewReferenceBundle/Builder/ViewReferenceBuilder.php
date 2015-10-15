<?php

namespace Victoire\Bundle\ViewReferenceBundle\Builder;

use Doctrine\ORM\EntityManager;
use Victoire\Bundle\CoreBundle\Entity\WebViewInterface;
use Victoire\Bundle\ViewReferenceBundle\Builder\Chain\ViewReferenceBuilderChain;

/**
 * Page helper
 * ref: victoire_view_reference.builder.
 */
class ViewReferenceBuilder
{
    protected $viewReferenceBuilderChain;

    public function __construct(ViewReferenceBuilderChain $viewReferenceBuilderChain)
    {
        $this->viewReferenceBuilderChain = $viewReferenceBuilderChain;
    }

    /**
     * compute the viewReference relative to a View + entity.
     *
     * @param WebViewInterface $view
     *
     * @return array
     */
    public function buildViewReference(WebViewInterface $view, EntityManager $em = null)
    {
        $viewReferenceBuilder = $this->viewReferenceBuilderChain->getViewReferenceBuilder($view);
        $viewReference = $viewReferenceBuilder->buildReference($view, $em);

        return $viewReference;
    }
}

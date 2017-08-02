<?php

namespace Runroom\StaticPageBundle\Service;

use Runroom\BaseBundle\Service\MetaInformationProvider\AbstractMetaInformationProvider;

class StaticPageMetaInformationProvider extends AbstractMetaInformationProvider
{
    public static $routes = ['runroom.static_page.route.static.static'];

    protected function getEntityMetaInformation($model)
    {
        return $model->getStaticPage()->getMetaInformation();
    }

    protected function getPlaceholders($model): array
    {
        return [
            '{title}' => $model->getStaticPage()->getTitle(),
            '{content}' => $model->getStaticPage()->getContent(),
        ];
    }

    protected function getModelMetaImage($model)
    {
    }
}

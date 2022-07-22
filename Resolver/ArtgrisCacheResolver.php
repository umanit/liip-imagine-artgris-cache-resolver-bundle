<?php

namespace Umanit\LiipImagineArtgrisCacheResolverBundle\Resolver;

use Liip\ImagineBundle\Imagine\Cache\Helper\PathHelper;
use Liip\ImagineBundle\Imagine\Cache\Resolver\WebPathResolver;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Routing\RequestContext;

class ArtgrisCacheResolver extends WebPathResolver
{
    public function __construct(
        Filesystem $filesystem,
        RequestContext $requestContext,
        $webRootDir,
        $cachePrefix = 'media/cache'
    ) {
        parent::__construct($filesystem, $requestContext, $webRootDir, $cachePrefix);

        $this->webRoot = rtrim(str_replace('//', '/', $webRootDir), '/');
        $this->cachePrefix = ltrim(str_replace('//', '/', $cachePrefix), '/');
        $this->cacheRoot = $this->webRoot.'/'.$this->cachePrefix;
    }

    /**
     * {@inheritdoc}
     */
    protected function getFilePath($path, $filter)
    {
        return $this->webRoot.'/'.$this->getFullPath($path, $filter);
    }

    /**
     * {@inheritdoc}
     */
    protected function getFileUrl($path, $filter)
    {
        return PathHelper::filePathToUrlPath($this->getFullPath($path, $filter));
    }

    /**
     * {@inheritdoc}
     */
    private function getFullPath($path, $filter)
    {
        $path = str_replace('://', '---', $path);

        return $this->cachePrefix.'/'.$filter.'/'.ltrim(urldecode($path), '/');
    }
}

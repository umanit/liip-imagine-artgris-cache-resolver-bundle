# liip-imagine-artgris-cache-resolver-bundle

This cache resolver adds a urldecode feature on the filepath to handle files uploaded with artgris.

## Install

Install with composer :

```
composer require umanit/liip-imagine-artgris-cache-resolver-bundle
```

Register the bundle to your config/bundles.php :

```php
<?php

return [
    // ...
    Umanit\LiipImagineArtgrisCacheResolverBundle\UmanitLiipImagineArtgrisCacheResolverBundle::class => ['all' => true],

];
```

Use this cache resolver in your Liip Imagine configuration :

```yaml
liip_imagine:
    cache: artgris_resolver
```

and remove the default resolver configuration if it exists :

```yaml
liip_imagine:
    resolvers: # this config is not needed anymore
        default:
            web_path:
                # ...
```


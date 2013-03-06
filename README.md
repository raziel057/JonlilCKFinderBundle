#### JonlilCKFinderBundle

1) Installation
-------------------------

```json
"require": {
    "egeloen/ckeditor-bundle": "2.1.*",
    "jonlil/ckfinder-bundle": "dev-master",
    "jonlil/ckfinder": "dev-master"
},
"repositories": [
    {"type": "vcs", "url": "https://github.com/jonlil/JonlilCKFinderBundle"},
    {"type": "vcs", "url": "https://github.com/jonlil/ckfinder"}
]
```

```php
public function registerBundles()
{
    $bundles = array(
        new Ivory\CKEditorBundle\IvoryCKEditorBundle(),
        new Jonlil\CKFinderBundle\JonlilCKFinderBundle('IvoryCKEditorBundle'),
    );
}
```

2) Configuration
--------------------------

##### For usage with amazon s3
```yaml
# app/config.yml

jonlil_ck_finder:
    license:
        key: ""
        name: ""
    baseDir: "/"
    baseUrl: "http://s3.amazonaws.com"
    service: "s3"
    accessKey: ""
    secret: ""
    bucket: ""
```
##### For usage with native php storage
```yaml
jonlil_ck_finder:
    license: # optional, can be used in demo mode also
        key: ""
        name: ""
    baseDir: "%assetic.read_from%"
    baseUrl: "/userfiles/"  # path where your files will be stored
    service: "php"
```

3) Usage
--------------------------
```php

# in your symfony2 form - add this
public function buildForm (FormBuilderInterface $builder, array $options)
{
    $builder
        ->add('title')
        ->add('text', 'ckfinder')
        ->add('createdAt')
        ->add('updatedAt')
    ;
}
```





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
    {"type": "vcs", "url": "https://github.com/jonlil/JonlikCKFinderBundle"},
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

2) Usage
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





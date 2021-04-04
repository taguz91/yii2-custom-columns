Custom Columns
==============
This columns is aplicable to grid view, for bootstrap 4 

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require taguz91/yii2-custom-columns
```

or add

```
"taguz91/yii2-custom-columns": "~1.0.0"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php 

GridView::widget([
  'dataProvider' => $dataProvider,
  'filterModel' => $searchModel,
  'columns' => [
    ['class' => 'yii\grid\SerialColumn'],
    [
      'class' => \taguz91\CustomColumns\ArrayValueColumn::class,
      'array' => ['1' => 'One', '2' => 'Two'],
      'default' => 'default',
      'attribute' => 'attribute',
    ],

    [
      'class' => \taguz91\CustomColumns\CashColumn::class,
      'attribute' => 'attribute',
    ],

    [
      'class' => \taguz91\CustomColumns\ImageColumn::class,
      'attribute' => 'attribute',
      'urlPrefix' => 'static/images',
    ],

    [
      'class' => \taguz91\CustomColumns\ModalColumn::class,
      'attribute' => 'attribute',
      'modalTitle' => 'Detail view',
      'render' => Url::to(['detail', 'id' => 1]),
    ],

    [
      'class' => \taguz91\CustomColumns\MongoDateColumn::class,
      'attribute' => 'attribute',
    ],

    [
      'class' => \taguz91\CustomColumns\PrefixColumn::class,
      'attribute' => 'attribute',
    ],

    [
      'class' => \taguz91\CustomColumns\ShowColumn::class,
      'attribute' => 'attribute',
      'redirectTo' => 'detail/view'
    ],

    [
      'class' => \taguz91\CustomColumns\SwitchColumn::class,
      'attribute' => 'attribute',
    ],

    [
      'class' => \taguz91\CustomColumns\SwitchColumn::class,
      'attribute' => 'attribute',
      'api' => 'api/v1/toggle', // This endpoint add the primarykey 
      'active' => true, // Condition for activate the toggle 
    ],

    [
      'class' => \taguz91\CustomColumns\UpdatedAtColumn::class,
    ],
  ],
]);

```

For ```\taguz91\CustomColumns\ModalColumn``` you need to include the modal widget in your layout 

```php 
<?= \taguz91\CustomColumns\widgets\ModalAjax::widget() ?>
```

For ```\taguz91\CustomColumns\SwitchColumn::class``` you need to include the bootstrap4-toogle assets in your AppAsset

```php
$depends = [
  ...,
  \taguz91\CustomColumns\assets\ToggleAsset::class
];
```
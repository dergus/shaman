<?php
use yii\widgets\DetailView;
/** @var array $info */
?>

<?= DetailView::widget([
    'model'      => $info,
    'attributes' => [
        'id',
        'name',
        'email',
        'role.name',
        [
            'label' => 'Secret Key',
            'value' => function($info) {
                return base64_decode($info['secretKey']);
            }
        ]
    ]
]);

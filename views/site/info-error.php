<?php
/** @var array $errors */
use yii\helpers\Html;

?>
<h3>
    <?= Yii::t('app', 'Following errors happened while performing request') ?>
</h3>
<?php foreach ($errors as $attr => $error): ?>
    <?= Html::encode($error) ?> <br>
<?php endforeach; ?>

<?php $provinces = Province::listProvinces(); ?>
<?php foreach ($provinces as $key => $province): ?>
    <option value="<?php echo CHtml::encode($key); ?>"><?php echo CHtml::encode($province); ?></option>
<?php endforeach; ?>


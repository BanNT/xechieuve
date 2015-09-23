<?php $provinces = Province::listProvinces(); ?>
<?php foreach ($provinces as $key => $province): ?>
    <option value="<?php echo $key ?>"><?php echo $province ?></option>
<?php endforeach; ?>


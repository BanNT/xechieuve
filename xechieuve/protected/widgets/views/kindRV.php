<?php
foreach ($loaiTinRV as $tinRV):
    ?>
    <option value="<?php echo CHtml::encode($tinRV->ma_loai_tin_rv) ?>"><?php echo CHtml::encode($tinRV->loai_tin_rv) ?></option>
    <?php
endforeach;
?>
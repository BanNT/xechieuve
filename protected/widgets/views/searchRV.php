<div class="col-md-12">
    <h6>Tìm kiếm</h6>
    <form action="" method="">
        <select>
            <option>Loaị tin rao vặt</option>
            <?php $this->widget('application.widgets.provinces'); ?>
        </select>
        <select>
            <option>Chọn nơi đến</option>
            <?php $this->widget('application.widgets.provinces'); ?>
        </select>
        <input type="date"/>
        <input type="submit" value="Tìm kiếm"/>
    </form>
</div>
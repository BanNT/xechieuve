<div style="margin-top: 50px;" class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body" style="color: #ff9999">
                <?php echo CHtml::encode($this->message); ?>
            </div>
        </div>
    </div>
</div>
<script>
    $('#myModal').modal('show');
</script>
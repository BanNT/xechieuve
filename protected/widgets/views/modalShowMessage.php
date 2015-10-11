<div style="margin-top: 50px;" class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <br/>
            </div>
            <div class="modal-body">
                <?php echo CHtml::encode($this->message); ?>
            </div>
        </div>
    </div>
</div>
<script>
    $('#myModal').modal('show');
</script>
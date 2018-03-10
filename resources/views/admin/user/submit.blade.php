<div class="modal fade" id="submitModal" tabindex="-1" role="dialog" aria-labelledby="submitModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal"  action="" method="post">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="submitModalLabel">归还记录</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="input1" class="col-sm-2 control-label">备忘人</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input1" name="rememo_id" placeholder="请输入备忘人学号确认">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
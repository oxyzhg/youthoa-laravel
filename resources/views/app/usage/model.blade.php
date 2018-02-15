<div class="modal fade" id="1Modal" tabindex="-1" role="dialog" aria-labelledby="1ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal"  action="usage" method="post">
                {{csrf_field()}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="1ModalLabel">新建使用记录</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="input1" class="col-sm-2 control-label">设备名称</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="input1" name="machine">
                                <option>单反-佳能</option>
                                <option>单反-尼康</option>
                                <option>DV</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input2" class="col-sm-2 control-label">活动名称</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input2" name="activity" placeholder="请输入活动名称">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input3" class="col-sm-2 control-label">使用时间</label>
                        <div class="col-sm-10 input-group date" id="datetimepicker" style="padding: 0 15px;">
                            <input type='text' class="form-control" id="input3" name="datetime" placeholder="请选择日期时间">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input4" class="col-sm-2 control-label">使用人</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input4" name="borrower_id" placeholder="请输入使用人学号确认">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input5" class="col-sm-2 control-label">备忘人</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input5" name="memo_id" placeholder="请输入备忘人学号确认">
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

<div class="modal fade" id="2Modal" tabindex="-1" role="dialog" aria-labelledby="2ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal"  action="" method="post">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="2ModalLabel">归还记录</h4>
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
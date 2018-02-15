<div class="modal fade" id="1Modal" tabindex="-1" role="dialog" aria-labelledby="1ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" action="workload" method="post">
                {{csrf_field()}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="1ModalLabel">新建工作量化</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="input11" class="col-sm-2 control-label">学号</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input11" name="member_id" placeholder="请输入该同学学号">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input12" class="col-sm-2 control-label">工作概述</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input12" name="description" placeholder="请概述该同学工作情况">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input13" class="col-sm-2 control-label">工作量</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="input13" name="workload" placeholder="请输入该同学应得工作量">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input5" class="col-sm-2 control-label">统计者</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input5" name="handler_id" placeholder="请输入统计者学号">
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
            <form class="form-horizontal" action="workload" method="post">
                {{method_field('DELETE')}}
                {{csrf_field()}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="2ModalLabel">删除确认</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="input21" class="col-sm-2 control-label">操作者</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input21" name="handler_id" placeholder="请输入操作者学号确认">
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
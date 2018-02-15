<div class="modal fade" id="1Modal" tabindex="-1" role="dialog" aria-labelledby="1ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal"  action="/admin/schedule/store" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="1ModalLabel">新建日程</h4>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="input1" class="col-sm-2 control-label">活动名称</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input1" name="name" placeholder="请输入活动名称">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input2" class="col-sm-2 control-label">活动地点</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input2" name="location" placeholder="请输入活动地点">
                        </div>
                    </div>
                    {{--活动时间选择--}}
                    <div class="form-group">
                        <label for="input3" class="col-sm-2 control-label">活动时间</label>
                        <div class="col-sm-10 input-group date" id="datetimepicker" style="padding: 0 15px;">
                            <input type='text' class="form-control" id="input3" name="datetime" placeholder="请选择日期时间">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input4" class="col-sm-2 control-label">学号</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input4" name="sdut_id" placeholder="请输入你的学号确认">
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
                {{method_field('PUT')}}
                {{csrf_field()}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="2ModalLabel">操作确认</h4>
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
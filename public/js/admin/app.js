$(function () {
    $('#recordtable').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true,
        'lengthMenu': [[10, 20, -1], [10, 20, "All"]],
        "language": { "zeroRecords": "没有找到数据喔！" }
    });
    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
        this.alert('close')
    });
});
@extends('BTVN_layout.master')
@section('css')
<style>
    body {
        font-family: 'Lato';
    }

    .fa-btn {
        margin-right: 1px;
    }
    .task-table tbody tr td:nth-child(2){
        width: 120px;
    }
    .task-table tbody tr td:nth-child(3){
        width: 100px;
    }
    .footer{
        height:50px;
        width: 100%;
        background:#f8f8f8;
        color:#777;
        text-align: center;
        line-height: 50px;
    }
    
</style>
@endsection
@section('content')
<div class="col-sm-offset-2 col-sm-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thêm công việc mới
        </div>

        <div class="panel-body">
            <!-- Display Validation Errors -->

        <!-- New Task Form -->
            <form action="{{ url('task')}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
                <div class="form-group">
                    <label for="task-name" class="col-sm-3 control-label">Tên công việc</label>

                    <div class="col-sm-6">
                        <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                    </div>
                </div>

                <!-- Add Task Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn fa-plus"></i>Thêm công việc
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Current Tasks -->
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách công việc hiện tại
        </div>
        

        <div class="panel-body">
            <table class="table table-striped task-table">
                <thead>
                <th>Tên công việc</th>
                <th>&nbsp;</th>
                </thead>
                <tbody>
                <tr>
                    <td class="table-text"><div>Làm bài tập Laravel </div></td>
                    <!-- Task Complete Button -->
                    <td>
                        <a href="{{ url('task/complete/3') }}" type="submit" class="btn btn-success">
                            <i class="fa fa-btn fa-check"></i>Hoàn thành
                        </a>
                    </td>
                    <!-- Task Delete Button -->
                    <td>
                        <form action="{{ url('task/1') }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash"></i>Xoá
                            </button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td class="table-text"><div>Làm bài tập PHP  </div></td>
                    <!-- Task Complete Button -->
                    <td>
                        <a href="{{ url('task/complete/3') }}" type="submit" class="btn btn-success">
                            <i class="fa fa-btn fa-check"></i>Hoàn thành
                        </a>
                    </td>
                    <!-- Task Delete Button -->
                    <td>
                        <form action="{{ url('task/2') }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash"></i>Xoá
                            </button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td class="table-text"><div><strike>Làm project Laravel </strike></div></td>
                    <!-- Task Complete Button -->
                    <td>
                        <a href="{{ url('task/reset/3') }}" type="submit" class="btn btn-success">
                            <i class="fa fa-btn fa-refresh"></i>Làm lại
                        </a>
                    </td>
                    <!-- Task Delete Button -->
                    <td>
                        <form action="{{ url('task/3') }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash"></i>Xoá
                            </button>
                        </form>
                    </td>
                </tr>
                @foreach($lists as  $value)
                <tr>
                    <td><a href="{{ url('task/list') }}">{{ $value['name']}}</a></td>
                    <td>
                        @if($value['status']==0)
                            Chưa làm
        
                        @elseif($value['status']==1)
                            Đã hoàn thành
                        @elseif($value['status']==-1)
                            Không thực hiện
                        @endif
                    </td>
                </tr>
                @endforeach
               
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@endsection


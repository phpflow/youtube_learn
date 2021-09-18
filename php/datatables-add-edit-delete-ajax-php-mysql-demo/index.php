<?php 
include('partials/header.php');
?>
<title>phpflow.com : Datatables Add Edit Delete with Ajax, PHP & MySQL</title>
<style>
.btn-group-xs>.btn,
.btn-xs {
    padding: .25rem .4rem;
    font-size: .875rem;
    line-height: .5;
    border-radius: .2rem;
}
</style>
<script src="js/common.js"></script>
</head>

<body class="">
    <div class="container">
        <h3>Datatables CRUD Operation with Ajax Using PHP & MySQL</h3>
        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-10">
                        <button type="button" name="add" id="addEmployee" class="btn btn-success btn-xs"><i
                                class="bi bi-plus-circle-fill"></i> Add Employee</button>
                    </div>
                    <div class="col-md-2 pull-left">

                    </div>
                </div>
            </div>
            <table id="dt-employee" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Salary</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div id="employeeModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="employeeForm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Add/Edit User</h4>
                            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group" <label for="name" class="control-label">Name</label>
                                <input type="text" class="form-control" id="empName" name="empName" placeholder="Name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="age" class="control-label">Age</label>
                                <input type="number" class="form-control" id="empAge" name="empAge" placeholder="Age">
                            </div>
                            <div class="form-group">
                                <label for="salary" class="control-label">Salary</label>
                                <input type="number" class="form-control" id="empSalary" name="empSalary"
                                    placeholder="Salary">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="empId" id="empId" />
                            <input type="hidden" name="action" id="action" value="" />
                            <input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</div>
</body>
</html>

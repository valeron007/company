	<footer class="page-footer">
        <p id="console-input">Console></p>
        <div class="console">

        </div>
	</footer>

	<script src="js/jquery.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.btn-danger').on('click', function () {
                var id = this.getAttribute('data-id');
                $.ajax({
                        type:'get',
                        response:'json',
                        url:'employee_delete.php',
                        data: 'delete_id=' + id,
                        success:function (data) {
                            var result = JSON.parse(data);
                            $('.console').html(result.success);
                            location.reload();
                        },
                        error:function (data) {
                            var result = JSON.parse(data);
                            $('.console').html(result.error);
                        }
                });
            });
            $('.employee-add').on('click', function () {
                $('.modal-employee').show();
                $.ajax({
                    type:'post',
                    response:'json',
                    url:'department.php',
                    success:function (data) {
                        var departments = JSON.parse(data);
                        $('#inputDepartment > option').remove();
                        for(var department in departments){
                            var option = document.createElement('option');
                            option.setAttribute('value', departments[department].department_id);
                            option.innerHTML = departments[department].department_name;
                            $('#inputDepartment').append(option);
                        };
                    },
                    error:function (data) {
                        var result = JSON.parse(data);
                        $('.console').html(result.error);
                    }
                });
            });

            $('.model-close').on('click', function () {
                $('.modal-employee').hide();
            });

            function isEmpty(obj) {
                for (var key in obj) {
                    return false;
                }
                return true;
            }

            $('.add-employee').on('click', function () {
                event.preventDefault();
                var employee = {};
                employee['name'] = $('#inputName').val();
                employee['surname'] = $('#inputSurname').val();
                employee['patronymic'] = $('#inputPatronymic').val();
                var department = {};
                $('#inputDepartment :selected').map(function () {
                    department[$(this).val()] = $(this).text();
                });
                employee['departments'] = department;

                employee['salary'] = $('#inputSalary').val();
                employee['gender'] = $('#inputGender').val();

                //делаем проверку формы
                if(employee['name'] == ''){
                    $('.console').html('Введите имя сотрудника');
                    return false;
                }

                if(employee['surname'] == ''){
                    $('.console').html('Введите фамилию сотрудника');
                    return false;
                }

                if(isEmpty(employee['departments'])){
                    $('.console').html('Выбеите отдел сотрудника');
                    return false;
                }

                $.ajax({
                    url:'/edit_employee.php',
                    data: {'employee' : employee},
                    type:'POST',
                    response:'json',
                    success:function (data) {

                    },
                    error:function (data) {

                    }
                });
                $('.modal-employee').hide();
            });

        });
    </script>
</body>
</html>




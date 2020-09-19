/* Expenses Category */
$("#frmExpenseCategory").validate( {
    errorElement: "em",
    errorPlacement: function ( error, element ) {
        // Add the `invalid-feedback` class to the error element
        error.addClass( "invalid-feedback" );

        if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.next( "label" ) );
        } else {
            error.insertAfter( element );
        }
    },
    highlight: function ( element, errorClass, validClass ) {
        $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
    },
    unhighlight: function (element, errorClass, validClass) {
        $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
    }
});
function showAddCategoryModal() {
    
    //Set Form
    $('#frmExpenseCategory')[0].reset();
    var frmAction = $("[name='_action']").val();
    $('#frmExpenseCategory').attr('action',frmAction);
    $("#frmExpenseCategory button[type=submit]").html("Save");
    
    //Set Modal
    $('#expenseCategoryLabel').html("Add Category");
    $('#expenseCategoryModal').modal('show');
    $('#expenseCategoryModal').on('shown.bs.modal', function () {
        $('input:visible:enabled:first', this).focus();
    }) 
}  
function showEditCategoryModal(displayName, description, id) {
    
    //Set Form
    var frmAction = $("[name='_action']").val() + "/" + id;
    $('#frmExpenseCategory').attr('action',frmAction);
    $("#frmExpenseCategory button[type=submit]").html("Update");
    
    //Render Modal
    $('#displayName').val(displayName);
    $('#description').val(description);
    $('#expenseCategoryLabel').html("Update Category");
    $('#expenseCategoryModal').modal('show');
}

/* Expenses */
$("#frmExpenses").validate( {
    errorElement: "em",
    errorPlacement: function ( error, element ) {
        // Add the `invalid-feedback` class to the error element
        error.addClass( "invalid-feedback" );

        if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.next( "label" ) );
        } else {
            error.insertAfter( element );
        }
    },
    highlight: function ( element, errorClass, validClass ) {
        $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
    },
    unhighlight: function (element, errorClass, validClass) {
        $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
    }
});
function showAddExpensesModal() {

    //Set Form
    $('#frmExpenses')[0].reset();
    var frmAction = $("[name='_action']").val();
    $('#frmExpenses').attr('action',frmAction);
    $("#frmExpenses button[type=submit]").html("Save");
    
    //Set Modal
    $('#expensesLabel').html("Add Expense");
    $('#expensesModal').modal('show');
    $('#expensesyModal').on('shown.bs.modal', function () {
        $('input:visible:enabled:first', this).focus();
    }) 
}

function showEditExpensesModal(category_id, amount, entry_date, id) {
    
    //Set Form
    var frmAction = $("[name='_action']").val() + "/" + id;
    $('#frmExpenses').attr('action',frmAction);
    $("#frmExpenses button[type=submit]").html("Update");
    
    //Set Modal
    $('#category_id').val(category_id);
    $('#amount').val(amount);
    $('#entry_date').val(entry_date);
    $('#expensesLabel').html("Update Expenses");
    $('#expensesModal').modal('show');
}

/* Users Role */
$("#frmUsersRole").validate( {
    errorElement: "em",
    errorPlacement: function ( error, element ) {
        // Add the `invalid-feedback` class to the error element
        error.addClass( "invalid-feedback" );

        if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.next( "label" ) );
        } else {
            error.insertAfter( element );
        }
    },
    highlight: function ( element, errorClass, validClass ) {
        $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
    },
    unhighlight: function (element, errorClass, validClass) {
        $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
    }
});


function showAddUsersRoleModal() {
    //Set Form
    $('#frmUsersRole')[0].reset();
    var frmAction = $("[name='_action']").val();
    $('#frmUsersRole').attr('action',frmAction);
    $("#frmUsersRole button[type=submit]").html("Save");
    
    //Set Modal
    $('#usersRoleLabel').html("Add Role");
    $('#usersRoleModal').modal('show');
    $('#usersRoleModal').on('shown.bs.modal', function () {
        $('input:visible:enabled:first', this).focus();
    }) 
}
function showEditUsersRoleModal(displayName, description, id) {
    
    //Set Form
    var frmAction = $("[name='_action']").val() + "/" + id;
    $('#frmUsersRole').attr('action',frmAction);
    $("#frmUsersRole button[type=submit]").html("Update");
    
    //Set Modal
    $('#displayName').val(displayName);
    $('#description').val(description);
    $('#usersRoleLabel').html("Update Category");
    $('#usersRoleModal').modal('show');
}

/* Users */
$("#frmUsers").validate( {
    rules : {
        confirm_password : {
            equalTo : "#password"
        }
    },
    errorElement: "em",
    errorPlacement: function ( error, element ) {
        // Add the `invalid-feedback` class to the error element
        error.addClass( "invalid-feedback" );

        if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.next( "label" ) );
        } else {
            error.insertAfter( element );
        }
    },
    highlight: function ( element, errorClass, validClass ) {
        $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
    },
    unhighlight: function (element, errorClass, validClass) {
        $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
    }
});


function showAddUsersModal() {
    
    //Set Form
    $('#frmUsers')[0].reset();
    var frmAction = $("[name='_action']").val();
    $('#frmUsers').attr('action',frmAction);
    $("#frmUsers button[type=submit]").html("Save");
    
    //Set Modal
    $('#passwordContainer').show();
    $('#usersLabel').html("Add User");
    $('#usersModal').modal('show');
    $('#usersModal').on('shown.bs.modal', function () {
        $('input:visible:enabled:first', this).focus();
    }) 
}

function showEditUsersModal(name, email, role, id) {
    
    //Set Form
    var frmAction = $("[name='_action']").val() + "/" + id;
    $('#frmUsers').attr('action',frmAction);
    $("#frmUsers button[type=submit]").html("Update");
    
    //Set Modal
    $('#name').val(name);
    $('#email').val(email);
    $('#role').val(role);
    $('#passwordContainer').hide();
    $('#usersLabel').html("Update User");
    $('#usersModal').modal('show');
}

function deleteItem(displayName,id) {
    $.confirm({
        title: 'Confirm',
        content: 'Delete '+displayName+' ?',
        buttons: {
            yes: {
                text: 'YES',
                btnClass: 'btn-red',
                action: function(){
                    window.location.href = $("[name='_action']").val() + "/delete/" + id;
                }
            },
            no: {
                text: 'NO (ESC)',
                btnClass: 'btn-white',
                keys: ['esc']
            }
        }
    });
}


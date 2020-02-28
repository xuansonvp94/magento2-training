define([
        'jquery',
        'uiComponent',
        'ko',
        'Magento_Ui/js/modal/modal'
    ],
    function($, Component, ko, modal) {
        "use strict";

        return Component.extend({
            defaults: {
                template: 'Dtn_Knockout/list'
            },

            employees: ko.observableArray([]),

            initialize: function (config) {
                this._super();
                if (config.employeeJson.length > 0) {
                    this.employees(config.employeeJson);
                    return this;
                }
            },

            createPopup: function (employee, event) {
                var EmplouyeeFormPopup = $('#employee-popup-modal');
                if(employee.entity_id == null) {
                    var options = {
                        type: 'popup',
                        responsive: true,
                        title: 'Add New Employee',
                        buttons: [{
                            text: $.mage.__('Cancel'),
                            click: function () {
                                this.closeModal();
                            }
                        }]
                    };
                    modal(options, $(EmplouyeeFormPopup));
                    $(EmplouyeeFormPopup).modal("openModal");
                } else {
                    var options = {
                        type: 'popup',
                        responsive: true,
                        title: 'Edit Employee',
                        buttons: [{
                            text: $.mage.__('Cancel'),
                            click: function () {
                                this.closeModal();
                            }
                        }]
                    };
                    modal(options, $(EmplouyeeFormPopup));
                    $(EmplouyeeFormPopup).find("input[name=entity_id]").val(employee.entity_id);
                    $(EmplouyeeFormPopup).find("select[name=department]").val(employee.department);
                    $(EmplouyeeFormPopup).find("input[name=name]").val(employee.name);
                    $(EmplouyeeFormPopup).find("input[name=email]").val(employee.email);
                    $(EmplouyeeFormPopup).find("input[name=salary]").val(employee.salary);
                    $(EmplouyeeFormPopup).modal("openModal");
                }
            },

            findIndex: function (arr,id) {
                var  indx = -1;
                arr.forEach(function(item, index){
                    if (item.entity_id == id) {
                        indx = index;
                    }
                });
                return indx;
            },

            save: function (data)
            {
                var employee = {},
                    self = this,
                    //*chuyển data từ form thành json  [{name: "department", value: "HR"}]*/
                    employeeDataForm = $(data).serializeArray();
                    /*chuyển data thành {''department: 'HR'}, array[] -> dùng forEach*/
                    employeeDataForm.forEach(function (entry) {
                        employee[entry.name] = entry.value;
                    });

                    $.ajax({
                        url: 'save',
                        data: JSON.stringify(employee),
                        type: "POST",
                        dataType: 'json',
                    })
                        .done(
                            function (response) {
                                if (response) {
                                    $.each(response, function (index, value) {
                                        var employeeIndex = self.findIndex(self.employees(), value.entity_id);
                                        if(employeeIndex == -1) {
                                            self.employees.unshift(value);
                                        } else {
                                            var currentEmployee = self.employees()[employeeIndex];
                                            self.employees.replace(currentEmployee, v);
                                        }
                                    });
                                }
                            }
                        );
                    $('.action-close').click();
            },

            delete: function (item)
            {
                var confirmDelete = confirm('Are you sure to delete ' + item.name + ' ?');
                var self = this;
                if (confirmDelete) {
                    var data = item;
                    $.ajax({
                        url: 'delete',
                        data: data,
                        type: "POST",
                        dataType: 'json',
                    })
                        .done(
                            function (response) {
                                if (response) {
                                    self.employees.remove(function (employee) {
                                        return employee.entity_id == response.entity_id;
                                    });
                                }
                            }
                        )
                }
            },
    });
});

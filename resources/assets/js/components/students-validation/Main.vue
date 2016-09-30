<template>
    <div class="panel panel-default col-sm-12">
        <div v-if="students.length == 0">
            Mensaje no students validation
        </div>
        <table n-if="students.length > 0" class="table table-striped table-hover table-responsive">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Date of request</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="student in students">
                    <td>
                        <a href="">{{student.full_name}}</a>
                    </td>
                    <td>{{student.date_of_request}}</td>
                    <td>
                        <span :class="statusClass(student)">{{student.status}}</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { studentsValidationResource } from '../../helpers/resources'

export default {
    data() {
        return {
            'students': []
        }
    },
    mounted() {
        this.fetchStudents();
    },
    methods: {
        fetchStudents() {
            studentsValidationResource.get()
                .then((response) => {
                    this.students = response;
                }, (errorResponse) => {
                    console.log(errorResponse);
                });
        },
        statusClass(student) {
            return {
                'label': true,
                'label-default': student.status == 'Pending',
                'label-success': student.status == 'Validated',
                'label-danger': student.status == 'Not validated'
            }
        }
    }
};
</script>

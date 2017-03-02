<template>
    <div class="panel panel-default col-sm-12">
        <div class="default-message" v-if="students.length == 0">
            No students
        </div>
        <table v-if="students.length > 0" class="table table-striped table-hover table-responsive">
            <thead>
                <tr>
                    <th>{{ $t('global.student') }}</th>
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
import { studentsValidationResource } from '../../resources/students-validation'
import { defaultErrorToast } from 'errors-handling.js';

export default {
    data() {
        return {
            'students': []
        }
    },
    ready() {
        this.fetchStudents();
    },
    methods: {
        fetchStudents() {
            studentsValidationResource.get()
                .then((response) => {
                    this.students = response.body;
                }, (errorResponse) => {
                    defaultErrorToast();
                });
        },
        statusClass(student) {
            return {
                'label': true,
                'label-warning': student.status == 'pending',
                'label-success': student.status == 'validated',
                'label-danger': student.status == 'denied'
            }
        }
    }
};
</script>

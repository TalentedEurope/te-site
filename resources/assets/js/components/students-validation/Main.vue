<template>
    <div class="panel panel-default">
        <div class="default-message" v-if="students.length == 0">
            <span v-if="!data_loaded">{{ $t('search.loading') }}...</span>
            <span v-if="data_loaded">{{ $t('students-validation.no_students') }}</span>
        </div>
        <table v-if="data_loaded && students.length > 0" class="table table-striped table-hover table-responsive">
            <thead>
                <tr>
                    <th>{{ $tc('global.student', 1) }}</th>
                    <th>{{ $t('students-validation.date_of_request') }}</th>
                    <th>{{ $t('global.status') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="student in students">
                    <td>
                        <a href="{{student.validation_url}}">{{student.full_name}}</a>
                    </td>
                    <td>{{student.date_of_request}}</td>
                    <td>
                        <span :class="getStatusClass(student)">{{getStatusText(student)}}</span>
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
            'students': [],
            'data_loaded': false
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
                    this.data_loaded = true;
                }, (errorResponse) => {
                    defaultErrorToast();
                });
        },
        getStatusClass(student) {
            return {
                'label': true,
                'label-warning': student.status == 'pending',
                'label-success': student.status == 'validated',
                'label-danger': student.status == 'denied'
            }
        },
        getStatusText(student) {
            if (student.status == 'pending') {
                return this.$t('students-validation.pending');
            } else if (student.status == 'validated') {
                return this.$t('students-validation.validated');
            } else {
                return this.$t('students-validation.not_validated');
            }
        }
    }
};
</script>

<template>
    <div class="row profile">
        <div class="col-xs-12">
            <profile-header :title="validator.full_name" :subtitle="validator.institution_name"></profile-header>

            <profile-section :title="'Validated students'" :icon-class="'fa fa-users'">
                <ul class="cards clearfix">
                    <li v-for="student in validator.validated_students">
                        <strong><i class="icon fa fa-user"></i>  <a href="">{{student.full_name}}</a> </strong>
                    </li>
                </ul>
            </profile-section>
        </div>
    </div>
</template>

<script>
import ProfileHeader from '../../common/ProfileHeader.vue';
import ProfileSection from '../../common/ProfileSection.vue';
import { validatorProfileResource } from 'resources/profile';

export default {
    components: {
        'profile-header': ProfileHeader,
        'profile-section': ProfileSection,
    },
    data() {
        return {
            'validator': {}
        }
    },
    mounted() {
        this.fetchValidator();
    },
    methods: {
        fetchValidator() {
            validatorProfileResource.get()
                .then((response) => {
                    this.validator = response.body;
                }, (errorResponse) => {
                    console.log(errorResponse);
                });
        }
    }
}
</script>

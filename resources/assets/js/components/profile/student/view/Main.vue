<template>
    <div class="row profile">
        <div class="col-xs-12 col-sm-8 col-md-9">
            <profile-header :title="student.full_name" :subtitle="student.studied"></profile-header>

            <profile-section :title="'About'" :icon-class="'fa fa-info'">
                <ul class="profile-specs">
                    <li>
                        <strong><i class="icon fa fa-map-marker"></i>  Lives in: </strong> {{student.lives_in}} |
                        <strong> Nationality: </strong> {{student.nationality}}
                    </li>
                    <li>
                        <strong><i class="icon fa fa-calendar"></i> Born on: </strong> {{student.born_on}}
                    </li>
                    <li>
                        <strong><i class="icon fa fa-lightbulb-o"></i> My talent:</strong> {{student.my_talent}}</span>
                    </li>
                </ul>
                <hr>
                <div class="row">
                    <p class="validated-by col-sm-6"><span class="btn btn-lg"><strong><i class="fa fa-star icon"></i> Validated by:</strong> <a href="/profile?validator=true">John Smith</a> on 23/12/2016</span></p>
                    <p class="col-sm-6"><a class="btn btn-lg btn-primary pull-right" href=""> <i class="fa fa-cloud-download" aria-hidden="true"></i> Europass Curriculum</a></p>
                </div>
            </profile-section>

            <skills-profile-section :student="student"></skills-profile-section>
            <studies-profile-section :student="student"></studies-profile-section>
            <training-profile-section :student="student"></training-profile-section>
            <languages-profile-section :student="student"></languages-profile-section>
            <experience-profile-section :student="student"></experience-profile-section>
        </div>

        <contact-info :item="student" :is-company="false"></contact-info>
    </div>
</template>

<script>
import ProfileHeader from '../../common/ProfileHeader.vue';
import ProfileSection from '../../common/ProfileSection.vue';
import SkillsProfileSection from './SkillsProfileSection.vue';
import StudiesProfileSection from './StudiesProfileSection.vue';
import TrainingProfileSection from './TrainingProfileSection.vue';
import LanguagesProfileSection from './LanguagesProfileSection.vue';
import ExperienceProfileSection from './ExperienceProfileSection.vue';
import ContactInfo from '../../common/ContactInfo.vue';
import { studentProfileResource } from 'helpers/resources';

export default {
    components: {
        'profile-header': ProfileHeader,
        'profile-section': ProfileSection,
        'skills-profile-section': SkillsProfileSection,
        'studies-profile-section': StudiesProfileSection,
        'training-profile-section': TrainingProfileSection,
        'languages-profile-section': LanguagesProfileSection,
        'experience-profile-section': ExperienceProfileSection,
        'contact-info': ContactInfo,
    },
    data() {
        return {
            'student': {}
        }
    },
    mounted() {
        this.fetchStudent();
    },
    methods: {
        fetchStudent() {
            studentProfileResource.get()
                .then((response) => {
                    this.student = response.body;
                }, (errorResponse) => {
                    console.log(errorResponse);
                });
        }
    }
}
</script>

<style lang="sass" scoped>
@import "resources/assets/sass/variables";
.fa-star {
    color: $yellow;
}
</style>

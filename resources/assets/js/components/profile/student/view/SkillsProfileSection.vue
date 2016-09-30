<template>
    <profile-section :title="'Skills'" :icon-class="'fa fa-cogs'">
        <div class="row">
            <div class="col-sm-6">
                <h4>Professional</h4>
                <skills-tags :skills="student.skills" :is-company="false"></skills-tags>
            </div>
            <div class="col-sm-6">
                <h4>Personal</h4>
                <skills-tags :skills="student.skills" :is-company="false"></skills-tags>
            </div>
        </div>
    </profile-section>
</template>

<script>
import ProfileSection from '../../common/ProfileSection.vue';
import SkillsTags from 'components/common/SkillsTags.vue';

export default {
    props: ['student'],
    components: {
        'profile-section': ProfileSection,
        'skills-tags': SkillsTags
    }
}
</script>

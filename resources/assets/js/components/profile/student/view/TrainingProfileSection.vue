<template>
    <profile-section :title="'Training'" :icon-class="'fa fa-trophy'">
        <ul class="timeline">
            <li>
                <p class="date">1993</p>
                <h4>Course name</h4>
                <p><a class="btn btn-primary btn-link" href="#"><i class="fa fa-cloud-download"></i> Certificate</a> </p>
            </li>
            <li>
                <p class="date">1993</p>
                <h4>Course name</h4>
                <p><a class="btn btn-primary btn-link" href="#"><i class="fa fa-cloud-download"></i> Certificate</a> </p>
            </li>
        </ul>
    </profile-section>
</template>

<script>
import ProfileSection from '../../common/ProfileSection.vue';

export default {
    props: ['student'],
    components: {
        'profile-section': ProfileSection,
    }
}
</script>

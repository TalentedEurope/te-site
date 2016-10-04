<template>
    <profile-section :title="'Work experience'" :icon-class="'fa fa-suitcase'">
        <ul class="timeline">
            <li>
                <p class="date">1993 - 1993 </p>
                <h4><strong>Position</strong> at Company name</h4>
            </li>
            <li>
                <p class="date">1993 - 1993 </p>
                <h4><strong>Position</strong> at Company name</h4>
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

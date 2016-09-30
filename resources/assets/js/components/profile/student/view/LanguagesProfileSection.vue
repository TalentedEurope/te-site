<template>
    <profile-section :title="'Languages'" :icon-class="'fa fa-language'">
        <ul class="cards clearfix">
            <li>
                <h4>Language name | <em>Level</em></h4>
                <p><a class="btn btn-primary btn-link" href="#"><i class="fa fa-cloud-download"></i> Certificate</a> </p>
            </li>
            <li>
                <h4>Language name | <em>Level</em></h4>
                <p><a class="btn btn-primary btn-link" href="#"><i class="fa fa-cloud-download"></i> Certificate</a> </p>
            </li>
            <li>
                <h4>Language name | <em>Level</em></h4>
                <p><a class="btn btn-primary btn-link" href="#"><i class="fa fa-cloud-download"></i> Certificate</a> </p>
            </li>
            <li>
                <h4>Language name | <em>Level</em></h4>
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

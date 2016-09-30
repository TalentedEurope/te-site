<template>
    <profile-section :title="'Studies'" :icon-class="'fa fa-graduation-cap'">
        <ul class="timeline">
            <li>
                <p class="date">1993 - Institution name</p>
                <h4>Name of study | <em>Level Name</em></h4>
                <p><a class="btn btn-primary btn-link" href="#"><i class="fa fa-cloud-download"></i> Grade card</a>  <a class="btn btn-primary btn-link" href="#"><i class="fa fa-cloud-download"></i> Certificate</a> </p>
            </li>
            <li>
                <p class="date">1993 - Institution name</p>
                <h4>Name of study | <em>Level Name</em></h4>
                <p><a class="btn btn-primary btn-link" href="#"><i class="fa fa-cloud-download"></i> Grade card</a>  <a class="btn btn-primary btn-link" href="#"><i class="fa fa-cloud-download"></i> Certificate</a> </p>
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

<template>
    <div class="row profile">
        <div class="col-xs-12 col-sm-8 col-md-9">
            <profile-header :title="company.name" :subtitle="company.sector"></profile-header>

            <profile-section :title="'About'" :icon-class="'fa fa-info'">
                <ul class="profile-specs">
                    <li><strong><i class="icon fa fa-map-marker"></i>  We are in: </strong> {{company.we_are_in}}</li>
                    <li>
                        <strong><i class="icon fa fa-cogs"></i> We're looking for people skilled in: </strong>
                        <p></p>
                        <skills-tags :skills="company.skills" :is-company="true"></skills-tags>
                    </li>
                    <li><strong><i class="icon fa fa-lightbulb-o"></i>We think that talent is:</strong> {{company.talent_is}}</li>
                </ul>
            </profile-section>

        </div>

        <contact-info :item="company" :is-company="true"></contact-info>
    </div>
</template>

<script>
import ProfileHeader from '../../common/ProfileHeader.vue'
import ProfileSection from '../../common/ProfileSection.vue';
import ContactInfo from '../../common/ContactInfo.vue'
import SkillsTags from 'components/common/SkillsTags.vue'
import { companyProfileResource } from 'resources/profile';

export default {
    components: {
        'profile-header': ProfileHeader,
        'profile-section': ProfileSection,
        'contact-info': ContactInfo,
        'skills-tags': SkillsTags
    },
    data() {
        return {
            'company': {}
        }
    },
    mounted() {
        this.fetchCompany();
    },
    methods: {
        fetchCompany() {
            companyProfileResource.get()
                .then((response) => {
                    this.company = response.body;
                }, (errorResponse) => {
                    console.log(errorResponse);
                });
        }
    }
};
</script>

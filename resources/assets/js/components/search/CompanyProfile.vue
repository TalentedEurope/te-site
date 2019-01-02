<template>
    <li class="well profile clearfix">
        <div>
            <div class="col-xs-12 col-sm-8 col-md-9">
                <h2 class="title"><a :href="seeMoreUrl">{{company.name}}</a></h2>
                <p><em class="h4">{{company.info}}</em></p>
                <hr>
                <p v-if="company.description != ''">
                    <em>{{company.description}}</em>
                </p>
                <p class="h4">
                    <strong><i class="fa fa-map-marker"></i> {{ $t('reg-profile.we_are_in') }}: </strong>
                    {{company.we_are_in}}
                </p>
                <p v-if="company.skills.length > 0">
                    <strong>{{ $t('reg-profile.we_are_looking_for_people_skilled_in') }}: </strong>
                    <skills-tags :skills="company.skills" :is-company="true"></skills-tags>
                </p>
                <p></p>
                <p v-if="company.talent_is != ''">
                    <strong>{{ $t('reg-profile.we_think_that_talent_is') }}: </strong>
                    {{company.talent_is}}
                </p>

                <p class="jobOffers" v-if="company.job_offers">
                    <strong><i class="fa fa-file-text-o"></i> {{company.job_offers}} {{ $t('reg-profile.job_offers') }}</strong>
                </p>

                <alert-button :company-id="company.id" :alertable="company.alertable" placement="right"></alert-button>

            </div>
            <div class="col-xs-12 col-sm-4 col-md-3 text-center">
                <figure>
                    <img :src="company.photo" alt="" class="img-responsive">
                </figure>

                <ul class="social">
                    <li v-if="company.facebook">
                        <a target="_blank" :href="company.facebook" rel="noopener noreferrer" class="icon-link">
                            <i class="fi flaticon-facebook"></i>
                        </a>
                    </li>
                    <li v-if="company.twitter">
                        <a target="_blank" :href="company.twitter" rel="noopener noreferrer" class="icon-link">
                            <i class="fi flaticon-twitter"></i>
                        </a>
                    </li>
                    <li v-if="company.linkedin">
                        <a target="_blank" :href="company.linkedin" rel="noopener noreferrer" class="icon-link">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </li>
                    <li v-if="company.website">
                        <a target="_blank" :href="company.website" rel="noopener noreferrer" class="icon-link">
                            <i class="fa fa-external-link"></i>
                        </a>
                    </li>
                </ul>

                <a class="btn-primary btn view-more" :href="seeMoreUrl">{{ $t('global.more_btn') }}</a>
            </div>
        </div>
    </li>
</template>

<script>
import SkillsTags from '../common/SkillsTags.vue';
import AlertButton from '../common/AlertButton.vue';

export default {
    components: { SkillsTags, AlertButton },
    props: ['company'],
    computed: {
        seeMoreUrl: function () {
            return TE.logged_in ? `/profile/${this.company.slug}/${this.company.id}` : '/register?see_more=1';
        }
    }
}
</script>

<style lang="sass" scoped>
@import "resources/assets/sass/components/site/search-profile";

.profile img.img-responsive {
    margin-bottom: 15px;
}
.view-more {
    margin-top: 15px;
}

p.jobOffers {
    display: inline-block;
    background: #212E44;
    color: #fff;
    padding: 5px 20px;    
}

@media (min-width: 768px) {
    .profile img.img-responsive {
        margin-top: 0;
    }
}
</style>

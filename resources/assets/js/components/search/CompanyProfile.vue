<template>
    <li class="well profile clearfix">
        <div>
            <div class="col-xs-12 col-sm-8 col-md-9">
                <h2 class="title">{{company.name}}</h2>
                <p><em class="h4">{{company.info}}</em></p>
                <hr>
                <p class="h4">
                    <strong><i class="fa fa-map-marker"></i> We are in: </strong>
                    {{company.we_are_in}}
                </p>
                <p>
                    <strong>We're looking for people skilled in: </strong>
                </p>
                <skills-tags :skills="company.skills" :is-company="true"></skills-tags>
                <p></p>
                <p>
                    <strong>We think that talent is: </strong>
                    {{company.talent_is}}
                </p>

                <alert-button :company-id="company.id" placement="right"></alert-button>

            </div>
            <div class="col-xs-12 col-sm-4 col-md-3 text-center">
                <figure>
                    <img :src="company.photo" alt="" class="img-circle img-responsive">
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
}
</script>

<style lang="sass" scoped>
@import "resources/assets/sass/components/site/search-profile";
</style>

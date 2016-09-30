<template>
    <li class="well profile clearfix">
        <div class="col-sm-12">
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

                <a href="#" class="btn btn-primary btn-nudge btn-lg" ><i class="fa fa-bell" aria-hidden="true"></i> I'm here!</a>

                <a href="#" class="btn btn-primary btn-tooltip btn-lg" data-toggle="tooltip" data-placement="right" title="Explanation text about what the Hey listen! button does" > ? </a>

            </div>
            <div class="col-xs-12 col-sm-4 col-md-3 text-center">
                <figure>
                    <img :src="company.photo" alt="" class="img-circle img-responsive">
                </figure>
                <ul class="social">
                    <li>
                        <a href="#">
                            <i class="fi flaticon-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fi flaticon-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-envelope"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </li>
</template>

<script>
import SkillsTags from '../common/SkillsTags.vue'

export default {
    components: {
        'skills-tags': SkillsTags,
    },
    props: ['company'],
}
</script>

<style lang="sass" scoped>
@import "resources/assets/sass/components/site/search-profile";
</style>

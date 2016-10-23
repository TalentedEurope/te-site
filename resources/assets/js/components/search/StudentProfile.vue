<template>
    <li class="well profile clearfix">
        <div class="col-sm-12">
            <div class="col-xs-12 col-sm-8 col-md-9">
                <h2 class="title">{{student.full_name}}</h2>
                <p><em class="h4">{{student.studied}}</em></p>
                <hr>
                <p><strong><i class="fa fa-map-marker"></i> Lives in: </strong> {{student.lives_in}}</p>
                <p><strong>In: </strong> {{student.studied_in}}</p>
                <p>
                    <strong>Skilled in: </strong>
                    <skills-tags :skills="student.skills"></skills-tags>
                </p>
                <p><strong>Languages: </strong>
                    <ul class="languages">
                        <li v-for="language in student.languages">{{language}}</li>
                    </ul>
                </p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3 text-center">
                <figure>
                    <img :src="student.photo" alt="" class="img-circle img-responsive">
                    <figcaption class="ratings" v-if="student.validated">
                        <span class="label label-success">
                            <i class="fa fa-star"></i> Refereed
                        </span>
                    </figcaption>
                </figure>
                <a class="btn-primary btn view-more">View more</a>
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
    props: ['student'],
}
</script>

<style lang="sass" scoped>
@import "resources/assets/sass/components/site/search-profile.scss";
</style>

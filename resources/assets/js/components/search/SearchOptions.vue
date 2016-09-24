<template>
    <div class="col-sm-4 col-md-3 search-options">
        <div class="options-title">
            <span class="h3"><i class="fa fa-filter" aria-hidden="true"></i>Filters</span>
        </div>
        <div class="current-search">
            <h3>Current Search</h3>
            <ul>
                <li v-for="item in current_search">
                    {{item.name}} <button class="remove-item"><i class="fa fa-close" aria-hidden="true"></i></button>
                </li>
          </ul>
        </div>
        <multi-options-filter v-if="students_page" :items="level_of_studies" prefix="level_of_study" title="Level of studies"></multi-options-filter>
        <multi-options-filter v-if="students_page" :items="field_of_studies" prefix="field_of_study" title="Field of studies"></multi-options-filter>
        <multi-options-filter v-if="students_page" :items="languages" prefix="language" title="Languages"></multi-options-filter>
        <multi-options-filter v-if="companies_page" :items="activities" prefix="activity" title="Activity Sector"></multi-options-filter>
        <multi-options-filter :items="countries" prefix="country" title="Country"></multi-options-filter>
    </div>
</template>

<script>
import MultiOptionsFilter from './MultiOptionsFilter.vue'
import {
    levelOfStudiesResource, fieldOfStudiesResource, activitiesResource, languagesResource, countriesResource
} from '../../helpers/resources'

export default {
    components: {
        'multi-options-filter': MultiOptionsFilter,
    },
    data () {
        return {
            students_page: TE.students_page,
            companies_page: TE.companies_page,
            current_search: [
                {code: '1', name: 'Item 1'},
                {code: '2', name: 'Item 2'},
                {code: '3', name: 'Item 3'},
            ],
            level_of_studies: [],
            field_of_studies: [],
            activities: [],
            languages: [],
            countries: []
        }
    },
    mounted () {
        this.fetchFilters();
    },
    methods: {
        fetchFilters: function () {
            var errorCallback = (errorResponse) => {
                console.log(errorResponse);
            }

            levelOfStudiesResource.get().then((response) => {
                this.level_of_studies = response;
            }, errorCallback);

            fieldOfStudiesResource.get().then((response) => {
                this.field_of_studies = response;
            }, errorCallback);

            activitiesResource.get().then((response) => {
                this.activities = response;
            }, errorCallback);

            languagesResource.get().then((response) => {
                this.languages = response;
            }, errorCallback);

            countriesResource.get().then((response) => {
                this.countries = response;
            }, errorCallback);
        }
    },
}
</script>

<style lang="sass" scoped>
@import "resources/assets/sass/variables";

.options-title {
    box-shadow: none;
    text-transform: uppercase;
    span {
        font-weight: bold;
    }
    .fa {
        padding-right: 10px;
    }
}
.current-search {
    ul {
        padding: 0;
        list-style: none;
        li {
            display: inline-block;
            padding: 5px 10px;
            background: $blue;
            color: $white;
            margin-bottom: 3px;
            margin-right: 3px;
            button {
                border: none;
                background: none;
            }
        }
    }
}
.search-options .filter-list {
    ul {
        list-style: none;
        padding-left: 10px;
        border-left: 2px solid $blue;
        li {
            font-size: 16px;
            padding: 5px 0;
            label {
                font-weight: normal;
            }
        }
    }
    .more button {
        background: none;
        border: none;
        font-size: 14px;
        color: $blue;
        &:hover {
            text-decoration: underline;
        }
        .fa {
            padding-right: 5px;
        }
    }
}
</style>

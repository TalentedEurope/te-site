<template>
    <div class="form-group" v-bind:class="{ 'alert alert-danger': has_error }">
        <label for="personalSkillsSelect">{{ label }}</label>
        <p v-if="sublabel">{{ sublabel }}</p>

        <ul class="selected-skills list-unstyled" v-show="selectedSkills.length > 0">
            <li class="btn btn-default" v-for="skill in selectedSkills">
                <input type="hidden" name="personalSkills[]" :value="skill.id"/>
                {{ skill.name }}
                <a title="Remove personal skill" @click.prevent="removeSkill(skill)"><i class="fa fa-close" aria-hidden="true"></i></a>
            </li>
        </ul>

        <div class="select-holder">
            <select v-model="selected_skill" id="personalSkillsSelect" :disabled="selected_skills.length >= max_personal_skills" class="form-control">
                <option :value="null"> - Personal skills - </option>
                <option v-for="skill in posibleSkills" :value="skill">{{ skill.name }}</option>
            </select>
        </div>

        <!-- <button @click.prevent="addSelectedSkill()">Add</button> -->

        <span v-if="has_error" class="help-block">
            <strong>{{error_message}}</strong>
        </span>
    </div>
</template>

<script>
import { setCodeForValidation, setInitError, onInput } from './form-helpers';

export default {
    props: ['label', 'sublabel', 'value', 'values', 'errors', 'readonly'],
    data() {
        return {
            'code': 'personalSkills',
            'max_personal_skills': 6,
            'selected_skills': JSON.parse(this.value),
            'all_skills': JSON.parse(this.values),
            'selected_skill': null,
            'has_error': false,
            'error_message': null
        }
    },
    created() {
        setCodeForValidation.call(this);
        setInitError.call(this);
    },
    methods: {
        removeSkill: function (skill) {
            var index = this.selected_skills.indexOf(skill);
            if (index >= 0) {
                this.selected_skills.splice(index, 1);
            }
        },
        addSelectedSkill: function () {
            var skill = this.selected_skill;
            this.selected_skills.push({id: skill.code, name: skill.name});
        }
    },
    computed: {
        selectedSkills: function () {
            return _.orderBy(this.selected_skills, ['name']);

        },
        posibleSkills: function () {
            var that = this;
            return _.filter(this.all_skills, function(skill) {
                return !(_.find(that.selected_skills, function(selected) { return skill.code == selected.id }))
            });
        }
    },
    watch: {
        selected_skill: function (value) {
            if (value) {
                this.addSelectedSkill();
                this.selected_skill = null;
            }
        },
        selectedSkills: function () {
            onInput.call(this);
        }
    }
};
</script>

<style scoped>
.selected-skills .btn-default {
    margin-right: 5px;
    margin-bottom: 5px;
}
</style>

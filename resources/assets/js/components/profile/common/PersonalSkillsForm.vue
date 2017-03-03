<template>
    <div class="form-group" v-bind:class="{ 'alert alert-danger': has_error }">
        <label for="personalSkillsSelect">{{ label }}</label>
        <p v-if="sublabel">{{ sublabel }}</p>

        <ul class="selected-skills list-unstyled" v-show="selectedSkills.length > 0">
            <li class="btn" v-for="skill in selectedSkills">
                <input type="hidden" name="personalSkills[]" :value="skill.id"/>
                {{ skill.name }}
                <a title="Remove personal skill" v-if="!readonly" @click.prevent="removeSkill(skill)"><i class="fa fa-close" aria-hidden="true"></i></a>
            </li>
        </ul>

        <div class="select-holder" v-if="!readonly">
            <select v-model="selected_skill" id="personalSkillsSelect" :disabled="selected_skills.length >= max_personal_skills" class="form-control">
                <option :value="null"> - Personal skills - </option>
                <option v-for="skill in posibleSkills" :value="skill">{{ skill.name }}</option>
            </select>
        </div>

        <span v-if="has_error" class="help-block">
            <strong>{{error_message}}</strong>
        </span>

        <input type="hidden" name="remove_all_personal_skills" v-if="selectedSkills.length == 0" value="true"/>
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

<style lang="sass" scoped>
.selected-skills .btn {
    margin-right: 5px;
    margin-bottom: 5px;
    cursor: default;
    color: #333;
    background-color: #fff;
    border-color: #ccc;

    &:active {
        box-shadow: none;
    }

    a {
        cursor: pointer;
    }
}
</style>

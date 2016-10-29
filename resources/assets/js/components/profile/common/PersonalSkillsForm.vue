<template>
    <div class="form-group" v-bind:class="{ 'alert alert-danger': has_error }">
        <label for="personalSkills">A list of the most valuable skills for the company</label>
        <p>Desired personal skills max: {{ maxPersonalSkills }}</p>

        <ul class="selected-skills list-unstyled">
            <li class="btn btn-default" v-for="skill in selectedSkills">
                <input type="hidden" name="personalSkills[]" :value="skill.id"/>
                {{ skill.name }}
                <a title="Remove personal skill" @click.prevent="removeSkill(skill)"><i class="fa fa-close" aria-hidden="true"></i></a>
            </li>
        </ul>

        <div class="select-holder">
            <select v-model="selected_skill" :disabled="disabledSelectSkills" class="form-control">
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
export default {
    props: ['maxPersonalSkills', 'value', 'values', 'hasError', 'error', 'readonly'],
    data() {
        return {
            'selected_skills': JSON.parse(this.value),
            'all_skills': JSON.parse(this.values),
            'selected_skill': null,
            'has_error': this.hasError,
            'error_message': this.error
        }
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
        },
        disabledSelectSkills: function () {
            return this.selected_skills.length >= this.maxPersonalSkills;
        }
    },
    watch: {
        selected_skill: function (value) {
            if (value) {
                this.addSelectedSkill();
                this.selected_skill = null;
            }
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

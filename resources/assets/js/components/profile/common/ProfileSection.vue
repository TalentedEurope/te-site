<template>
    <div class="well">
        <h3 class="section-title">
            <i :class="iconClass" aria-hidden="true"></i>
            {{title}}
        </h3>
        <slot></slot>
    </div>
</template>

<script>
export default {
    props: ['title', 'iconClass']
}
</script>

<style lang="sass">
@import "resources/assets/sass/variables";
.unique-profile {
    .section-title {
        margin-top: 0;
        color: $dark-blue;
        border-bottom: 1px solid darken($light-gray,10%);
        padding-bottom: 10px;
        margin-bottom: 15px;

        .fa {
            border: 2px solid $blue;
            width: 34px;
            background: $blue;
            text-align: center;
            height: 34px;
            border-radius: 30px;
            margin-right: 10px;
            color: $white;
            line-height: 30px
        }
    }

    .icon {
        width: 25px;
        text-align: center;
        color: $blue;
    }

    .profile-specs {
        list-style: none;
        padding: 0;
        margin-top: 25px;

        li {
            margin-bottom: 10px;
        }
    }

    .timeline {
        border-left: 1px solid darken($light-gray,10%);
        margin-left: 10px;
        padding-left: 20px;
        font-size: 25px;
        color: $blue;

        .date {
            font-style: italic;
            color: #777;
            font-size: 14px;
        }

        h4 {
            color: $black;
        }
    }

    .cards {
        padding: 0;
        list-style: none;

        li {
            background: $light-gray;
            box-shadow: 0px 0px 6px $dark-gray;
            padding: 5px 15px;
            float: left;
            margin: 7px;
        }
    }
}
</style>

<template>
    <div class="row">
        <div class="col-sm-12 well search-bar">
            <div class="form-group col-sm-3">
                <div class="select-holder">
                    <select class="form-control" id="country" name="country">
                        <option value="" selected="">Search for:</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-sm-7">
                <input type="text" class="form-control" id="name" name="name" placeholder="What are you looking for?" v-model="search">
            </div>
            <div class="form-group col-sm-2">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            search: 'John D'
        }
    }
}
</script>

<style lang="sass" scoped>
@import "resources/assets/sass/variables";
.search-bar {
    background: $blue;
    input {
        background: $white;
    }
    .select-holder {
        background: $white;
    }
    .btn-primary {
        width: 100%;
        background: $yellow;
        text-transform: uppercase;
        font-weight: bold;
        padding: 15px;
        font-size: 15px;
        border: none;
        .fa {
            padding-right: 5px;
        }
    }
    .form-group {
        margin-bottom: 0;
    }
}
</style>

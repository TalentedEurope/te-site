<template>
    <div class="col-xs-12 col-sm-4 col-md-3 text-center contact-info">
        <div class="well">
            <figure>
                <img :src="item.photo" alt="" class="img-circle img-responsive">
            </figure>
            <div class="contact">
                <h3>Get in contact</h3>
                <div v-if="isCompany">
                    <a href="#" class="btn btn-primary btn-nudge btn-lg">
                        <i class="fa fa-bell" aria-hidden="true"></i> I'm here!
                    </a>
                    <a href="#" class="btn btn-primary btn-tooltip btn-lg" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Explanation text about what the Hey listen! button does"> ? </a>
                </div>
                <hr>
                <p>
                    <i class="fa icon fa-envelope"></i> Email: <a href="mailto:john@doe.com">{{item.email}}</a>
                </p>
                <p>
                    <i class="fa icon fa-phone"></i> Phone:  <a href="tel:+13174562564">{{item.phone}}</a>
                </p>
                <address>
                    {{item.address}}
                </address>
                <ul class="social">
                    <li v-if="item.facebook">
                        <a :href="item.facebook">
                            <i class="fi flaticon-facebook"></i>
                        </a>
                    </li>
                    <li v-if="item.twitter">
                        <a :href="item.twitter">
                            <i class="fi flaticon-twitter"></i>
                        </a>
                    </li>
                    <li v-if="item.linkedin">
                        <a :href="item.linkedin">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['item', 'isCompany']
}
</script>

<style lang="sass" scoped>
@import "resources/assets/sass/variables";
.contact-info {
    img.img-responsive {
        display: inline-block;
        margin-top: 20px;
        margin-bottom: 10px;
        border: 6px solid $light-gray;
    }

    .btn.btn-connect {
        text-transform: uppercase;
        font-weight: bold;
        font-size: 17px;
        border: none;
        padding: 10px 25px;
    }

    .btn-tooltip {
        border-radius: 40px;
        width: 30px;
        height: 30px;
        line-height: 30px;
        background: $yellow;
        font-weight: bold;
        font-size: 18px;
        padding: 0;
        border: none;
        margin-left: 10px;
    }

    ul.social {
        list-style: none;
        padding: 0;
        li {
            display: inline;
            font-size: 20px;
            padding: 0 5px;
            & a:hover {
                text-decoration: none;
            }
        }
    }
}
</style>

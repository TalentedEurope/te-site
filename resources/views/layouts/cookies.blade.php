<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#212e44"
    },
    "button": {
      "background": "#fcbd0f"
    }
  },
  "position": "top",
  "static": true,
  "content": {
    "message": "{{ trans("global.cookie_text") }}",
    "dismiss": "{{ trans("global.cookie_accept") }}",
    "link": "{{ trans("global.cookie_link") }}",
    "href": "https://www.talentedeurope.eu/cookies"
  }
})});
</script>
<style>
.cc-window { transition: none;!important; } .cc-animate.cc-revoke {  transition: none;!important; } .cc-grower {  background-color:#212E44; transition: none;!important; } 
</style>
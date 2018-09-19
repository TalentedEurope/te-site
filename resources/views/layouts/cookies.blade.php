<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
  window.cookieconsent.utils.isMobile = () => false;

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
      "href": "https://www.talentedeurope.eu/cookies",
    }
  })
});
</script>
<style>
.cc-grower {
  background-color:#212E44;
  transition: none !important;
  position: relative;
  z-index: 2000;
}

.cc-window {
  flex-direction: column !important;
  transition: none !important;
  align-items: stretch !important;
}

.cc-window .cc-message {
  margin: 0 !important;
}

.cc-window .cc-compliance {
  margin-top: 0.8em;
}

@media (min-width: 470px) {
  .cc-window {
    align-items: center !important;
  }
}

@media (min-width: 800px) {
  .cc-window {
    flex-direction: row !important;
  }

  .cc-window .cc-compliance {
    margin-top: 0;
    margin-left: 1.8em;
  }
}
</style>
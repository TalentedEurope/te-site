import { profileResource } from 'resources/profile';

var setDebounced = function() {
    this.debounced = _.debounce(this.validateField, 1500);
};

var validateField = function() {
    var that = this;
    var data = {validate: true,}

    data[this.code] = this.model || '';

    profileResource.put(data)
        .then(function(response) {
            var body = response.body;
            if (_.isPlainObject(body) && body[that.code]) {
                that.has_error = true;
                that.error_message = body[that.code][0];
            }
            console.log(response);
        }, function(response) {
            console.log(response)
        });
};

var modelWatch = function(value) {
    this.has_error = false;
    this.error_message = null;

    this.debounced()
};

export var setDebounced = setDebounced;
export var validateField = validateField;
export var modelWatch = modelWatch;

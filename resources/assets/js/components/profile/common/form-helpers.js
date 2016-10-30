import { profileResource } from 'resources/profile';

var setDebounced = function () {
    this.debounced = _.debounce(this.validateField, 1500);
};

var setInitError = function () {
    if (_.has(this.errors, this.code)) {
        this.has_error = true;
        this.error_message = this.errors[this.code][0];
    }
};

var generateFieldName = function () {
    if (this.groupCode) {
        return `${this.groupCode}[${this.groupId}][${this.code}]`;
    } else {
        return this.code;
    }
};

var validateField = function() {
    var that = this;
    var data = {validate: true,}

    var value = this.model || '';
    var code = this.code;
    if (this.groupCode) {
        var field = {}
        field['id'] = this.groupId;
        field[code] = value;
        data[this.groupCode] = [field];
    } else {
        data[code] = value;
    }

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
export var setInitError = setInitError;
export var generateFieldName = generateFieldName;
export var validateField = validateField;
export var modelWatch = modelWatch;

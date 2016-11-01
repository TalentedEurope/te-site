import { profileResource } from 'resources/profile';

var setDebounced = function () {
    this.debounced = _.debounce(this.validateField, 1500);
};

var setCodeForValidation = function () {
    var code = this.code;
    if (this.groupCode) {
        code = `${this.groupCode}.${this.groupId}.${this.code}`;
    }
    this.code_for_validation = code;
};

var setInitError = function () {
    var code = this.code_for_validation;

    if (_.has(this.errors, code)) {
        this.has_error = true;
        this.error_message = this.errors[code][0];
    }
};

var generateFieldId = function () {
    if (this.groupCode) {
        return `${this.groupCode}-${this.groupId}-${this.code}`;
    } else {
        return this.code;
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

    var value = this.value || '';
    var code = this.code;
    if (this.groupCode) {
        var field = {'id': this.groupId};
        field[code] = value;
        data[this.groupCode] = {};
        data[this.groupCode][this.groupId] = field;
    } else {
        data[code] = value;
    }

    profileResource.put(data)
        .then(function(response) {
            var body = response.body;

            var code = that.code_for_validation;
            if (_.isPlainObject(body) && body[code]) {
                that.has_error = true;
                that.error_message = body[code][0];
            }
        }, function(errorResponse) {
            console.log(errorResponse)
        });
};

var onInput = function(event) {
    this.has_error = false;
    this.error_message = null;

    this.debounced()
};


export var setDebounced = setDebounced;
export var setCodeForValidation = setCodeForValidation;
export var setInitError = setInitError;
export var generateFieldId = generateFieldId;
export var generateFieldName = generateFieldName;
export var validateField = validateField;
export var onInput = onInput;

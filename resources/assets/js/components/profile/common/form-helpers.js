import { profileResource } from 'resources/profile';

var parsedLabel = function () {
    var required_text = '';
    if (!_.isUndefined(this.required)) {
        required_text = ` (${this.$t('reg-profile.required')})`;
    }
    return `${this.label}${required_text}`;
};

var parsedPlaceholder = function () {
    var required_text = '';
    if (!_.isUndefined(this.required)) {
        required_text = ` (${this.$t('reg-profile.required')})`;
    }
    return `${this.placeholder}${required_text}`;
};

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
    if (this.errors) {
        var parsed_errors = JSON.parse(this.errors);
        if (_.has(parsed_errors, code)) {
            this.has_error = true;
            this.error_message = parsed_errors[code][0];
        }
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
    var data = {validate: true}

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
        });
};

var onInput = function() {
    TE.profile.modified_fields = true;

    if (_.isUndefined(this.noValidate)) {
        this.has_error = false;
        this.error_message = null;

        if (this.debounced) {
            this.debounced();
        }
    }
};

var onBlur = function() {
    if (_.isUndefined(this.noValidate) && this.has_error == false && !this.readonly) {
        if (this.debounced) {
            this.debounced();
            this.debounced.flush();
        }
    }
};

export var parsedLabel = parsedLabel;
export var parsedPlaceholder = parsedPlaceholder;
export var setDebounced = setDebounced;
export var setCodeForValidation = setCodeForValidation;
export var setInitError = setInitError;
export var generateFieldId = generateFieldId;
export var generateFieldName = generateFieldName;
export var validateField = validateField;
export var onInput = onInput;
export var onBlur = onBlur;
